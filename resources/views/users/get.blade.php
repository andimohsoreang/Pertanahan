<x-layout.default>
    @section('title', 'Account Page')
    <script src="/assets/js/simple-datatables.js"></script>

    <!-- SweetAlert Notification -->
    @if (session('success'))
        <div
            class="relative flex items-center border p-3.5 rounded text-success bg-success-light border-success ltr:border-l-[64px] rtl:border-r-[64px] dark:bg-success-dark-light mb-4">
            <span class="absolute ltr:-left-11 rtl:-right-11 inset-y-0 text-white w-6 h-6 m-auto">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6">
                    <path d="M3 12L8.5 17L12 13.5M21 12L16.5 17L15 15.5" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path opacity="0.5"
                        d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                        stroke="currentColor" stroke-width="1.5" />
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-1 rtl:ml-1">Sukses!</strong>{{ session('success') }}
            </span>
            <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5">
                    <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                        stroke="currentColor" stroke-width="1.5" />
                    <path d="M9.17 14.83L14.83 9.17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M14.83 14.83L9.17 9.17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    @elseif (session('error'))
        <div
            class="relative flex items-center border p-3.5 rounded text-danger bg-danger-light border-danger ltr:border-l-[64px] rtl:border-r-[64px] dark:bg-danger-dark-light mb-4">
            <span class="absolute ltr:-left-11 rtl:-right-11 inset-y-0 text-white w-6 h-6 m-auto">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6">
                    <path d="M12 7V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    <circle cx="12" cy="16" r="1" fill="currentColor" />
                    <path opacity="0.5"
                        d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                        stroke="currentColor" stroke-width="1.5" />
                </svg>
            </span>
            <span class="ltr:pr-2 rtl:pl-2">
                <strong class="ltr:mr-1 rtl:ml-1">Error!</strong>{{ session('error') }}
            </span>
            <button type="button" class="ltr:ml-auto rtl:mr-auto hover:opacity-80">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5">
                    <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z"
                        stroke="currentColor" stroke-width="1.5" />
                    <path d="M9.17 14.83L14.83 9.17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M14.83 14.83L9.17 9.17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    @endif

    <div x-data="sorting">
        <div class="panel flex items-center overflow-x-auto whitespace-nowrap p-3 text-primary">
            <!-- Existing note panel or any other content can go here -->
        </div>

        <div class="panel mt-6">
            <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Data User</h5>
            {{-- @if (Auth::check())
                <pre>{{ print_r(auth()->user()->toArray(), true) }}</pre>
            @else
                <p>User belum login</p>
            @endif --}}
            <div class="flex space-x-4 mb-4">
                <input x-model="namaUser" type="text" placeholder="Cari Nama User" class="form-input">
                <select x-model="role" class="form-select">
                    <option value="">Semua Role</option>
                    <option value="operator">Operator</option>
                    <option value="verificator">Verificator</option>
                    <option value="hod">HOD</option>
                    <option value="superadmin">Superadmin</option>
                </select>
                <button @click="filterData" class="btn bg-primary text-white px-4 py-2 rounded">Filter</button>
                <button @click="reloadData" class="btn ml-auto bg-primary text-white px-4 py-2 rounded">Reload
                    Data</button>
            </div>
            <div class="grid grid-cols-6">
                <a href="{{ route('users.createAccount') }}" class="btn btn-secondary mb-4">Tambah User</a>
            </div>
            <table id="myTable" class="whitespace-nowrap table-hover">
                <!-- Tabel akan diisi data melalui Alpine.js -->
            </table>
        </div>
    </div>

    <!-- start highlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>



    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "User yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/users/deleteAccount/${userId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Accept': 'application/json',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Terhapus!',
                                    text: data.message || 'User berhasil dihapus.',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Gagal!',
                                    data.message || 'Gagal menghapus user.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Terjadi kesalahan saat menghapus user.',
                                'error'
                            );
                        });
                }
            });
        }

        document.addEventListener("alpine:init", () => {
            Alpine.data("sorting", () => ({
                namaUser: '',
                role: '',
                datatable: null,
                init() {
                    this.loadData();
                },
                loadData() {
                    const params = new URLSearchParams({
                        nama_user: this.namaUser,
                        role: this.role
                    });

                    fetch(`{{ route('user.get.json') }}?${params}`)
                        .then(response => response.json())
                        .then(data => {
                            const userData = data.data || data;

                            if (this.datatable) {
                                this.datatable.destroy();
                            }
                            this.datatable = new simpleDatatables.DataTable('#myTable', {
                                data: {
                                    headings: [
                                        "ID",
                                        "Username",
                                        "Email",
                                        "Role",
                                        "Nama Pegawai",
                                        "Jabatan",
                                        "Nama Seksi",
                                        "Aksi"
                                    ],
                                    data: userData.map(user => [
                                        user.id,
                                        user.username,
                                        user.email,
                                        user.role || 'Tidak ada Role',
                                        user.employee ? user.employee
                                        .nama_pelaksana : 'Tidak ada Pegawai',
                                        user.employee ? user.employee.jabatan :
                                        'Tidak ada Jabatan',
                                        user.employee && user.employee.seksi ? user
                                        .employee.seksi.nama_seksi :
                                        'Tidak ada Seksi', // Tambahkan field ini
                                        `<div class="flex justify-start space-x-2">
        <a href="/users/editAccount/${user.id}" class="btn btn-warning btn-sm">Edit</a>
        <button onclick="confirmDelete('${user.id}')" class="btn btn-danger btn-sm">Delete</button>
    </div>`
                                    ])
                                },
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [10, 20, 30, 50, 100],
                            });
                        })
                        .catch(error => {
                            console.error('Error loading data:', error);
                            alert('Gagal memuat data');
                        });
                },
                reloadData() {
                    this.namaUser = ''; // Reset nama user filter
                    this.role = ''; // Reset role filter
                    this.loadData();
                },
                filterData() {
                    this.loadData();
                }
            }));
        });
    </script>
</x-layout.default>
