<x-layout.default>

    <script src="/assets/js/simple-datatables.js"></script>
    @section('title', 'Pegawai Master')
    <!-- SweetAlert Notifikasi -->
    @if (session('success'))
        <div
            class="relative flex items-center border p-3.5 rounded text-success bg-success-light border-success ltr:border-l-[64px] rtl:border-r-[64px] dark:bg-success-dark-light mb-4">
            <span class="absolute ltr:-left-11 rtl:-right-11 inset-y-0 text-white w-6 h-6 m-auto">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6">
                    <path
                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2"><strong
                    class="ltr:mr-1 rtl:ml-1">Selamat!</strong>{{ session('success') }}</span>
            <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6">
                    <path
                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                    <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </button>
        </div>
    @elseif (session('error'))
        <div
            class="relative flex items-center border p-3.5 rounded text-dark bg-dark-light border-dark ltr:border-r-[64px] rtl:border-l-[64px] dark:bg-dark-dark-light dark:text-white-light dark:border-white-light/20">
            <span class="absolute ltr:-right-11 rtl:-left-11 inset-y-0 text-white w-6 h-6 m-auto">
                <svg> ... </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2"><strong
                    class="ltr:mr-1 rtl:ml-1">Warning!</strong>{{ session('error') }}</span>
            <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
                <svg> ... </svg>
            </button>
        </div>
    @endif

    <div x-data="sorting">
        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
            <!-- Existing note panel -->
        </div>

        <div class="panel mt-6">
            <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Data Pegawai</h5>
            <div class="flex space-x-4 mb-4">
                <select x-model="jenisKelamin" class="form-select text-white-dark">
                    <option value="">Semua Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <select x-model="statusPegawai" class="form-select text-white-dark">
                    <option value="">Semua Status</option>
                    <option value="KLHK">KLHK</option>
                    <option value="Non KLHK">Non KLHK</option>
                </select>
                <select x-model="seksiId" class="form-select text-white-dark">
                    <option value="">Semua Seksi</option>
                    @foreach($seksis as $seksi)
                        <option value="{{ $seksi->id }}">{{ $seksi->nama_seksi }}</option>
                    @endforeach
                </select>
                <button @click="filterData" class="btn bg-primary text-white px-4 py-2 rounded">Filter</button>
                <button @click="reloadData" class="btn ml-auto bg-primary text-white px-4 py-2 rounded">Reload Data</button>
            </div>
            <div class="grid grid-cols-6">
                <a href="{{ route('pegawai.create') }}" class="btn btn-secondary mb-4" @click="toggle">Tambah Data</a>
            </div>
            <table id="myTable" class="whitespace-nowrap table-hover">
                <!-- Tabel akan diisi data melalui Alpine.js -->
            </table>
        </div>
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("sorting", () => ({
                datatable: null,
                jenisKelamin: '',
                statusPegawai: '',
                seksiId: '', // Tambahan untuk filter seksi
                init() {
                    this.loadData();
                },
                loadData() {
                    fetch(
                        `{{ route('pegawai.get.json') }}?jenis_kelamin=${this.jenisKelamin}&status_pegawai=${this.statusPegawai}&seksi_id=${this.seksiId}`
                    )
                        .then(response => response.json())
                        .then(data => {
                            if (this.datatable) {
                                this.datatable.destroy();
                            }
                            this.datatable = new simpleDatatables.DataTable('#myTable', {
                                data: {
                                    headings: [
                                        "ID",
                                        "Nama Pelaksana",
                                        "Jenis Kelamin",
                                        "Pangkat Golongan",
                                        "Jabatan",
                                        "Status Pegawai",
                                        "Nomor Telp",
                                        "Nama Seksi", // Tambahan kolom seksi
                                        "Aksi"
                                    ],
                                    data: data.map(emp => [
                                        emp.id,
                                        emp.nama_pelaksana,
                                        emp.jenis_kelamin,
                                        emp.pangkat_golongan,
                                        emp.jabatan,
                                        emp.status_pegawai,
                                        emp.no_telp,
                                        emp.seksi ? emp.seksi.nama_seksi : 'Tidak ada Seksi', // Menampilkan nama seksi
                                        `<div class="flex justify-start space-x-2">
                                        <a href="/admin/pegawai/${emp.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="/admin/pegawai/${emp.id}/delete" method="POST" style="display:inline;">
                                            @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>`
                                    ])
                                },
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [10, 20, 30, 50, 100],
                            });
                        });
                },
                reloadData() {
                    this.loadData();
                },
                filterData() {
                    this.loadData();
                }
            }));
        });
    </script>

</x-layout.default>
