<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Models\BusinessTrip;
use App\Models\Departure;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Employee;
use App\Models\Lodging;
use App\Models\Perdiem;
use App\Models\Pic;
use App\Models\TripFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Seksi;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


use App\Exports\BusinessTripExport;
use Maatwebsite\Excel\Facades\Excel;

class PerdisController extends Controller
{
    // Method helper untuk mendapatkan user yang sedang login
    private function getCurrentUser()
    {
        return Auth::user();
    }


    public function getDataPerdis(Request $request)
    {
        // Log awal request
        Log::channel('perdis_debug')->info('Memulai Proses Pengambilan Data Perjalanan Dinas', [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'request_data' => $request->all(),
            'user_agent' => $request->header('User-Agent'),
            'ip_address' => $request->ip()
        ]);

        try {

            $user = $this->getCurrentUser();
            $seksiList = $this->getSeksiList();
            // Tambahkan baris ini untuk mendapatkan daftar status berkas
            $statusBerkasList = $this->getStatusBerkasList();

            // Debug validasi request
            Log::channel('perdis_debug')->info('Memulai Validasi Request', [
                'input_data' => $request->all()
            ]);

            $query = $this->buildQueryWithFilters($request);

            // Filter berdasarkan seksi untuk non-superadmin
            if ($user->role !== 'superadmin') {
                // Pastikan user memiliki employee dan seksi
                if ($user->employee && $user->employee->seksi_id) {
                    $query->whereHas('pics.employee', function ($q) use ($user) {
                        $q->where('seksi_id', $user->employee->seksi_id);
                    });
                } else {
                    // Jika user tidak memiliki seksi, kembalikan query kosong
                    $query->whereRaw('1 = 0');
                }
            }

            // Debug query yang dibangun
            Log::channel('perdis_debug')->info('Query yang Dibangun', [
                'sql' => $query->toSql(),
                'bindings' => $query->getBindings(),
                'filter_conditions' => [
                    'nomor_spm' => $request->nomor_spm,
                    'nomor_sp2d' => $request->nomor_sp2d,
                    'nama_pelaksana' => $request->nama_pelaksana,
                    'status_pegawai' => $request->status_pegawai,
                    'tanggal_mulai' => $request->tanggal_mulai,
                    'tanggal_selesai' => $request->tanggal_selesai,
                    'biaya_min' => $request->biaya_min,
                    'biaya_max' => $request->biaya_max
                ]
            ]);

            $trips = $query->paginate(10);

            // Debug hasil query
            Log::channel('perdis_debug')->info('Hasil Query Perjalanan Dinas', [
                'total_records' => $trips->total(),
                'current_page' => $trips->currentPage(),
                'per_page' => $trips->perPage(),
                'last_page' => $trips->lastPage(),
                'from' => $trips->firstItem(),
                'to' => $trips->lastItem(),
                'sample_data' => array_slice($trips->items(), 0, 2) // Ambil 2 data sebagai sampel
            ]);

            // Debug relasi data
            foreach ($trips->take(2) as $trip) {
                Log::channel('perdis_debug')->info('Detail Relasi Data Sample', [
                    'trip_id' => $trip->id,
                    'nomor_spm' => $trip->nomor_spm,
                    'pics_count' => $trip->pics->count(),
                    'has_document' => $trip->document ? true : false,
                    'document_details' => $trip->document ? [
                        'id' => $trip->document->id,
                        'nomor_dokumen' => $trip->document->nomor_dokumen,
                    ] : null,
                    'files' => $trip->files ? $trip->files->map(function ($file) {
                        return [
                            'id' => $file->id,
                            'nama_file' => $file->nama_file,
                            'status_berkas' => $file->status_berkas,  // Ubah dari 'status' ke 'status_berkas'
                            'mime_type' => $file->mime_type,
                            'ukuran_file' => $file->ukuran_file
                        ];
                    })->toArray() : []
                ]);
            }

            return view('formPerdis.getDataPerdis', [
                'trips' => $trips,
                'filters' => $request->all(),
                // Tambahkan variabel statusBerkasList ke view
                'statusBerkasList' => $statusBerkasList,
                'seksiList' => $seksiList // Tambahkan ke view
            ]);
        } catch (\Exception $e) {
            // Log detail error
            Log::channel('perdis_debug')->error('Error dalam Pengambilan Data', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Gagal memuat data perjalanan dinas: ' . $e->getMessage());
        }
    }

    private function buildQueryWithFilters(Request $request)
    {
        $this->validateRequest($request);

        $query = BusinessTrip::query()
            ->with([
                'files' => function ($query) {
                    // Tambahkan eager loading untuk status_berkas
                    $query->select('id', 'business_trip_id', 'nama_file', 'status_berkas', 'mime_type', 'ukuran_file');
                },
                'document' => function ($query) {
                    $query->with('documentType');
                },
                'pics' => function ($query) {
                    $query->with([
                        'employee' => function ($employeeQuery) {
                            // Tambahkan eager loading untuk seksi
                            $employeeQuery->with('seksi');
                        },
                        'departure' => function ($q) {
                            $q->orderBy('departure_date', 'asc');
                        },
                        'arrival' => function ($q) {
                            $q->orderBy('arrival_date', 'asc');
                        },
                        'perdiem' => function ($q) {
                            $q->orderBy('created_at', 'asc');
                        },
                        'lodging' => function ($q) {
                            $q->orderBy('created_at', 'asc');
                        }
                    ]);
                }
            ]);

        // Filter berdasarakan Status Berkas
        $this->applyStatusBerkasFilter($query, $request);

        // Tambahkan filter seksi
        $this->applySeksiFilter($query, $request);

        // Filter Nomor SPM
        if ($request->filled('nomor_spm')) {
            $query->where('nomor_spm', 'like', "%{$request->nomor_spm}%");
        }

        // Filter Nomor SP2D
        if ($request->filled('nomor_sp2d')) {
            $query->where('nomor_sp2d', 'like', "%{$request->nomor_sp2d}%");
        }

        // Filter Nama Pelaksana
        if ($request->filled('nama_pelaksana')) {
            $query->whereHas('pics.employee', function ($q) use ($request) {
                $q->where('nama_pelaksana', 'like', "%{$request->nama_pelaksana}%");
            });
        }

        // Filter Status Pegawai
        if ($request->filled('status_pegawai')) {
            $query->whereHas('pics.employee', function ($q) use ($request) {
                $q->where('status_pegawai', $request->status_pegawai);
            });
        }

        // Filter Biaya
        $this->applyBiayaFilter($query, $request);

        // Filter Tanggal
        $this->applyTanggalFilter($query, $request);

        // Filter Nomor Dokumen
        if ($request->filled('nomor_dokumen')) {
            $query->whereHas('document', function ($q) use ($request) {
                $q->where('nomor_dokumen', 'like', "%{$request->nomor_dokumen}%");
            });
        }

        Log::channel('perdis_debug')->info('Query yang dibangun', [
            'query' => $query->toSql(),
            'bindings' => $query->getBindings()
        ]);

        return $query->orderBy('created_at', 'desc');
    }


    // Tambahkan method baru untuk filter status berkas
    private function applyStatusBerkasFilter($query, $request)
    {
        try {
            // Filter status berkas
            if ($request->filled('status_berkas')) {
                switch ($request->status_berkas) {
                    case 'Telah Di Upload':
                        // Tampilkan business_trip yang memiliki file
                        $query->whereHas('files');

                        Log::channel('perdis_debug')->info('Filter Business Trip dengan File', [
                            'status' => 'Telah Di Upload'
                        ]);
                        break;

                    case 'Belum Di Upload':
                        // Tampilkan business_trip yang TIDAK memiliki file
                        $query->whereDoesntHave('files');

                        Log::channel('perdis_debug')->info('Filter Business Trip Tanpa File', [
                            'status' => 'Belum Di Upload'
                        ]);
                        break;
                }
            }
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Error dalam Penerapan Filter Status Berkas', [
                'error_message' => $e->getMessage(),
                'status_berkas' => $request->status_berkas
            ]);
            throw $e;
        }
    }

    // Tambahkan method untuk mendapatkan daftar status berkas
    public function getStatusBerkasList()
    {
        try {
            // Ambil daftar status berkas unik dari database
            $statusBerkasList = TripFile::distinct('status_berkas')
                ->pluck('status_berkas')
                ->filter() // Hapus nilai null atau kosong
                ->values()
                ->toArray();

            Log::channel('perdis_debug')->info('Daftar Status Berkas Berhasil Diambil', [
                'status_berkas_list' => $statusBerkasList
            ]);

            return $statusBerkasList;
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Gagal Mengambil Daftar Status Berkas', [
                'error_message' => $e->getMessage()
            ]);

            return [];
        }
    }

    private function validateRequest(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nomor_spm' => 'nullable|string|max:255',
                'nomor_sp2d' => 'nullable|string|max:255',
                'nama_pelaksana' => 'nullable|string|max:255',
                'nomor_dokumen' => 'nullable|string|max:255',
                'status_pegawai' => 'nullable|string|in:KLHK,Non KLHK',
                'biaya_min' => 'nullable|numeric|min:0',
                'biaya_max' => 'nullable|numeric|min:0',
                'tanggal_mulai' => 'nullable|date',
                'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
                'status_berkas' => 'nullable|string|max:255',
                'status_berkas_multiple' => 'nullable|array', // Tambahkan validasi untuk filter multiple
                'status_berkas_multiple.*' => 'string|max:255', // Validasi setiap item dalam array
                'seksi_id' => 'nullable|exists:seksis,id', // Tambahkan validasi untuk seksi_id
            ]);

            if ($validator->fails()) {
                Log::channel('perdis_debug')->warning('Validasi Gagal', [
                    'errors' => $validator->errors()->toArray(),
                    'input' => $request->all()
                ]);
                throw new \Exception('Validasi input gagal: ' . $validator->errors()->first());
            }

            Log::channel('perdis_debug')->info('Validasi Berhasil', [
                'validated_data' => $validator->validated()
            ]);
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Error dalam Validasi', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine()
            ]);
            throw $e;
        }
    }

    private function applyBiayaFilter($query, $request)
    {
        try {
            if ($request->filled('biaya_min')) {
                $query->where('grand_total', '>=', $request->biaya_min);
                Log::channel('perdis_debug')->info('Filter Biaya Minimum Diterapkan', [
                    'biaya_min' => $request->biaya_min
                ]);
            }

            if ($request->filled('biaya_max')) {
                $query->where('grand_total', '<=', $request->biaya_max);
                Log::channel('perdis_debug')->info('Filter Biaya Maksimum Diterapkan', [
                    'biaya_max' => $request->biaya_max
                ]);
            }
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Error dalam Penerapan Filter Biaya', [
                'error_message' => $e->getMessage(),
                'biaya_min' => $request->biaya_min,
                'biaya_max' => $request->biaya_max
            ]);
            throw $e;
        }
    }

    private function applyTanggalFilter($query, $request)
    {
        try {
            if ($request->filled('tanggal_mulai')) {
                $query->whereHas('pics', function ($q) use ($request) {
                    $q->where('tanggal_mulai', '>=', $request->tanggal_mulai);
                });
                Log::channel('perdis_debug')->info('Filter Tanggal Mulai Diterapkan', [
                    'tanggal_mulai' => $request->tanggal_mulai
                ]);
            }

            if ($request->filled('tanggal_selesai')) {
                $query->whereHas('pics', function ($q) use ($request) {
                    $q->where('tanggal_selesai', '<=', $request->tanggal_selesai);
                });
                Log::channel('perdis_debug')->info('Filter Tanggal Selesai Diterapkan', [
                    'tanggal_selesai' => $request->tanggal_selesai
                ]);
            }
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Error dalam Penerapan Filter Tanggal', [
                'error_message' => $e->getMessage(),
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai
            ]);
            throw $e;
        }
    }

    // Tambahkan method baru untuk filter seksi
    private function applySeksiFilter($query, $request)
    {
        try {
            // Filter berdasarkan ID Seksi
            if ($request->filled('seksi_id')) {
                $query->whereHas('pics.employee', function ($q) use ($request) {
                    $q->where('seksi_id', $request->seksi_id);
                });

                Log::channel('perdis_debug')->info('Filter Seksi ID Diterapkan', [
                    'seksi_id' => $request->seksi_id
                ]);
            }

            // Filter berdasarkan Nama Seksi
            if ($request->filled('nama_seksi')) {
                $query->whereHas('pics.employee.seksi', function ($q) use ($request) {
                    $q->where('nama_seksi', $request->nama_seksi);
                });

                Log::channel('perdis_debug')->info('Filter Nama Seksi Diterapkan', [
                    'nama_seksi' => $request->nama_seksi
                ]);
            }
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Error dalam Penerapan Filter Seksi', [
                'error_message' => $e->getMessage(),
                'seksi_id' => $request->seksi_id,
                'nama_seksi' => $request->nama_seksi
            ]);
            throw $e;
        }
    }

    public function create()
    {
        Log::channel('perdis_debug')->info('Memulai Proses Menampilkan Form Create Perjalanan Dinas', [
            'timestamp' => now()->format('Y-m-d H:i:s')
        ]);

        try {
            $user = $this->getCurrentUser();
            // Ambil data jenis dokumen dan pegawai untuk dropdown
            $documentTypes = DocumentType::all();
            // $employees = Employee::all();

            // Filter pegawai berdasarkan kondisi
            if ($user->role === 'superadmin') {
                $employees = Employee::all();
            } else {
                // Untuk non-superadmin, ambil pegawai dari seksi yang sama
                if ($user->employee && $user->employee->seksi_id) {
                    $employees = Employee::where('seksi_id', $user->employee->seksi_id)->get();
                } else {
                    // Jika user tidak memiliki seksi, kembalikan collection kosong
                    $employees = collect([]);
                }
            }

            $seksis = $employees->pluck('seksi')->unique('id')->filter();

            Log::channel('perdis_debug')->info('Data Berhasil Diambil', [
                'document_types_count' => $documentTypes->count(),
                'employees_count' => $employees->count(),
                'seksis_count' => $seksis->count(), // Tambahkan logging untuk seksi
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);

            return view('formPerdis.create', compact('documentTypes', 'employees', 'seksis'));
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Gagal Mengambil Data untuk Form Create', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
                'timestamp' => now()->format('Y-m-d H:i:s')
            ]);

            return redirect()->back()->with('error', 'Gagal menampilkan form create perjalanan dinas: ' . $e->getMessage());
        }
    }

    // Tambahkan method untuk mendapatkan daftar seksi (opsional)
    public function getSeksiList()
    {
        try {
            $seksiList = Seksi::orderBy('nama_seksi', 'asc')->get();

            Log::channel('perdis_debug')->info('Daftar Seksi Berhasil Diambil', [
                'total_seksi' => $seksiList->count(),
                'seksi_names' => $seksiList->pluck('nama_seksi')->toArray()
            ]);

            return $seksiList;
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Gagal Mengambil Daftar Seksi', [
                'error_message' => $e->getMessage()
            ]);

            return collect([]); // Kembalikan collection kosong
        }
    }

    // public function store(Request $request)
    // {
    //     Log::channel('perdis_debug')->info('Memulai Proses Penyimpanan Perjalanan Dinas', [
    //         'timestamp' => now()->format('Y-m-d H:i:s'),
    //         'request_data' => $request->all(),
    //         'ip_address' => $request->ip(),
    //         'user_agent' => $request->header('User-Agent')
    //     ]);

    //     try {

    //         $user = $this->getCurrentUser();

    //         // Validasi data utama
    //         $validatedMainData = $request->validate([
    //             'jenis_dokumen_id' => 'required|exists:document_types,id',
    //             'nomor_dokumen' => 'required|string|unique:documents,nomor_dokumen',
    //             'tanggal_pembuatan' => 'required|date',
    //             'nomor_spm' => 'required|string|unique:business_trips,nomor_spm',
    //             'nomor_sp2d' => 'required|string|unique:business_trips,nomor_sp2d',
    //             'transport_antar_kota' => 'nullable|numeric',
    //             'taksi_airport' => 'nullable|numeric',
    //             'lain_lain' => 'nullable|numeric',
    //         ]);

    //         // Validasi pelaksana dengan aturan yang lebih fleksibel
    //         $validatedPelaksanaData = $request->validate([
    //             'pelaksana' => 'required|array|min:1',
    //             'pelaksana.*.employee_id' => [
    //                 'required',
    //                 'exists:employees,id',
    //                 function ($attribute, $value, $fail) use ($user) {
    //                     $employee = Employee::find($value);

    //                     // Jika bukan superadmin, pastikan pegawai dari seksi yang sama
    //                     if ($user->role !== 'superadmin') {
    //                         $userEmployee = $user->employee;

    //                         if (!$userEmployee || $employee->seksi_id !== $userEmployee->seksi_id) {
    //                             $fail('Anda hanya dapat menambahkan pegawai dari seksi Anda sendiri.');
    //                         }
    //                     }
    //                 }
    //             ],

    //             'pelaksana.*.uraian_tugas' => 'required|string',
    //             'pelaksana.*.surat_tugas_nomor' => 'required|string|max:50',
    //             'pelaksana.*.surat_tugas_tanggal' => 'required|date',
    //             'pelaksana.*.tanggal_mulai' => 'required|date',
    //             'pelaksana.*.tanggal_selesai' => 'required|date',

    //             // Validasi opsional untuk detail tambahan
    //             'pelaksana.*.departures' => 'sometimes|array',
    //             'pelaksana.*.departures.*.mode_transportation' => 'sometimes|string',
    //             'pelaksana.*.departures.*.ticket_price' => 'sometimes|numeric',
    //             'pelaksana.*.departures.*.ticket_number' => 'sometimes|string',
    //             'pelaksana.*.departures.*.booking_code' => 'sometimes|string',
    //             'pelaksana.*.departures.*.departure_date' => 'sometimes|date',

    //             'pelaksana.*.arrivals' => 'sometimes|array',
    //             'pelaksana.*.arrivals.*.mode_transportation' => 'sometimes|string',
    //             'pelaksana.*.arrivals.*.ticket_price' => 'sometimes|numeric',
    //             'pelaksana.*.arrivals.*.ticket_number' => 'sometimes|string',
    //             'pelaksana.*.arrivals.*.booking_code' => 'sometimes|string',
    //             'pelaksana.*.arrivals.*.arrival_date' => 'sometimes|date',

    //             'pelaksana.*.lodgings' => 'sometimes|array',
    //             'pelaksana.*.lodgings.*.jumlah_malam' => 'sometimes|numeric',
    //             'pelaksana.*.lodgings.*.satuan' => 'sometimes|numeric',

    //             'pelaksana.*.perdiems' => 'sometimes|array',
    //             'pelaksana.*.perdiems.*.jumlah_hari' => 'sometimes|numeric',
    //             'pelaksana.*.perdiems.*.satuan' => 'sometimes|numeric',
    //         ]);

    //         // Mulai transaksi database
    //         DB::beginTransaction();

    //         // Buat dokumen
    //         $document = Document::create([
    //             'jenis_dokumen_id' => $validatedMainData['jenis_dokumen_id'],
    //             'nomor_dokumen' => $validatedMainData['nomor_dokumen'],
    //             'tanggal_pembuatan' => $validatedMainData['tanggal_pembuatan'],
    //         ]);

    //         // Hitung grand total
    //         $grandTotal =
    //             ($validatedMainData['transport_antar_kota'] ?? 0) +
    //             ($validatedMainData['taksi_airport'] ?? 0) +
    //             ($validatedMainData['lain_lain'] ?? 0);

    //         // Buat perjalanan dinas
    //         $businessTrip = BusinessTrip::create([
    //             'document_id' => $document->id,
    //             'nomor_spm' => $validatedMainData['nomor_spm'],
    //             'nomor_sp2d' => $validatedMainData['nomor_sp2d'],
    //             'transport_antar_kota' => $validatedMainData['transport_antar_kota'] ?? 0,
    //             'taksi_airport' => $validatedMainData['taksi_airport'] ?? 0,
    //             'lain_lain' => $validatedMainData['lain_lain'] ?? 0,
    //             'grand_total' => $grandTotal,
    //         ]);

    //         // Proses dan simpan pelaksana beserta detail
    //         foreach ($validatedPelaksanaData['pelaksana'] as $pelaksanaData) {
    //             $employee = Employee::findOrFail($pelaksanaData['employee_id']);

    //             //                // Pastikan seksi_id sesuai dengan seksi pegawai
    //             //                if ($employee->seksi_id !== $pelaksanaData['seksi_id']) {
    //             //                    throw new \Exception("Seksi tidak sesuai dengan pegawai yang dipilih");
    //             //                }

    //             $pic = Pic::create([
    //                 'business_trip_id' => $businessTrip->id,
    //                 'employee_id' => $pelaksanaData['employee_id'],
    //                 'uraian_tugas' => $pelaksanaData['uraian_tugas'],
    //                 'surat_tugas_nomor' => Str::limit($pelaksanaData['surat_tugas_nomor'], 50),
    //                 'surat_tugas_tanggal' => $pelaksanaData['surat_tugas_tanggal'],
    //                 'tanggal_mulai' => $pelaksanaData['tanggal_mulai'],
    //                 'tanggal_selesai' => $pelaksanaData['tanggal_selesai'],
    //             ]);



    //             // Simpan keberangkatan
    //             if (!empty($pelaksanaData['departures'])) {
    //                 foreach ($pelaksanaData['departures'] as $departureData) {
    //                     Departure::create([
    //                         'pic_id' => $pic->id,
    //                         'mode_transportation' => $departureData['mode_transportation'] ?? null,
    //                         'ticket_price' => $departureData['ticket_price'] ?? 0,
    //                         'ticket_number' => $departureData['ticket_number'] ?? null,
    //                         'booking_code' => $departureData['booking_code'] ?? null,
    //                         'departure_date' => $departureData['departure_date'] ?? null,
    //                     ]);

    //                     // Tambahkan ke grand total
    //                     $grandTotal += $departureData['ticket_price'] ?? 0;
    //                 }
    //             }

    //             // Simpan kedatangan
    //             if (!empty($pelaksanaData['arrivals'])) {
    //                 foreach ($pelaksanaData['arrivals'] as $arrivalData) {
    //                     Arrival::create([
    //                         'pic_id' => $pic->id,
    //                         'moda_transportasi' => $arrivalData['mode_transportation'] ?? null,
    //                         'harga_tiket' => $arrivalData['ticket_price'] ?? 0,
    //                         'nomor_tiket' => $arrivalData['ticket_number'] ?? null,
    //                         'kode_booking' => $arrivalData['booking_code'] ?? null,
    //                         'arrival_date' => $arrivalData['arrival_date'] ?? null,
    //                     ]);

    //                     // Tambahkan ke grand total
    //                     $grandTotal += $arrivalData['ticket_price'] ?? 0;
    //                 }
    //             }

    //             // Simpan penginapan
    //             if (!empty($pelaksanaData['lodgings'])) {
    //                 foreach ($pelaksanaData['lodgings'] as $lodgingData) {
    //                     $total = ($lodgingData['jumlah_malam'] ?? 0) * ($lodgingData['satuan'] ?? 0);
    //                     Lodging::create([
    //                         'pic_id' => $pic->id,
    //                         'jumlah_malam' => $lodgingData['jumlah_malam'] ?? 0,
    //                         'satuan' => $lodgingData['satuan'] ?? 0,
    //                         'total' => $total,
    //                     ]);

    //                     // Tambahkan ke grand total
    //                     $grandTotal += $total;
    //                 }
    //             }

    //             // Simpan uang harian
    //             if (!empty($pelaksanaData['perdiems'])) {
    //                 foreach ($pelaksanaData['perdiems'] as $perdiem) {
    //                     $total = ($perdiem['jumlah_hari'] ?? 0) * ($perdiem['satuan'] ?? 0);
    //                     Perdiem::create([
    //                         'pic_id' => $pic->id,
    //                         'jumlah_hari' => $perdiem['jumlah_hari'] ?? 0,
    //                         'satuan' => $perdiem['satuan'] ?? 0,
    //                         'total' => $total,
    //                     ]);

    //                     // Tambahkan ke grand total
    //                     $grandTotal += $total;
    //                 }
    //             }
    //         }

    //         // Update grand total
    //         $businessTrip->update(['grand_total' => $grandTotal]);

    //         Log::channel('perdis_debug')->info('Pelaksana Disimpan', [
    //             'pic_id' => $pic->id,
    //             'employee_id' => $pelaksanaData['employee_id'],
    //             //                'seksi_id' => $employee->seksi_id
    //         ]);


    //         DB::commit();

    //         return redirect()->route('perdis.get')
    //             ->with('success', 'Perjalanan dinas berhasil disimpan');
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         Log::channel('perdis_debug')->error('Gagal Menyimpan Perjalanan Dinas', [
    //             'error_message' => $e->getMessage(),
    //             'error_code' => $e->getCode(),
    //             'error_file' => $e->getFile(),
    //             'error_line' => $e->getLine(),
    //             'stack_trace' => $e->getTraceAsString(),
    //             'request_data' => $request->all(),
    //         ]);

    //         return redirect()->back()
    //             ->withInput()
    //             ->with('error', 'Gagal menyimpan perjalanan dinas: ' . $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        Log::channel('perdis_debug')->info('Memulai Proses Penyimpanan Perjalanan Dinas', [
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'request_data' => $request->all(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent')
        ]);

        try {
            $user = $this->getCurrentUser();

            // Validasi data utama
            $validator = Validator::make($request->all(), [
                'jenis_dokumen_id' => 'required|exists:document_types,id',
                'nomor_dokumen' => 'required|string|unique:documents,nomor_dokumen',
                'tanggal_pembuatan' => 'required|date',
                'nomor_spm' => 'required|string|unique:business_trips,nomor_spm',
                'nomor_sp2d' => 'required|string|unique:business_trips,nomor_sp2d',
                'transport_antar_kota' => 'nullable|numeric',
                'taksi_airport' => 'nullable|numeric',
                'lain_lain' => 'nullable|numeric',
                'pelaksana' => 'required|array|min:1',
                'pelaksana.*.employee_id' => [
                    'required',
                    'exists:employees,id',
                    function ($attribute, $value, $fail) use ($user) {
                        $employee = Employee::find($value);

                        // Jika bukan superadmin, pastikan pegawai dari seksi yang sama
                        if ($user->role !== 'superadmin') {
                            $userEmployee = $user->employee;

                            if (!$userEmployee || $employee->seksi_id !== $userEmployee->seksi_id) {
                                $fail('Anda hanya dapat menambahkan pegawai dari seksi Anda sendiri.');
                            }
                        }
                    }
                ],
                'pelaksana.*.uraian_tugas' => 'required|string',
                'pelaksana.*.surat_tugas_nomor' => 'required|string|max:50',
                'pelaksana.*.surat_tugas_tanggal' => 'required|date',
                'pelaksana.*.tanggal_mulai' => 'required|date',
                'pelaksana.*.tanggal_selesai' => 'required|date|after_or_equal:pelaksana.*.tanggal_mulai',

                // Validasi opsional untuk detail tambahan (dengan pesan error kustom)
                'pelaksana.*.departures' => 'sometimes|array|min:1',
                'pelaksana.*.departures.*.mode_transportation' => 'required|string',
                'pelaksana.*.departures.*.ticket_price' => 'required|numeric',
                'pelaksana.*.departures.*.ticket_number' => 'required|string',
                'pelaksana.*.departures.*.booking_code' => 'required|string',
                'pelaksana.*.departures.*.departure_date' => 'required|date',

                'pelaksana.*.arrivals' => 'sometimes|array|min:1',
                'pelaksana.*.arrivals.*.mode_transportation' => 'required|string',
                'pelaksana.*.arrivals.*.ticket_price' => 'required|numeric',
                'pelaksana.*.arrivals.*.ticket_number' => 'required|string',
                'pelaksana.*.arrivals.*.booking_code' => 'required|string',
                'pelaksana.*.arrivals.*.arrival_date' => 'required|date',

                'pelaksana.*.lodgings' => 'sometimes|array',
                'pelaksana.*.lodgings.*.jumlah_malam' => 'required|numeric',
                'pelaksana.*.lodgings.*.satuan' => 'required|numeric',

                'pelaksana.*.perdiems' => 'sometimes|array|min:1',
                'pelaksana.*.perdiems.*.jumlah_hari' => 'required|numeric',
                'pelaksana.*.perdiems.*.satuan' => 'required|numeric',
            ], [
                'jenis_dokumen_id.required' => 'Jenis dokumen wajib dipilih',
                'nomor_dokumen.required' => 'Nomor dokumen wajib diisi',
                'nomor_dokumen.unique' => 'Nomor dokumen sudah digunakan',
                'tanggal_pembuatan.required' => 'Tanggal pembuatan dokumen wajib diisi',
                'nomor_spm.required' => 'Nomor SPM wajib diisi',
                'nomor_spm.unique' => 'Nomor SPM sudah digunakan',
                'nomor_sp2d.required' => 'Nomor SP2D wajib diisi',
                'nomor_sp2d.unique' => 'Nomor SP2D sudah digunakan',
                'pelaksana.required' => 'Minimal satu pelaksana harus ditambahkan',
                'pelaksana.*.employee_id.required' => 'Pegawai pelaksana wajib dipilih',
                'pelaksana.*.employee_id.exists' => 'Pegawai yang dipilih tidak valid',
                'pelaksana.*.uraian_tugas.required' => 'Uraian tugas wajib diisi',
                'pelaksana.*.surat_tugas_nomor.required' => 'Nomor surat tugas wajib diisi',
                'pelaksana.*.surat_tugas_tanggal.required' => 'Tanggal surat tugas wajib diisi',
                'pelaksana.*.tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
                'pelaksana.*.tanggal_selesai.required' => 'Tanggal selesai wajib diisi',
                'pelaksana.*.tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai',

                // Pesan error untuk detail keberangkatan
                'pelaksana.*.departures.min' => 'Minimal satu data keberangkatan harus diisi',
                'pelaksana.*.departures.*.mode_transportation.required' => 'Moda transportasi keberangkatan wajib diisi',
                'pelaksana.*.departures.*.ticket_price.required' => 'Harga tiket keberangkatan wajib diisi',
                'pelaksana.*.departures.*.ticket_number.required' => 'Nomor tiket keberangkatan wajib diisi',
                'pelaksana.*.departures.*.booking_code.required' => 'Kode booking keberangkatan wajib diisi',
                'pelaksana.*.departures.*.departure_date.required' => 'Tanggal keberangkatan wajib diisi',

                // Pesan error untuk detail kedatangan
                'pelaksana.*.arrivals.min' => 'Minimal satu data kedatangan harus diisi',
                'pelaksana.*.arrivals.*.mode_transportation.required' => 'Moda transportasi kedatangan wajib diisi',
                'pelaksana.*.arrivals.*.ticket_price.required' => 'Harga tiket kedatangan wajib diisi',
                'pelaksana.*.arrivals.*.ticket_number.required' => 'Nomor tiket kedatangan wajib diisi',
                'pelaksana.*.arrivals.*.booking_code.required' => 'Kode booking kedatangan wajib diisi',
                'pelaksana.*.arrivals.*.arrival_date.required' => 'Tanggal kedatangan wajib diisi',

                // Pesan error untuk penginapan
                'pelaksana.*.lodgings.*.jumlah_malam.required' => 'Jumlah malam penginapan wajib diisi',
                'pelaksana.*.lodgings.*.satuan.required' => 'Biaya per malam penginapan wajib diisi',

                // Pesan error untuk uang harian
                'pelaksana.*.perdiems.min' => 'Minimal satu data uang harian harus diisi',
                'pelaksana.*.perdiems.*.jumlah_hari.required' => 'Jumlah hari uang harian wajib diisi',
                'pelaksana.*.perdiems.*.satuan.required' => 'Biaya per hari uang harian wajib diisi'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error_message', 'Terdapat kesalahan pada data yang diinput. Silakan periksa kembali formulir anda.');
            }

            $validatedData = $validator->validated();

            // Mulai transaksi database
            DB::beginTransaction();

            // Buat dokumen
            $document = Document::create([
                'jenis_dokumen_id' => $validatedData['jenis_dokumen_id'],
                'nomor_dokumen' => $validatedData['nomor_dokumen'],
                'tanggal_pembuatan' => $validatedData['tanggal_pembuatan'],
            ]);

            // Hitung grand total
            $grandTotal =
                ($validatedData['transport_antar_kota'] ?? 0) +
                ($validatedData['taksi_airport'] ?? 0) +
                ($validatedData['lain_lain'] ?? 0);

            // Buat perjalanan dinas
            $businessTrip = BusinessTrip::create([
                'document_id' => $document->id,
                'nomor_spm' => $validatedData['nomor_spm'],
                'nomor_sp2d' => $validatedData['nomor_sp2d'],
                'transport_antar_kota' => $validatedData['transport_antar_kota'] ?? 0,
                'taksi_airport' => $validatedData['taksi_airport'] ?? 0,
                'lain_lain' => $validatedData['lain_lain'] ?? 0,
                'grand_total' => $grandTotal,
            ]);

            // Proses dan simpan pelaksana beserta detail
            foreach ($validatedData['pelaksana'] as $pelaksanaData) {
                $employee = Employee::findOrFail($pelaksanaData['employee_id']);

                $pic = Pic::create([
                    'business_trip_id' => $businessTrip->id,
                    'employee_id' => $pelaksanaData['employee_id'],
                    'uraian_tugas' => $pelaksanaData['uraian_tugas'],
                    'surat_tugas_nomor' => Str::limit($pelaksanaData['surat_tugas_nomor'], 50),
                    'surat_tugas_tanggal' => $pelaksanaData['surat_tugas_tanggal'],
                    'tanggal_mulai' => $pelaksanaData['tanggal_mulai'],
                    'tanggal_selesai' => $pelaksanaData['tanggal_selesai'],
                ]);



                // Simpan keberangkatan
                if (!empty($pelaksanaData['departures'])) {
                    foreach ($pelaksanaData['departures'] as $departureData) {
                        Departure::create([
                            'pic_id' => $pic->id,
                            'mode_transportation' => $departureData['mode_transportation'] ?? null,
                            'ticket_price' => $departureData['ticket_price'] ?? 0,
                            'ticket_number' => $departureData['ticket_number'] ?? null,
                            'booking_code' => $departureData['booking_code'] ?? null,
                            'departure_date' => $departureData['departure_date'] ?? null,
                        ]);

                        // Tambahkan ke grand total
                        $grandTotal += $departureData['ticket_price'] ?? 0;
                    }
                }

                // Simpan kedatangan
                if (!empty($pelaksanaData['arrivals'])) {
                    foreach ($pelaksanaData['arrivals'] as $arrivalData) {
                        Arrival::create([
                            'pic_id' => $pic->id,
                            'moda_transportasi' => $arrivalData['mode_transportation'] ?? null,
                            'harga_tiket' => $arrivalData['ticket_price'] ?? 0,
                            'nomor_tiket' => $arrivalData['ticket_number'] ?? null,
                            'kode_booking' => $arrivalData['booking_code'] ?? null,
                            'arrival_date' => $arrivalData['arrival_date'] ?? null,
                        ]);

                        // Tambahkan ke grand total
                        $grandTotal += $arrivalData['ticket_price'] ?? 0;
                    }
                }

                // Simpan penginapan
                if (!empty($pelaksanaData['lodgings'])) {
                    foreach ($pelaksanaData['lodgings'] as $lodgingData) {
                        $total = ($lodgingData['jumlah_malam'] ?? 0) * ($lodgingData['satuan'] ?? 0);
                        Lodging::create([
                            'pic_id' => $pic->id,
                            'jumlah_malam' => $lodgingData['jumlah_malam'] ?? 0,
                            'satuan' => $lodgingData['satuan'] ?? 0,
                            'total' => $total,
                        ]);

                        // Tambahkan ke grand total
                        $grandTotal += $total;
                    }
                }

                // Simpan uang harian
                if (!empty($pelaksanaData['perdiems'])) {
                    foreach ($pelaksanaData['perdiems'] as $perdiem) {
                        $total = ($perdiem['jumlah_hari'] ?? 0) * ($perdiem['satuan'] ?? 0);
                        Perdiem::create([
                            'pic_id' => $pic->id,
                            'jumlah_hari' => $perdiem['jumlah_hari'] ?? 0,
                            'satuan' => $perdiem['satuan'] ?? 0,
                            'total' => $total,
                        ]);

                        // Tambahkan ke grand total
                        $grandTotal += $total;
                    }
                }
            }

            // Update grand total
            $businessTrip->update(['grand_total' => $grandTotal]);

            Log::channel('perdis_debug')->info('Pelaksana Disimpan', [
                'pic_id' => $pic->id,
                'employee_id' => $pelaksanaData['employee_id'],
            ]);


            DB::commit();

            return redirect()->route('perdis.get')
                ->with('success', 'Perjalanan dinas berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('perdis_debug')->error('Gagal Menyimpan Perjalanan Dinas', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            // Tampilkan pesan error yang lebih spesifik
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan perjalanan dinas: ' . $e->getMessage());
        }
    }



    public function show($id)
    {
        Log::channel('perdis_debug')->info('Memulai Proses Pengambilan Detail Perjalanan Dinas', [
            'trip_id' => $id,
            'timestamp' => now()->format('Y-m-d H:i:s')
        ]);

        try {
            $trip = BusinessTrip::with([
                'document.documentType',
                'pics.employee',
                'pics.departure',  // Ubah dari departure
                'pics.arrival',    // Ubah dari arrival
                'pics.perdiem',    // Ubah dari perdiem
                'pics.lodging'     // Ubah dari lodging
            ])->findOrFail($id);

            Log::channel('perdis_debug')->info('Detail Perjalanan Dinas Ditemukan', [
                'trip_id' => $trip->id,
                'nomor_spm' => $trip->nomor_spm,
                'pics_count' => $trip->pics->count(),
                'document_exists' => $trip->document ? true : false
            ]);

            return view('formPerdis.show', compact('trip'));
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Gagal Mengambil Detail Perjalanan Dinas', [
                'trip_id' => $id,
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('perdis.get')
                ->with('error', 'Gagal memuat detail perjalanan dinas: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        try {
            $user = $this->getCurrentUser();

            // Query dasar
            $query = BusinessTrip::with([
                'pics.employee',
                'files',
                'document'
            ]);

            // Jika bukan superadmin, filter berdasarkan seksi
            if ($user->role !== 'superadmin') {
                $query->whereHas('pics.employee', function ($q) use ($user) {
                    $q->whereHas('user', function ($userQuery) use ($user) {
                        $userQuery->where('id', $user->id);
                    });
                });
            }

            $businessTrip = $query->findOrFail($id);

            DB::beginTransaction();

            // Proses penghapusan
            $this->cascadeDelete($businessTrip);

            DB::commit();

            return redirect()->route('perdis.get')
                ->with('success', 'Perjalanan dinas berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('perdis_debug')->error('Gagal Menghapus Perjalanan Dinas', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()->back()
                ->with('error', 'Gagal menghapus perjalanan dinas: ' . $e->getMessage());
        }
    }

    // Method helper untuk log action
    private function logAction($message, $businessTrip)
    {
        Log::channel('perdis_debug')->info($message, [
            'business_trip_id' => $businessTrip->id,
            'nomor_spm' => $businessTrip->nomor_spm ?? 'N/A',
            'timestamp' => now()->format('Y-m-d H:i:s'),
            // 'user' => optional(auth()->user())->name ?? 'Unauthenticated'
        ]);
    }

    // Method helper untuk menangani error
    private function handleDeleteError($id, $exception)
    {
        Log::channel('perdis_debug')->error('Gagal Menghapus Perjalanan Dinas', [
            'business_trip_id' => $id,
            'error_message' => $exception->getMessage(),
            'error_code' => $exception->getCode(),
            'error_file' => $exception->getFile(),
            'error_line' => $exception->getLine(),
            'stack_trace' => $exception->getTraceAsString(),
            'timestamp' => now()->format('Y-m-d H:i:s'),
            // 'user' => optional(auth()->user())->name ?? 'Unauthenticated'
        ]);

        return redirect()->back()
            ->with('error', 'Gagal menghapus perjalanan dinas: ' . $exception->getMessage());
    }

    // Method untuk cascade delete
    private function cascadeDelete(BusinessTrip $businessTrip)
    {
        // Hapus file-file dari storage terlebih dahulu
        $this->deleteFilesFromStorage($businessTrip);

        // Ambil semua PIC terkait dengan business trip
        $pics = Pic::where('business_trip_id', $businessTrip->id)->get();

        foreach ($pics as $pic) {
            // Hapus data terkait PIC dengan query langsung
            Departure::where('pic_id', $pic->id)->delete();
            Arrival::where('pic_id', $pic->id)->delete();
            Perdiem::where('pic_id', $pic->id)->delete();
            Lodging::where('pic_id', $pic->id)->delete();

            // Hapus PIC
            $pic->delete();
        }

        // Hapus file-file terkait dari database
        TripFile::where('business_trip_id', $businessTrip->id)->delete();

        // Hapus dokumen jika tidak ada referensi lain
        $document = Document::find($businessTrip->document_id);

        // Hapus business trip
        $businessTrip->delete();

        // Hapus dokumen jika tidak ada referensi lagi
        if ($document && !BusinessTrip::where('document_id', $document->id)->exists()) {
            $document->delete();
        }
    }

    // Method untuk menghapus file dari storage
    private function deleteFilesFromStorage(BusinessTrip $businessTrip)
    {
        // Ambil semua file terkait business trip
        $tripFiles = TripFile::where('business_trip_id', $businessTrip->id)->get();

        foreach ($tripFiles as $tripFile) {
            // Hapus file dari storage
            if (Storage::exists($tripFile->path_file)) {
                Storage::delete($tripFile->path_file);
            }
        }
    }

    public function exportExcel(Request $request)
    {
        try {
            // Validasi request
            $this->validateRequest($request);

            // Generate nama file
            $filename = 'Laporan_Perjalanan_Dinas_' . now()->format('YmdHis') . '.xlsx';

            // Log aktivitas export
            Log::channel('perdis_debug')->info('Memulai Export Excel', [
                'filter_params' => $request->all(),

            ]);

            // Download Excel
            return Excel::download(
                new BusinessTripExport($request),
                $filename
            );
        } catch (\Exception $e) {
            // Log error
            Log::channel('perdis_debug')->error('Gagal Export Excel', [
                'error_message' => $e->getMessage(),
                'request_data' => $request->all()
            ]);

            return redirect()->back()->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        Log::channel('perdis_debug')->info('Memulai Proses Edit Perjalanan Dinas', [
            'trip_id' => $id,
            'timestamp' => now()->format('Y-m-d H:i:s')
        ]);

        try {
            $user = $this->getCurrentUser();

            // Query untuk mengambil data perjalanan dinas dengan relasi lengkap
            $query = BusinessTrip::with([
                'document.documentType',
                'pics' => function ($query) {
                    $query->with([
                        'employee' => function ($employeeQuery) {
                            $employeeQuery->with('seksi');
                        },
                        'departure' => function ($q) {
                            $q->orderBy('departure_date', 'asc');
                        },
                        'arrival' => function ($q) {
                            $q->orderBy('arrival_date', 'asc');
                        },
                        'perdiem',
                        'lodging'
                    ]);
                }
            ]);



            // Jika bukan superadmin, filter berdasarkan seksi
            if ($user->role !== 'superadmin') {
                $query->whereHas('pics.employee', function ($q) use ($user) {
                    $q->where('seksi_id', $user->employee->seksi_id);
                });
            }

            $trip = $query->findOrFail($id);

            // Transform tanggal pembuatan dokumen
            $trip->document->tanggal_pembuatan = $trip->document->tanggal_pembuatan
                ? Carbon::parse($trip->document->tanggal_pembuatan)->format('Y-m-d')
                : null;

            // Format tanggal untuk konsistensi
            $trip->pics->transform(function ($pic) {
                $pic->surat_tugas_tanggal = $pic->surat_tugas_tanggal
                    ? Carbon::parse($pic->surat_tugas_tanggal)->format('Y-m-d')
                    : null;
                $pic->tanggal_mulai = $pic->tanggal_mulai
                    ? Carbon::parse($pic->tanggal_mulai)->format('Y-m-d')
                    : null;
                $pic->tanggal_selesai = $pic->tanggal_selesai
                    ? Carbon::parse($pic->tanggal_selesai)->format('Y-m-d')
                    : null;

                // Format tanggal keberangkatan dan kedatangan
                $pic->departure->transform(function ($departure) {
                    $departure->departure_date = $departure->departure_date
                        ? Carbon::parse($departure->departure_date)->format('Y-m-d')
                        : null;
                    return $departure;
                });

                $pic->arrival->transform(function ($arrival) {
                    $arrival->arrival_date = $arrival->arrival_date
                        ? Carbon::parse($arrival->arrival_date)->format('Y-m-d')
                        : null;
                    return $arrival;
                });

                return $pic;
            });

            // Ambil data pendukung
            $documentTypes = DocumentType::all();

            // Filter pegawai berdasarkan role dan seksi
            $employees = $user->role === 'superadmin'
                ? Employee::all()
                : Employee::where('seksi_id', $user->employee->seksi_id)->get();

            $seksis = $employees->pluck('seksi')->unique('id')->filter();

            Log::channel('perdis_debug')->info('Data Edit Berhasil Diambil', [
                'trip_id' => $trip->id,
                'document_types_count' => $documentTypes->count(),
                'employees_count' => $employees->count(),
                'pics_count' => $trip->pics->count()
            ]);

            return view('formPerdis.edit', compact('trip', 'documentTypes', 'employees', 'seksis'));
        } catch (\Exception $e) {
            Log::channel('perdis_debug')->error('Gagal Memuat Data Edit Perjalanan Dinas', [
                'trip_id' => $id,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('perdis.get')
                ->with('error', 'Gagal memuat data edit perjalanan dinas: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->getCurrentUser();

            // Definisikan $businessTrip terlebih dahulu
            $businessTrip = BusinessTrip::findOrFail($id);

            // Validasi data utama
            $validatedMainData = $request->validate([
                'jenis_dokumen_id' => 'required|exists:document_types,id',
                'nomor_dokumen' => [
                    'required',
                    'string',
                    Rule::unique('documents', 'nomor_dokumen')->ignore($businessTrip->document_id)
                ],
                'tanggal_pembuatan' => 'required|date',
                'nomor_spm' => [
                    'required',
                    'string',
                    Rule::unique('business_trips', 'nomor_spm')->ignore($id)
                ],
                'nomor_sp2d' => [
                    'required',
                    'string',
                    Rule::unique('business_trips', 'nomor_sp2d')->ignore($id)
                ],
                'transport_antar_kota' => 'nullable|numeric',
                'taksi_airport' => 'nullable|numeric',
                'lain_lain' => 'nullable|numeric',
            ]);

            // Update dokumen
            $document = Document::find($businessTrip->document_id);
            $document->update([
                'jenis_dokumen_id' => $validatedMainData['jenis_dokumen_id'],
                'nomor_dokumen' => $validatedMainData['nomor_dokumen'],
                'tanggal_pembuatan' => $validatedMainData['tanggal_pembuatan']
            ]);

            // Update BusinessTrip dengan data utama
            $businessTrip->update([
                'nomor_spm' => $validatedMainData['nomor_spm'],
                'nomor_sp2d' => $validatedMainData['nomor_sp2d'],
                'transport_antar_kota' => $validatedMainData['transport_antar_kota'] ?? 0,
                'taksi_airport' => $validatedMainData['taksi_airport'] ?? 0,
                'lain_lain' => $validatedMainData['lain_lain'] ?? 0
            ]);

            // Validasi pelaksana dengan opsi tambah/edit - sesuaikan dengan nama field di model
            $validatedPelaksanaData = $request->validate([
                'pelaksana' => 'required|array|min:1',
                'pelaksana.*.id' => 'nullable|exists:pics,id',
                'pelaksana.*.employee_id' => 'required|exists:employees,id',
                'pelaksana.*.uraian_tugas' => 'required|string',
                'pelaksana.*.surat_tugas_nomor' => 'required|string|max:50',
                'pelaksana.*.surat_tugas_tanggal' => 'required|date',
                'pelaksana.*.tanggal_mulai' => 'required|date',
                'pelaksana.*.tanggal_selesai' => 'required|date',

                // Validasi departure sesuai model
                'pelaksana.*.departures.*.id' => 'nullable|exists:departures,id',
                'pelaksana.*.departures.*.mode_transportation' => 'nullable|string',
                'pelaksana.*.departures.*.ticket_price' => 'nullable|numeric',
                'pelaksana.*.departures.*.ticket_number' => 'nullable|string',
                'pelaksana.*.departures.*.booking_code' => 'nullable|string',
                'pelaksana.*.departures.*.departure_date' => 'nullable|date',

                // Validasi arrival sesuai model
                'pelaksana.*.arrivals.*.id' => 'nullable|exists:arrivals,id',
                'pelaksana.*.arrivals.*.moda_transportasi' => 'nullable|string',
                'pelaksana.*.arrivals.*.harga_tiket' => 'nullable|numeric',
                'pelaksana.*.arrivals.*.nomor_tiket' => 'nullable|string',
                'pelaksana.*.arrivals.*.kode_booking' => 'nullable|string',
                'pelaksana.*.arrivals.*.arrival_date' => 'nullable|date',

                // Validasi lodging
                'pelaksana.*.lodgings.*.id' => 'nullable|exists:lodgings,id',
                'pelaksana.*.lodgings.*.jumlah_malam' => 'nullable|numeric',
                'pelaksana.*.lodgings.*.satuan' => 'nullable|numeric',

                // Validasi perdiem
                'pelaksana.*.perdiems.*.id' => 'nullable|exists:perdiems,id',
                'pelaksana.*.perdiems.*.jumlah_hari' => 'nullable|numeric',
                'pelaksana.*.perdiems.*.satuan' => 'nullable|numeric',
            ]);

            // Proses update data
            $this->processPelaksanaUpdate($businessTrip, $validatedPelaksanaData);

            DB::commit();

            return redirect()->route('perdis.get')
                ->with('success', 'Perjalanan dinas berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::channel('perdis_debug')->error('Gagal Update Perjalanan Dinas', [
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'input_data' => $request->all()
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal memperbarui perjalanan dinas: ' . $e->getMessage());
        }
    }

    private function processPelaksanaUpdate(BusinessTrip $businessTrip, array $validatedPelaksanaData)
    {
        $grandTotal = 0;
        $existingPicIds = [];

        foreach ($validatedPelaksanaData['pelaksana'] as $pelaksanaData) {
            // Buat atau update pic
            $pic = Pic::updateOrCreate(
                ['id' => $pelaksanaData['id'] ?? null],
                [
                    'business_trip_id' => $businessTrip->id,
                    'employee_id' => $pelaksanaData['employee_id'],
                    'uraian_tugas' => $pelaksanaData['uraian_tugas'],
                    'surat_tugas_nomor' => Str::limit($pelaksanaData['surat_tugas_nomor'], 50),
                    'surat_tugas_tanggal' => $pelaksanaData['surat_tugas_tanggal'],
                    'tanggal_mulai' => $pelaksanaData['tanggal_mulai'],
                    'tanggal_selesai' => $pelaksanaData['tanggal_selesai'],
                ]
            );
            $existingPicIds[] = $pic->id;

            // Array detail types untuk diproses
            $detailTypes = ['departures', 'arrivals', 'lodgings', 'perdiems'];

            // Proses setiap jenis detail
            foreach ($detailTypes as $detailType) {
                // Jika detail type tersedia di data, update/create records
                if (isset($pelaksanaData[$detailType])) {
                    $this->processDetailUpdate($pic, $detailType, $pelaksanaData, $grandTotal);
                } else {
                    // Jika detail type tidak ada di request, hapus semua records untuk detail type ini
                    $this->deleteAllDetailsOfType($pic, $detailType);
                }
            }
        }

        // Ambil pic IDs yang akan dihapus
        $picsToDelete = Pic::where('business_trip_id', $businessTrip->id)
            ->whereNotIn('id', $existingPicIds)
            ->get();

        // Hapus pic dan relasinya satu per satu
        foreach ($picsToDelete as $pic) {
            $this->deletePicAndRelations($pic->id);
        }

        // Update biaya lain dan grand total
        $additionalCosts = $businessTrip->transport_antar_kota +
            $businessTrip->taksi_airport +
            $businessTrip->lain_lain;

        $businessTrip->update(['grand_total' => $grandTotal + $additionalCosts]);
    }

    // Method untuk menghapus semua detail berdasarkan tipe
    private function deleteAllDetailsOfType(Pic $pic, string $detailType)
    {
        // Mapping model berdasarkan detail type
        $modelMap = [
            'departures' => Departure::class,
            'arrivals' => Arrival::class,
            'lodgings' => Lodging::class,
            'perdiems' => Perdiem::class
        ];

        if (!isset($modelMap[$detailType])) {
            throw new \Exception("Tipe detail tidak valid: {$detailType}");
        }

        $model = $modelMap[$detailType];

        // Hapus semua records dengan pic_id yang sesuai
        $model::where('pic_id', $pic->id)->delete();
    }

    // Method generik untuk update detail
    private function processDetailUpdate(Pic $pic, string $detailType, array $pelaksanaData, &$grandTotal)
    {
        // Mapping model dan field
        $modelMap = [
            'departures' => [
                'model' => Departure::class,
                'idField' => 'id',
                'picField' => 'pic_id',
                'totalField' => 'ticket_price'
            ],
            'arrivals' => [
                'model' => Arrival::class,
                'idField' => 'id',
                'picField' => 'pic_id',
                'totalField' => 'harga_tiket'  // Gunakan nama field sesuai model Arrival
            ],
            'lodgings' => [
                'model' => Lodging::class,
                'idField' => 'id',
                'picField' => 'pic_id',
                'totalField' => 'total'
            ],
            'perdiems' => [
                'model' => Perdiem::class,
                'idField' => 'id',
                'picField' => 'pic_id',
                'totalField' => 'total'
            ]
        ];

        // Validasi model tersedia
        if (!isset($modelMap[$detailType])) {
            throw new \Exception("Tipe detail tidak valid: {$detailType}");
        }

        $modelInfo = $modelMap[$detailType];
        $model = $modelInfo['model'];
        $existingDetailIds = [];

        // Proses setiap detail
        if (!empty($pelaksanaData[$detailType])) {
            foreach ($pelaksanaData[$detailType] as $detailData) {
                // Khusus untuk arrivals, kita perlu pemetaan field dari form ke model
                if ($detailType === 'arrivals') {
                    // Mapping field jika menggunakan nama yang berbeda di frontend vs backend
                    if (isset($detailData['mode_transportation'])) {
                        $detailData['moda_transportasi'] = $detailData['mode_transportation'];
                        unset($detailData['mode_transportation']);
                    }
                    if (isset($detailData['ticket_price'])) {
                        $detailData['harga_tiket'] = $detailData['ticket_price'];
                        unset($detailData['ticket_price']);
                    }
                    if (isset($detailData['ticket_number'])) {
                        $detailData['nomor_tiket'] = $detailData['ticket_number'];
                        unset($detailData['ticket_number']);
                    }
                    if (isset($detailData['booking_code'])) {
                        $detailData['kode_booking'] = $detailData['booking_code'];
                        unset($detailData['booking_code']);
                    }
                }

                // Update atau buat detail
                $detail = $model::updateOrCreate(
                    ['id' => $detailData[$modelInfo['idField']] ?? null],
                    array_merge(
                        [$modelInfo['picField'] => $pic->id],
                        collect($detailData)->except($modelInfo['idField'])->toArray()
                    )
                );

                $existingDetailIds[] = $detail->id;

                // Tambahkan ke grand total
                if (isset($detail->{$modelInfo['totalField']})) {
                    $grandTotal += $detail->{$modelInfo['totalField']} ?? 0;
                }
            }
        }

        // Hapus detail yang tidak ada di input
        $model::where($modelInfo['picField'], $pic->id)
            ->whereNotIn('id', $existingDetailIds)
            ->delete();
    }

    // Method untuk menghapus pic dan semua relasinya
    private function deletePicAndRelations($picId)
    {
        // Hapus semua relasi terlebih dahulu
        Departure::where('pic_id', $picId)->delete();
        Arrival::where('pic_id', $picId)->delete();
        Perdiem::where('pic_id', $picId)->delete();
        Lodging::where('pic_id', $picId)->delete();

        // Kemudian hapus pic
        Pic::where('id', $picId)->delete();
    }
}
