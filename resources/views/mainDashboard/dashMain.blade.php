<x-layout.default>
    @section('title', 'Dashboard Admin')
    <script defer src="/assets/js/alpine.js"></script>
    <script defer src="/assets/js/apexcharts.js"></script>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Form Master</span>
            </li>
        </ul>

        {{-- Tampilkan statistik keseluruhan hanya untuk admin --}}
        @if (isset($userRole) && ($userRole === 'admin' || $userRole === 'super_admin' || $userRole === 'superadmin'))
            <div class="pt-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-6 text-white">
                    <!-- Dokumen Perjalanan Dinas -->
                    <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Perjalanan Dinas</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $totalbusinessTrips }} </div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 44,700
                        </div>
                    </div>

                    <!-- File Terupload -->
                    <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">File Uploaded</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $totalFilesTrips }}</div>
                            <div class="badge bg-white/30">Dokumen </div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 84,709
                        </div>
                    </div>

                    <!-- Perjalanan Dinas Lengkap -->
                    <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Perjalanan Dinas Lengkap</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">
                                @php
                                    $totalLengkap = 0;
                                    foreach ($seksiStats as $seksi) {
                                        $totalLengkap += $seksi['total_lengkap'];
                                    }
                                @endphp
                                {{ $totalLengkap }}
                            </div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 37,894
                        </div>
                    </div>

                    <!-- Perjalanan Dinas Belum Lengkap -->
                    <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Perjalanan Dinas Belum Lengkap</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3">
                                @php
                                    $totalBelumLengkap = 0;
                                    foreach ($seksiStats as $seksi) {
                                        $totalBelumLengkap += $seksi['total_belum_lengkap'];
                                    }
                                @endphp
                                {{ $totalBelumLengkap }}
                            </div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 50.01%
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Penampilan data per seksi --}}
        @foreach ($seksiStats as $seksi_id => $seksi)
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li class="ltr:before:mr-1 rtl:before:ml-1">
                    <span>{{ $seksi['nama_seksi'] }}</span>
                </li>
            </ul>
            <div class="pt-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-6 text-white">
                    <!-- Total Perjalanan Dinas -->
                    <div class="panel bg-gradient-to-r from-cyan-500 to-cyan-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Perjalanan Dinas</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $seksi['total_perjalanan'] }} </div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            @php
                                // Contoh logika untuk "Last Week", bisa disesuaikan
                                $lastWeek = rand(30000, 50000);
                            @endphp
                            Last Week {{ $lastWeek }}
                        </div>
                        <!-- Caption Nama Seksi -->
                        <div class="text-center mt-3 text-sm font-medium text-white/80">
                            {{ $seksi['nama_seksi'] }}
                        </div>
                    </div>

                    <!-- Total Perjalanan Dinas Lengkap -->
                    <div class="panel bg-gradient-to-r from-violet-500 to-violet-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Perjalanan Dinas Lengkap</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $seksi['total_lengkap'] }}</div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 84,709
                        </div>
                        <!-- Caption Nama Seksi -->
                        <div class="text-center mt-3 text-sm font-medium text-white/80">
                            {{ $seksi['nama_seksi'] }}
                        </div>
                    </div>

                    <!-- Total Perjalanan Dinas Belum Lengkap -->
                    <div class="panel bg-gradient-to-r from-blue-500 to-blue-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total Perjalanan Dinas Belum Lengkap
                            </div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $seksi['total_belum_lengkap'] }}
                            </div>
                            <div class="badge bg-white/30">Dokumen</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 37,894
                        </div>
                        <!-- Caption Nama Seksi -->
                        <div class="text-center mt-3 text-sm font-medium text-white/80">
                            {{ $seksi['nama_seksi'] }}
                        </div>
                    </div>

                    <!-- Total File Upload -->
                    <div class="panel bg-gradient-to-r from-fuchsia-500 to-fuchsia-400">
                        <div class="flex justify-between">
                            <div class="ltr:mr-1 rtl:ml-1 text-md font-semibold">Total File Upload</div>
                            <div x-data="{ open: false }" @click.outside="open = false" class="dropdown">
                                <a href="javascript:;" @click="open = !open">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 hover:opacity-80 opacity-70">
                                        <circle cx="5" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="12" r="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </a>
                                <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                    class="ltr:right-0 rtl:left-0 text-black dark:text-white-dark">
                                    <li><a href="javascript:;" @click="open = false">View Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center mt-5">
                            <div class="text-3xl font-bold ltr:mr-3 rtl:ml-3"> {{ $seksi['total_files'] }} </div>
                            <div class="badge bg-white/30">File</div>
                        </div>
                        <div class="flex items-center font-semibold mt-5">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 shrink-0">
                                <path opacity="0.5"
                                    d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                            </svg>
                            Last Week 50.01%
                        </div>
                        <!-- Caption Nama Seksi -->
                        <div class="text-center mt-3 text-sm font-medium text-white/80">
                            {{ $seksi['nama_seksi'] }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Chart Section (Optional - hanya untuk admin) --}}
        @if (isset($userRole) && ($userRole === 'admin' || $userRole === 'super_admin' || $userRole === 'superadmin'))
            <div class="pt-5">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    <!-- Chart 1: Perbandingan Perjalanan Dinas per Seksi -->
                    <div class="panel">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="font-semibold text-lg dark:text-white-light">Perbandingan Perjalanan Dinas</h5>
                        </div>
                        <div class="relative">
                            <div id="perjalananDinasChart" class="min-h-[360px]"></div>
                        </div>
                    </div>

                    <!-- Chart 2: Perbandingan Kelengkapan Dokumen per Seksi -->
                    <div class="panel">
                        <div class="flex items-center justify-between mb-5">
                            <h5 class="font-semibold text-lg dark:text-white-light">Kelengkapan Dokumen</h5>
                        </div>
                        <div class="relative">
                            <div id="kelengkapanDokumenChart" class="min-h-[360px]"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Statistik -->
            <div class="pt-5">
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="font-semibold text-lg dark:text-white-light">Statistik Detail Per Seksi</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Seksi</th>
                                    <th>Total Perjalanan</th>
                                    <th>Lengkap</th>
                                    <th>Belum Lengkap</th>
                                    <th>File Upload</th>
                                    <th>Persentase Kelengkapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seksiStats as $seksi_id => $seksi)
                                    <tr>
                                        <td>{{ $seksi['nama_seksi'] }}</td>
                                        <td>{{ $seksi['total_perjalanan'] }}</td>
                                        <td>{{ $seksi['total_lengkap'] }}</td>
                                        <td>{{ $seksi['total_belum_lengkap'] }}</td>
                                        <td>{{ $seksi['total_files'] }}</td>
                                        <td>
                                            @php
                                                $persentase =
                                                    $seksi['total_perjalanan'] > 0
                                                        ? round(
                                                            ($seksi['total_lengkap'] / $seksi['total_perjalanan']) *
                                                                100,
                                                            2,
                                                        )
                                                        : 0;
                                            @endphp
                                            <div class="flex items-center">
                                                <div class="w-full bg-gray-200 rounded-full h-2.5 mr-2">
                                                    <div class="bg-primary h-2.5 rounded-full"
                                                        style="width: {{ $persentase }}%"></div>
                                                </div>
                                                <span>{{ $persentase }}%</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Script untuk charts -->
    <script>
        window.finance = {};
        // Pastikan DOM diload sebelum mencoba merender chart
        document.addEventListener('DOMContentLoaded', function() {
            // Data untuk Chart perjalanan dinas
            const perjalananLabels = [
                @foreach ($seksiStats as $seksi)
                    '{{ $seksi['nama_seksi'] }}',
                @endforeach
            ];
            const perjalananData = [
                @foreach ($seksiStats as $seksi)
                    {{ $seksi['total_perjalanan'] }},
                @endforeach
            ];

            // Data untuk kelengkapan dokumen
            const kelengkapanLabels = [
                @foreach ($seksiStats as $seksi)
                    '{{ $seksi['nama_seksi'] }}',
                @endforeach
            ];
            const lengkapData = [
                @foreach ($seksiStats as $seksi)
                    {{ $seksi['total_lengkap'] }},
                @endforeach
            ];
            const belumLengkapData = [
                @foreach ($seksiStats as $seksi)
                    {{ $seksi['total_belum_lengkap'] }},
                @endforeach
            ];

            // Chart perjalanan dinas
            if (document.getElementById('perjalananDinasChart')) {
                const perjalananDinasChartOptions = {
                    series: [{
                        name: 'Perjalanan Dinas',
                        data: perjalananData
                    }],
                    chart: {
                        height: 360,
                        type: 'bar',
                        fontFamily: 'Nunito, sans-serif',
                        toolbar: {
                            show: false
                        },
                    },
                    colors: ['#4361ee'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: perjalananLabels,
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val
                            }
                        }
                    }
                };

                try {
                    console.log("Rendering perjalanan dinas chart...");
                    const perjalananDinasChart = new ApexCharts(
                        document.querySelector("#perjalananDinasChart"),
                        perjalananDinasChartOptions
                    );
                    perjalananDinasChart.render();
                } catch (e) {
                    console.error("Error rendering perjalanan dinas chart:", e);
                }
            }

            // Chart kelengkapan dokumen
            if (document.getElementById('kelengkapanDokumenChart')) {
                const kelengkapanDokumenChartOptions = {
                    series: [{
                        name: 'Lengkap',
                        data: lengkapData
                    }, {
                        name: 'Belum Lengkap',
                        data: belumLengkapData
                    }],
                    chart: {
                        type: 'bar',
                        height: 360,
                        stacked: true,
                        fontFamily: 'Nunito, sans-serif',
                        toolbar: {
                            show: false
                        },
                    },
                    colors: ['#00ab55', '#e7515a'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: kelengkapanLabels,
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'center',
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val
                            }
                        }
                    }
                };

                try {
                    console.log("Rendering kelengkapan dokumen chart...");
                    const kelengkapanDokumenChart = new ApexCharts(
                        document.querySelector("#kelengkapanDokumenChart"),
                        kelengkapanDokumenChartOptions
                    );
                    kelengkapanDokumenChart.render();
                } catch (e) {
                    console.error("Error rendering kelengkapan dokumen chart:", e);
                }
            }
        });
    </script>
</x-layout.default>
