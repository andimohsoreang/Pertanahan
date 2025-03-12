<x-layout.default>
    @section('title', 'Perjalanan Dinas Page')
    <div class="panel mt-6">
        <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Filter Perjalanan Dinas</h5>

        <!-- Flash Messages -->


        @if (session('success'))
            <div class="flex items-center rounded bg-success-light p-3.5 text-success dark:bg-success-dark-light mb-3">
                <span class="ltr:pr-2 rtl:pl-2"><strong
                        class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('success') }}</span>
                <button type="button" class="hover:opacity-80 ltr:ml-auto rtl:mr-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="h-5 w-5">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center rounded bg-success-light p-3.5 text-success dark:bg-success-dark-light mb-3">
                <span class="ltr:pr-2 rtl:pl-2"><strong
                        class="ltr:mr-1 rtl:ml-1">Success!</strong>{{ session('error') }}</span>
                <button type="button" class="hover:opacity-80 ltr:ml-auto rtl:mr-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="h-5 w-5">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        @endif


        <!-- Form Filter -->
        <form action="" method="GET" class="mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Filter Nomor SPM -->
                <div>
                    <label class="block mb-2">Nomor SPM</label>
                    <input type="text" name="nomor_spm" value="{{ request('nomor_spm') }}" class="form-input"
                        placeholder="Cari Nomor SPM">
                </div>

                <!-- Filter Nomor SP2D -->
                <div>
                    <label class="block mb-2">Nomor SP2D</label>
                    <input type="text" name="nomor_sp2d" value="{{ request('nomor_sp2d') }}" class="form-input"
                        placeholder="Cari Nomor SP2D">
                </div>

                <!-- Filter Nama Pelaksana -->
                <div>
                    <label class="block mb-2">Nama Pelaksana</label>
                    <input type="text" name="nama_pelaksana" value="{{ request('nama_pelaksana') }}"
                        class="form-input" placeholder="Cari Nama Pelaksana">
                </div>

                <!-- Filter Status Pegawai -->
                <div>
                    <label class="block mb-2">Status Pegawai</label>
                    <select name="status_pegawai" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="KLHK" {{ request('status_pegawai') == 'KLHK' ? 'selected' : '' }}>KLHK</option>
                        <option value="Non KLHK" {{ request('status_pegawai') == 'Non KLHK' ? 'selected' : '' }}>Non
                            KLHK</option>
                    </select>
                </div>

                <!-- Filter Status Berkas -->
                <div>
                    <label class="block mb-2">Status Berkas</label>
                    <select name="status_berkas" class="form-select">
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

                <!-- Filter Nama Seksi -->
                <div>
                    <label class="block mb-2">Nama Seksi</label>
                    <select name="nama_seksi" class="form-select">
                        <option value="">Semua Seksi</option>
                        @foreach ($seksiList as $seksi)
                            <option value="{{ $seksi->nama_seksi }}"
                                {{ request('nama_seksi') == $seksi->nama_seksi ? 'selected' : '' }}>
                                {{ $seksi->nama_seksi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Biaya Min -->
                <div>
                    <label class="block mb-2">Biaya Min</label>
                    <input type="number" name="biaya_min" value="{{ request('biaya_min') }}" class="form-input"
                        placeholder="Biaya Minimum">
                </div>

                <!-- Filter Biaya Max -->
                <div>
                    <label class="block mb-2">Biaya Max</label>
                    <input type="number" name="biaya_max" value="{{ request('biaya_max') }}" class="form-input"
                        placeholder="Biaya Maksimum">
                </div>

                <!-- Filter Tanggal Mulai -->
                <div>
                    <label class="block mb-2">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
                        class="form-input">
                </div>



                <!-- Filter Tanggal Selesai -->
                <div>
                    <label class="block mb-2">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}"
                        class="form-input">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-end space-x-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ request()->url() }}" class="btn btn-secondary">Reset</a>
                    @auth
                        @if (in_array(Auth::user()->role, ['superadmin', 'operator']))
                            <a href="{{ route('perdis.create') }}" class="btn btn-info">Tambah Perjalanan Dinas</a>
                        @endif
                    @endauth
                    <a href="{{ route('perdis.export', request()->query()) }}" class="btn btn-success">Export
                        Excel</a>

                </div>

                {{--                <a href="{{ route('perdis.export', request()->query()) }}" class="btn btn-success"> --}}
                {{--                    <i class="fas fa-file-excel mr-2"></i>Export Excel --}}
                {{--                </a> --}}
            </div>
        </form>

        <!-- Tabel Data Perjalanan Dinas -->
        <div class="overflow-x-auto">
            <table class="w-full table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor SPM</th>
                        <th>Nomor SP2D</th>
                        <th>Nama Pelaksana</th>
                        <th>Status Pegawai</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>File Document</th>
                        <th>Status Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($trips as $index => $trip)
                        <tr>
                            <td>{{ $trips->firstItem() + $index }}</td>
                            <td>{{ $trip->nomor_spm ?? 'Tidak Ada' }}</td>
                            <td>{{ $trip->nomor_sp2d ?? 'Tidak Ada' }}</td>
                            <td>
                                @if ($trip->pics->first() && $trip->pics->first()->employee)
                                    {{ $trip->pics->first()->employee->nama_pelaksana }}
                                @else
                                    Tidak Diketahui
                                @endif
                            </td>
                            <td>
                                @if ($trip->pics->first() && $trip->pics->first()->employee)
                                    {{ $trip->pics->first()->employee->status_pegawai }}
                                @else
                                    Tidak Diketahui
                                @endif
                            </td>
                            <td>
                                @if ($trip->pics->first())
                                    {{ $trip->pics->first()->tanggal_mulai }}
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td>
                                @if ($trip->pics->first())
                                    {{ $trip->pics->first()->tanggal_selesai }}
                                @else
                                    Tidak Ada
                                @endif
                            </td>
                            <td>
                                @if ($trip->files->first())
                                    <span class="badge bg-info">
                                        {{ $trip->files->first()->mime_type }}
                                    </span>
                                @else
                                    <span class="badge badge-outline-dark">
                                        Belum ada File
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if ($trip->files->first())
                                    <span class="badge bg-success">
                                        {{ $trip->files->first()->status_berkas }}
                                    </span>
                                @else
                                    <span class="badge badge-outline-dark">
                                        Belum ada File
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                    <a href="{{ route('perdis.show', $trip->id) }}" class="btn btn-sm btn-info">
                                        Detail
                                    </a>
                                    @auth
                                        @if (in_array(Auth::user()->role, ['superadmin', 'operator']))
                                            <a href="{{ route('perdis.edit', $trip->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('perdis.destroy', $trip->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data perjalanan dinas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $trips->appends(request()->input())->links() }}
        </div>
    </div>
</x-layout.default>
