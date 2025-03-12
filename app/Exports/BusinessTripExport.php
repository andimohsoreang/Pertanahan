<?php

namespace App\Exports;

use App\Models\BusinessTrip;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class BusinessTripExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithEvents
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = BusinessTrip::query()
            ->with([
                'document.documentType',
                'pics' => function($q) {
                    $q->with([
                        'employee.seksi',
                        'departure',
                        'arrival',
                        'lodging',
                        'perdiem'
                    ]);
                },
                'files'
            ]);

        $this->applyFilters($query);

        return $query->get();
    }

    protected function applyFilters($query)
    {
        // Filter yang sama seperti sebelumnya
        if ($this->request->filled('nomor_spm')) {
            $query->where('nomor_spm', 'like', "%{$this->request->nomor_spm}%");
        }

        if ($this->request->filled('nomor_sp2d')) {
            $query->where('nomor_sp2d', 'like', "%{$this->request->nomor_sp2d}%");
        }

        if ($this->request->filled('nama_pelaksana')) {
            $query->whereHas('pics.employee', function($q) {
                $q->where('nama_pelaksana', 'like', "%{$this->request->nama_pelaksana}%");
            });
        }

        if ($this->request->filled('nama_seksi')) {
            $query->whereHas('pics.employee.seksi', function($q) {
                $q->where('nama_seksi', $this->request->nama_seksi);
            });
        }

        if ($this->request->filled('biaya_min')) {
            $query->where('grand_total', '>=', $this->request->biaya_min);
        }

        if ($this->request->filled('biaya_max')) {
            $query->where('grand_total', '<=', $this->request->biaya_max);
        }

        if ($this->request->filled('tanggal_mulai')) {
            $query->whereHas('pics', function($q) {
                $q->where('tanggal_mulai', '>=', $this->request->tanggal_mulai);
            });
        }

        if ($this->request->filled('tanggal_selesai')) {
            $query->whereHas('pics', function($q) {
                $q->where('tanggal_selesai', '<=', $this->request->tanggal_selesai);
            });
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            // Informasi Dokumen
            'ID Perjalanan Dinas',
            'Jenis Dokumen',
            'Nomor Dokumen',
            'Tanggal Pembuatan Dokumen',

            // Informasi Business Trip
            'Nomor SPM',
            'Nomor SP2D',
            'Transport Antar Kota',
            'Taksi Airport',
            'Biaya Lain-Lain',
            'Grand Total',

            // Informasi Pelaksana
            'Nama Pelaksana',
            'Seksi',
            'Status Pegawai',
            'Uraian Tugas',
            'Nomor Surat Tugas',
            'Tanggal Surat Tugas',
            'Tanggal Mulai',
            'Tanggal Selesai',

            // Keberangkatan
            'Moda Transportasi Keberangkatan',
            'Harga Tiket Keberangkatan',
            'Nomor Tiket Keberangkatan',
            'Kode Booking Keberangkatan',
            'Tanggal Keberangkatan',

            // Kedatangan
            'Moda Transportasi Kedatangan',
            'Harga Tiket Kedatangan',
            'Nomor Tiket Kedatangan',
            'Kode Booking Kedatangan',
            'Tanggal Kedatangan',

            // Penginapan
            'Jumlah Malam',
            'Biaya Penginapan per Malam',
            'Total Biaya Penginapan',

            // Uang Harian
            'Jumlah Hari Perdiem',
            'Biaya Perdiem per Hari',
            'Total Perdiem',

            // Informasi Tambahan
            'Status Berkas',
            'Jumlah File',
            'Tanggal Dibuat'
        ];
    }

    public function map($trip): array
    {
        $rows = [];

        // Hitung jumlah maksimum baris
        $maxRows = $trip->pics->max(function($pic) {
            return max(
                $pic->departure->count(),
                $pic->arrival->count(),
                $pic->lodging->count(),
                $pic->perdiem->count()
            );
        }) ?? 1;

        // Kumpulkan nama pelaksana
        $pelaksanaNames = $trip->pics->pluck('employee.nama_pelaksana')
            ->filter()
            ->unique()
            ->implode(', ');

        // Kumpulkan seksi
        $seksiNames = $trip->pics->pluck('employee.seksi.nama_seksi')
            ->filter()
            ->unique()
            ->implode(', ');

        for ($i = 0; $i < $maxRows; $i++) {
            // Ambil PIC dan entitas terkait
            $pic = $trip->pics->get($i) ?? $trip->pics->first();
            $departure = $pic->departure->get($i) ?? $pic->departure->first();
            $arrival = $pic->arrival->get($i) ?? $pic->arrival->first();
            $lodging = $pic->lodging->get($i) ?? $pic->lodging->first();
            $perdiem = $pic->perdiem->get($i) ?? $pic->perdiem->first();

            $rows[] = [
                // Informasi Dokumen
                $trip->id,
                $trip->document && $trip->document->documentType ? $trip->document->documentType->jenis_dokumen : 'Tidak Ada',
                $trip->document ? $trip->document->nomor_dokumen : 'Tidak Ada',
                $trip->document ? $trip->document->tanggal_pembuatan : 'Tidak Ada',

                // Informasi Business Trip
                $trip->nomor_spm ?? 'Tidak Ada',
                $trip->nomor_sp2d ?? 'Tidak Ada',
                $trip->transport_antar_kota ?? 0,
                $trip->taksi_airport ?? 0,
                $trip->lain_lain ?? 0,
                $trip->grand_total ?? 0,

                // Informasi Pelaksana
                $pelaksanaNames ?: 'Tidak Diketahui',
                $seksiNames ?: 'Tidak Ada',
                $pic->employee ? $pic->employee->status_pegawai : 'Tidak Diketahui',
                $pic->uraian_tugas ?? 'Tidak Ada',
                $pic->surat_tugas_nomor ?? 'Tidak Ada',
                $pic->surat_tugas_tanggal ?? 'Tidak Ada',
                $pic->tanggal_mulai ?? 'Tidak Ada',
                $pic->tanggal_selesai ?? 'Tidak Ada',

                // Keberangkatan
                $departure ? $departure->mode_transportation : 'Tidak Ada',
                $departure ? $departure->ticket_price : 0,
                $departure ? $departure->ticket_number : 'Tidak Ada',
                $departure ? $departure->booking_code : 'Tidak Ada',
                $departure ? $departure->departure_date : 'Tidak Ada',

                // Kedatangan
                $arrival ? $arrival->moda_transportasi : 'Tidak Ada',
                $arrival ? $arrival->harga_tiket : 0,
                $arrival ? $arrival->nomor_tiket : 'Tidak Ada',
                $arrival ? $arrival->kode_booking : 'Tidak Ada',
                $arrival ? $arrival->arrival_date : 'Tidak Ada',

                // Penginapan
                $lodging ? $lodging->jumlah_malam : 0,
                $lodging ? $lodging->satuan : 0,
                $lodging ? $lodging->total : 0,

                // Uang Harian
                $perdiem ? $perdiem->jumlah_hari : 0,
                $perdiem ? $perdiem->satuan : 0,
                $perdiem ? $perdiem->total : 0,

                // Informasi Tambahan
                $trip->files->count() > 0 ? 'Telah Di Upload' : 'Belum Di Upload',
                $trip->files->count(),
                $trip->created_at->format('Y-m-d H:i:s')
            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Styling baris header
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'F0F0F0']
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER
                ]
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Kolom yang ingin di-merge
                $mergeColumns = [
                    'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'
                ];

                $lastRow = $sheet->getHighestRow();
                $lastColumn = $sheet->getHighestColumn();

                // Set alignment untuk seluruh sheet
                $sheet->getStyle('A1:' . $lastColumn . $lastRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER
                    ],
                    // Tambahkan border untuk seluruh tabel
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => '000000']
                        ]
                    ]
                ]);

                // Border khusus untuk header
                $sheet->getStyle('A1:' . $lastColumn . '1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_MEDIUM,
                            'color' => ['rgb' => '000000']
                        ]
                    ]
                ]);

                foreach ($mergeColumns as $column) {
                    $this->mergeCellsWithSameValue($sheet, $column, $lastRow);
                }

                // Atur tinggi baris
                $sheet->getRowDimension(1)->setRowHeight(30); // Tinggi header

                // Atur tinggi baris data
                for ($row = 2; $row <= $lastRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(20);
                }
            },
        ];
    }

    private function mergeCellsWithSameValue($sheet, string $column, int $lastRow)
    {
        $currentValue = null;
        $startRow = 2;

        for ($row = 2; $row <= $lastRow; $row++) {
            $cellValue = $sheet->getCell($column . $row)->getValue();

            if ($cellValue !== $currentValue) {
                if ($currentValue !== null && $startRow !== $row - 1) {
                    $sheet->mergeCells($column . $startRow . ':' . $column . ($row - 1));
                }

                $currentValue = $cellValue;
                $startRow = $row;
            }
        }

        // Merge the last group of cells
        if ($startRow !== $lastRow) {
            $sheet->mergeCells($column . $startRow . ':' . $column . $lastRow);
        }
    }
}
