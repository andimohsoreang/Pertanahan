<x-layout.default>
    @section('title', 'FIle Perdis')
    <div class="panel mt-6">
        <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Daftar File Perjalanan Dinas</h5>

        <!-- Form Filter -->
        <form action="{{ route('files.perdisIndex') }}" method="GET" class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Filter Nomor SPM -->
                <div>
                    <label class="block mb-2">Nomor SPM</label>
                    <input type="text" name="nomor_spm" value="{{ request('nomor_spm') }}" class="form-input"
                        placeholder="Cari Nomor SPM">
                </div>

                <!-- Filter Nama File -->
                <div>
                    <label class="block mb-2">Nama File</label>
                    <input type="text" name="nama_file" value="{{ request('nama_file') }}" class="form-input"
                        placeholder="Cari Nama File">
                </div>

                <!-- Filter Tipe File -->
                <div>
                    <label class="block mb-2">Tipe File</label>
                    <select name="mime_type" class="form-select">
                        <option value="">Semua Tipe File</option>
                        @foreach ($mimeTypes as $mimeType)
                            <option value="{{ $mimeType }}"
                                {{ request('mime_type') == $mimeType ? 'selected' : '' }}>
                                {{ $mimeType }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Status Berkas -->
                <div>
                    <label class="block mb-2">Status Berkas</label>
                    <select name="status_berkas" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Telah Di Upload"
                            {{ request('status_berkas') == 'Telah Di Upload' ? 'selected' : '' }}>
                            Telah Di Upload
                        </option>
                        <option value="Belum Di Upload"
                            {{ request('status_berkas') == 'Belum Di Upload' ? 'selected' : '' }}>
                            Belum Di Upload
                        </option>
                    </select>
                </div>

                <!-- Filter Rentang Tanggal Upload -->
                <div>
                    <label class="block mb-2">Tanggal Upload Dari</label>
                    <input type="date" name="tanggal_upload_dari" value="{{ request('tanggal_upload_dari') }}"
                        class="form-input">
                </div>

                <div>
                    <label class="block mb-2">Tanggal Upload Sampai</label>
                    <input type="date" name="tanggal_upload_sampai" value="{{ request('tanggal_upload_sampai') }}"
                        class="form-input">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-end space-x-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('files.perdisIndex') }}" class="btn btn-secondary">Reset</a>

                    <!-- Tombol Download Keseluruhan -->
                    @if ($files->isNotEmpty())
                        <a href="{{ route('files.perdisDownload-all', request()->query()) }}" class="btn btn-success">
                            Download Semua File
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <!-- Tabel Data File Perjalanan Dinas -->
        <div class="overflow-x-auto">
            <table class="w-full table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor SPM</th>
                        <th>Nama File</th>
                        <th>Tipe File</th>
                        <th>Ukuran File</th>
                        <th>Status Berkas</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($files as $index => $file)
                        <tr>
                            <td>{{ $files->firstItem() + $index }}</td>
                            <td>
                                {{ optional($file->businessTrip)->nomor_spm ?? 'Tidak Ada' }}
                            </td>
                            <td>
                                {{ $file->nama_file }}
                            </td>
                            <td>
                                <span class="badge bg-info">{{ $file->mime_type }}</span>
                            </td>
                            <td>
                                {{ $file->readable_size ?? 'Tidak Diketahui' }}
                            </td>
                            <td>
                                <span
                                    class="badge {{ $file->status_berkas == 'Telah Di Upload' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $file->status_berkas }}
                                </span>
                            </td>
                            <td>{{ $file->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('files.perdisDownload', $file->id) }}"
                                    class="btn btn-sm btn-primary">
                                    Download
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada file perjalanan dinas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $files->appends(request()->input())->links() }}
        </div>
    </div>
</x-layout.default>
