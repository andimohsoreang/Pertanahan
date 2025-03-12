<x-layout.default>
    @section('title', 'Lihat Perdis')
    <div class="panel mt-6">
        <div class="flex justify-between items-center mb-5">
            <h5 class="font-semibold text-lg dark:text-white-light">Detail Perjalanan Dinas</h5>
            <a href="{{ route('perdis.get') }}" class="btn btn-outline-primary">Kembali</a>
        </div>

        <!-- Informasi Dokumen -->
        <div class="mb-6">
            <h6 class="text-lg font-semibold mb-4">Informasi Dokumen</h6>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 bg-gray-50 rounded-lg">
                <!-- Dokumen Perjalanan -->
                <div>
                    <p class="font-semibold">Jenis Dokumen</p>
                    <p>{{ $trip->document->documentType->jenis_dokumen ?? 'Tidak Ada' }}</p>
                </div>
                <div>
                    <p class="font-semibold">Nomor Dokumen</p>
                    <p>{{ $trip->document->nomor_dokumen ?? 'Tidak Ada' }}</p>
                </div>
                <div>
                    <p class="font-semibold">Tanggal Pembuatan</p>
                    <p>{{ $trip->document->tanggal_pembuatan ?? 'Tidak Ada' }}</p>
                </div>

                <!-- Informasi SPM dan SP2D -->
                <div>
                    <p class="font-semibold">Nomor SPM</p>
                    <p>{{ $trip->nomor_spm }}</p>
                </div>
                <div>
                    <p class="font-semibold">Nomor SP2D</p>
                    <p>{{ $trip->nomor_sp2d }}</p>
                </div>
            </div>
        </div>

        <!-- Files Section -->
        <div class="mb-6">
            <h6 class="text-lg font-semibold mb-4">Dokumen Pendukung</h6>
            <div class="p-4 bg-gray-50 rounded-lg">
                <!-- Upload Form -->
                <form action="{{ route('trip.upload-file', $trip->id) }}" method="POST" enctype="multipart/form-data"
                    class="mb-4 @if ($trip->files->count() > 0) hidden @endif">
                    @csrf
                    <div class="flex items-center gap-4">
                        <input type="file" name="files[]" multiple
                            class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/90"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
                        @auth
                            @if (in_array(Auth::user()->role, ['superadmin', 'operator']))
                                <button type="submit" class="btn btn-primary">Upload</button>
                            @endif
                        @endauth
                    </div>
                </form>

                <!-- Files List -->
                @if ($trip->files->count() > 0)
                    <div class="space-y-2">
                        @foreach ($trip->files as $file)
                            <div class="flex items-center justify-between p-2 border rounded">
                                <a href="{{ route('trip.download-file', $file->id) }}"
                                    class="text-primary hover:text-primary/70 flex items-center gap-2">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                        <polyline points="13 2 13 9 20 9"></polyline>
                                    </svg>
                                    {{ $file->nama_file }}
                                </a>

                                @auth
                                    @if (in_array(Auth::user()->role, ['superadmin', 'operator']))
                                        <form action="{{ route('trip.delete-file', $file->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-danger hover:text-danger/70"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor">
                                                    <path d="M3 6h18"></path>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                                    <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Informasi Biaya Transport -->
        <div class="mb-6">
            <h6 class="text-lg font-semibold mb-4">Informasi Biaya Transport</h6>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4 bg-gray-50 rounded-lg">
                <div>
                    <p class="font-semibold">Transport Antar Kota</p>
                    <p>Rp {{ number_format($trip->transport_antar_kota, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Taksi Airport</p>
                    <p>Rp {{ number_format($trip->taksi_airport, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Biaya Lain-lain</p>
                    <p>Rp {{ number_format($trip->lain_lain, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <!-- Informasi Pelaksana -->
        @foreach ($trip->pics as $pic)
            <div class="mb-6 border rounded-lg p-4">
                <h6 class="text-lg font-semibold mb-4">Informasi Pelaksana {{ $loop->iteration }}</h6>

                <!-- Data Pegawai -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <p class="font-semibold">Nama Pelaksana</p>
                        <p>{{ $pic->employee->nama_pelaksana }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Seksi</p>
                        <p>{{ $pic->employee->seksi ? $pic->employee->seksi->nama_seksi : 'Tidak ada Seksi' }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Jenis Kelamin</p>
                        <p>{{ $pic->employee->jenis_kelamin }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Status Pegawai</p>
                        <p>{{ $pic->employee->status_pegawai }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Pangkat/Golongan</p>
                        <p>{{ $pic->employee->pangkat_golongan }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Jabatan</p>
                        <p>{{ $pic->employee->jabatan }}</p>
                    </div>

                </div>

                <!-- Informasi Surat Tugas -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <p class="font-semibold">Nomor Surat Tugas</p>
                        <p>{{ $pic->surat_tugas_nomor }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Tanggal Surat Tugas</p>
                        <p>{{ $pic->surat_tugas_tanggal }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Uraian Tugas</p>
                        <p>{{ $pic->uraian_tugas }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Tanggal Mulai</p>
                        <p>{{ $pic->tanggal_mulai }}</p>
                    </div>
                    <div>
                        <p class="font-semibold">Tanggal Selesai</p>
                        <p>{{ $pic->tanggal_selesai }}</p>
                    </div>
                </div>

                <!-- Informasi Keberangkatan -->
                @if ($pic->departure && $pic->departure->isNotEmpty())
                    <div class="mb-4">
                        <h6 class="font-semibold mb-3">Detail Keberangkatan</h6>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Tanggal</th>
                                        <th class="border px-4 py-2">Moda Transportasi</th>
                                        <th class="border px-4 py-2">Nomor Tiket</th>
                                        <th class="border px-4 py-2">Kode Booking</th>
                                        <th class="border px-4 py-2">Harga Tiket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pic->departure as $departure)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $departure->departure_date }}</td>
                                            <td class="border px-4 py-2">{{ $departure->mode_transportation }}</td>
                                            <td class="border px-4 py-2">{{ $departure->ticket_number }}</td>
                                            <td class="border px-4 py-2">{{ $departure->booking_code }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($departure->ticket_price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Informasi Kedatangan -->
                @if ($pic->arrival && $pic->arrival->isNotEmpty())
                    <div class="mb-4">
                        <h6 class="font-semibold mb-3">Detail Kedatangan</h6>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Tanggal</th>
                                        <th class="border px-4 py-2">Moda Transportasi</th>
                                        <th class="border px-4 py-2">Nomor Tiket</th>
                                        <th class="border px-4 py-2">Kode Booking</th>
                                        <th class="border px-4 py-2">Harga Tiket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pic->arrival as $arrival)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $arrival->arrival_date }}</td>
                                            <td class="border px-4 py-2">{{ $arrival->moda_transportasi }}</td>
                                            <td class="border px-4 py-2">{{ $arrival->nomor_tiket }}</td>
                                            <td class="border px-4 py-2">{{ $arrival->kode_booking }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($arrival->harga_tiket, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Uang Harian -->
                @if ($pic->perdiem && $pic->perdiem->isNotEmpty())
                    <div class="mb-4">
                        <h6 class="font-semibold mb-3">Uang Harian</h6>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Jumlah Hari</th>
                                        <th class="border px-4 py-2">Satuan</th>
                                        <th class="border px-4 py-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pic->perdiem as $perdiem)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $perdiem->jumlah_hari }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($perdiem->satuan, 0, ',', '.') }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($perdiem->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <!-- Penginapan -->
                @if ($pic->lodging && $pic->lodging->isNotEmpty())
                    <div class="mb-4">
                        <h6 class="font-semibold mb-3">Penginapan</h6>
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Jumlah Malam</th>
                                        <th class="border px-4 py-2">Satuan</th>
                                        <th class="border px-4 py-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pic->lodging as $lodging)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $lodging->jumlah_malam }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($lodging->satuan, 0, ',', '.') }}</td>
                                            <td class="border px-4 py-2">Rp
                                                {{ number_format($lodging->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Total Keseluruhan -->
        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
            <h6 class="text-lg font-semibold mb-4">Rekapitulasi Biaya</h6>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <p class="font-semibold">Transport Antar Kota</p>
                    <p>Rp {{ number_format($trip->transport_antar_kota, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Taksi Airport</p>
                    <p>Rp {{ number_format($trip->taksi_airport, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Biaya Lain-lain</p>
                    <p>Rp {{ number_format($trip->lain_lain, 0, ',', '.') }}</p>
                </div>
                <div>
                    <p class="font-semibold">Grand Total</p>
                    <p>Rp {{ number_format($trip->grand_total, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteFile(fileId) {
            if (confirm('Apakah Anda yakin ingin menghapus file ini?')) {
                fetch(`/perdis/delete-file/${fileId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            throw new Error('Failed to delete file');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to delete file. Please try again.');
                    });
            }
        }
    </script>
</x-layout.default>
