<x-layout.default>
    @section('title', 'Buat Perdis')
    <div class="panel mt-6">
        <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Tambah Perjalanan Dinas</h5>

        <!-- Flash Messages -->
        @if ($errors->any() || session('error') || session('error_message'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium">
                            @if (session('error_message'))
                                {{ session('error_message') }}
                            @elseif(session('error'))
                                {{ session('error') }}
                            @else
                                Terdapat kesalahan pada data yang diinput. Silakan periksa kembali formulir anda.
                            @endif
                        </p>

                        @if ($errors->any())
                            <ul class="mt-2 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm"
                role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Progress Indicator -->
        <div id="form-progress" class="mb-6 hidden">
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-blue-600 h-2.5 rounded-full progress-bar" style="width: 0%"></div>
            </div>
            <p class="text-sm text-gray-600 mt-1">Memproses data...</p>
        </div>

        <form action="{{ route('perdis.store') }}" method="POST">
            @csrf
            <!-- Dokumen Informasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="jenis_dokumen_id" class="block mb-2">Jenis Dokumen</label>
                    <select name="jenis_dokumen_id" id="jenis_dokumen_id"
                        class="form-select @error('jenis_dokumen_id') border-red-500 @enderror" required>
                        <option value="">Pilih Jenis Dokumen</option>
                        @foreach ($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}"
                                {{ old('jenis_dokumen_id') == $documentType->id ? 'selected' : '' }}>
                                {{ $documentType->jenis_dokumen }}</option>
                        @endforeach
                    </select>
                    @error('jenis_dokumen_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nomor_dokumen" class="block mb-2">Nomor Dokumen</label>
                    <input type="text" name="nomor_dokumen" id="nomor_dokumen"
                        class="form-input @error('nomor_dokumen') border-red-500 @enderror"
                        value="{{ old('nomor_dokumen') }}" required>
                    @error('nomor_dokumen')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tanggal_pembuatan" class="block mb-2">Tanggal Pembuatan</label>
                    <input type="date" name="tanggal_pembuatan" id="tanggal_pembuatan"
                        class="form-input @error('tanggal_pembuatan') border-red-500 @enderror"
                        value="{{ old('tanggal_pembuatan') }}" required>
                    @error('tanggal_pembuatan')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Biaya Tambahan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="nomor_spm" class="block mb-2">Nomor SPM</label>
                    <input type="text" name="nomor_spm" id="nomor_spm"
                        class="form-input @error('nomor_spm') border-red-500 @enderror" value="{{ old('nomor_spm') }}"
                        required>
                    @error('nomor_spm')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nomor_sp2d" class="block mb-2">Nomor SP2D</label>
                    <input type="text" name="nomor_sp2d" id="nomor_sp2d"
                        class="form-input @error('nomor_sp2d') border-red-500 @enderror"
                        value="{{ old('nomor_sp2d') }}" required>
                    @error('nomor_sp2d')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="transport_antar_kota" class="block mb-2">Biaya Transport Antar Kota</label>
                    <input type="number" name="transport_antar_kota" id="transport_antar_kota"
                        class="form-input @error('transport_antar_kota') border-red-500 @enderror" step="0.01"
                        value="{{ old('transport_antar_kota') }}">
                    @error('transport_antar_kota')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="taksi_airport" class="block mb-2">Biaya Taksi Airport</label>
                    <input type="number" name="taksi_airport" id="taksi_airport"
                        class="form-input @error('taksi_airport') border-red-500 @enderror" step="0.01"
                        value="{{ old('taksi_airport') }}">
                    @error('taksi_airport')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="lain_lain" class="block mb-2">Biaya Lain-lain</label>
                    <input type="number" name="lain_lain" id="lain_lain"
                        class="form-input @error('lain_lain') border-red-500 @enderror" step="0.01"
                        value="{{ old('lain_lain') }}">
                    @error('lain_lain')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Pelaksana Container -->
            <div id="pelaksana-container"></div>
            <button type="button" id="add-pelaksana" class="btn btn-info mt-4">
                <i class="fas fa-plus mr-2"></i>Tambah Pelaksana
            </button>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Simpan Perjalanan Dinas</button>
            </div>
        </form>
    </div>

    <!-- Pelaksana Template -->
    <template id="pelaksana-template">
        <div class="pelaksana-card border p-4 mb-4 rounded-md bg-gray-50">
            <div class="flex justify-between mb-4">
                <h6 class="font-semibold">Pelaksana #<span class="pelaksana-number">1</span></h6>
                <button type="button" class="btn btn-danger btn-sm remove-pelaksana">
                    <i class="fas fa-times">Hapus Pelaksana</i>
                </button>
            </div>

            <!-- Informasi Dasar Pelaksana -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-2">Pegawai <span class="text-red-500">*</span></label>
                    <select name="pelaksana[INDEX][employee_id]" class="form-select employee-select" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" data-seksi-id="{{ $employee->seksi_id }}"
                                data-seksi-nama="{{ $employee->seksi ? $employee->seksi->nama_seksi : '' }}">
                                {{ $employee->nama_pelaksana }} - {{ $employee->seksi->nama_seksi }}
                            </option>
                        @endforeach
                    </select>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Pegawai harus dipilih</p>
                </div>
                <div>
                    <label class="block mb-2">Uraian Tugas <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][uraian_tugas]" class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Uraian tugas wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Nomor Surat Tugas <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][surat_tugas_nomor]" class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Nomor surat tugas wajib diisi</p>
                </div>
            </div>

            <!-- Tanggal -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-2">Tanggal Surat Tugas <span class="text-red-500">*</span></label>
                    <input type="date" name="pelaksana[INDEX][surat_tugas_tanggal]" class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Tanggal surat tugas wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                    <input type="date" name="pelaksana[INDEX][tanggal_mulai]" class="form-input tanggal-mulai"
                        required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Tanggal mulai wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Selesai <span class="text-red-500">*</span></label>
                    <input type="date" name="pelaksana[INDEX][tanggal_selesai]" class="form-input tanggal-selesai"
                        required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Tanggal selesai wajib diisi</p>
                </div>
                <p class="tanggal-error text-red-500 text-sm mt-1 hidden">Tanggal selesai harus setelah tanggal mulai
                </p>
            </div>

            <!-- Detail Perjalanan -->
            <div class="travel-details">
                <!-- Keberangkatan -->
                <div class="departures-section mb-4">
                    <h6 class="font-semibold mb-2">Detail Keberangkatan</h6>
                    <div class="departure-container"></div>
                    <button type="button" class="btn btn-warning btn-sm add-departure mt-2">
                        <i class="fas fa-plus mr-1"></i>Tambah Keberangkatan
                    </button>
                    <p class="section-error text-red-500 text-sm mt-1 hidden">Minimal satu data keberangkatan harus
                        diisi</p>
                </div>

                <!-- Kedatangan -->
                <div class="arrival-section mb-4">
                    <h6 class="font-semibold mb-2">Detail Kedatangan</h6>
                    <div class="arrival-container"></div>
                    <button type="button" class="btn btn-success btn-sm add-arrival mt-2">
                        <i class="fas fa-plus mr-1"></i>Tambah Kedatangan
                    </button>
                    <p class="section-error text-red-500 text-sm mt-1 hidden">Minimal satu data kedatangan harus diisi
                    </p>
                </div>

                <!-- Penginapan -->
                <div class="lodging-section mb-4">
                    <h6 class="font-semibold mb-2">Detail Penginapan</h6>
                    <div class="lodging-container"></div>
                    <button type="button" class="btn btn-secondary btn-sm add-lodging mt-2">
                        <i class="fas fa-plus mr-1"></i>Tambah Penginapan
                    </button>
                </div>

                <!-- Uang Harian -->
                <div class="perdiem-section mb-4">
                    <h6 class="font-semibold mb-2">Detail Uang Harian</h6>
                    <div class="perdiem-container"></div>
                    <button type="button" class="btn btn-info btn-sm add-perdiem mt-2">
                        <i class="fas fa-plus mr-1"></i>Tambah Uang Harian
                    </button>
                    <p class="section-error text-red-500 text-sm mt-1 hidden">Minimal satu data uang harian harus diisi
                    </p>
                </div>
            </div>
        </div>
    </template>

    <!-- Template Keberangkatan -->
    <template id="departure-template">
        <div class="departure-item border-l-2 border-blue-400 pl-3 mb-2 bg-white p-3 rounded">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Moda Transportasi <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][mode_transportation]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Moda transportasi wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Harga Tiket <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][departures][SUBINDEX][ticket_price]"
                        class="form-input" required step="0.01">
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Harga tiket wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Nomor Tiket <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][ticket_number]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Nomor tiket wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Kode Booking <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][booking_code]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Kode booking wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Keberangkatan <span class="text-red-500">*</span></label>
                    <input type="date" name="pelaksana[INDEX][departures][SUBINDEX][departure_date]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Tanggal keberangkatan wajib diisi</p>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-item">Hapus</button>
        </div>
    </template>

    <!-- Template Kedatangan -->
    <template id="arrival-template">
        <div class="arrival-item border-l-2 border-blue-400 pl-3 mb-2 bg-white p-3 rounded">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Moda Transportasi <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][mode_transportation]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Moda transportasi wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Harga Tiket <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][arrivals][SUBINDEX][ticket_price]"
                        class="form-input" required step="0.01">
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Harga tiket wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Nomor Tiket <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][ticket_number]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Nomor tiket wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Kode Booking <span class="text-red-500">*</span></label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][booking_code]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Kode booking wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Kedatangan <span class="text-red-500">*</span></label>
                    <input type="date" name="pelaksana[INDEX][arrivals][SUBINDEX][arrival_date]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Tanggal kedatangan wajib diisi</p>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-item">Hapus</button>
        </div>
    </template>

    <!-- Template Penginapan -->
    <template id="lodging-template">
        <div class="lodging-item border-l-2 border-blue-400 pl-3 mb-2 bg-white p-3 rounded">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Jumlah Malam <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][jumlah_malam]"
                        class="form-input" required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Jumlah malam wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Biaya Per Malam <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][satuan]" class="form-input"
                        required step="0.01">
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Biaya per malam wajib diisi</p>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-item">Hapus</button>
        </div>
    </template>

    <!-- Template Uang Harian -->
    <template id="perdiem-template">
        <div class="perdiem-item border-l-2 border-blue-400 pl-3 mb-2 bg-white p-3 rounded">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2">Jumlah Hari <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][jumlah_hari]" class="form-input"
                        required>
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Jumlah hari wajib diisi</p>
                </div>
                <div>
                    <label class="block mb-2">Biaya Per Hari <span class="text-red-500">*</span></label>
                    <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][satuan]" class="form-input"
                        required step="0.01">
                    <p class="error-message text-red-500 text-sm mt-1 hidden">Biaya per hari wajib diisi</p>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-item">Hapus</button>
        </div>
    </template>

</x-layout.default>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let pelaksanaCount = 0;
        const pelaksanaContainer = document.getElementById('pelaksana-container');
        const pelaksanaTemplate = document.getElementById('pelaksana-template');
        const form = document.querySelector('form');

        // Tambah Pelaksana
        document.getElementById('add-pelaksana').addEventListener('click', function() {
            const newPelaksana = document.importNode(pelaksanaTemplate.content, true);

            // Update index untuk semua input
            newPelaksana.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                element.name = element.name.replace('INDEX', pelaksanaCount);
            });

            // Update nomor pelaksana
            newPelaksana.querySelector('.pelaksana-number').textContent = pelaksanaCount + 1;

            // Tambahkan event listener untuk tombol remove
            const removePelaksanaButton = newPelaksana.querySelector('.remove-pelaksana');
            removePelaksanaButton.addEventListener('click', function() {
                this.closest('.pelaksana-card').remove();
                updateTotalBiaya();
            });

            // Setup handler untuk sub-item
            setupSubItemHandlers(newPelaksana, pelaksanaCount);

            // Setup validasi tanggal
            setupDateValidation(newPelaksana);

            // Setup validasi input
            setupRequiredValidation(newPelaksana);

            pelaksanaContainer.appendChild(newPelaksana);
            pelaksanaCount++;
        });

        function setupSubItemHandlers(pelaksanaElement, pelaksanaIndex) {
            // Setup handler untuk setiap section
            setupSection(pelaksanaElement, 'departure', pelaksanaIndex);
            setupSection(pelaksanaElement, 'arrival', pelaksanaIndex);
            setupSection(pelaksanaElement, 'lodging', pelaksanaIndex);
            setupSection(pelaksanaElement, 'perdiem', pelaksanaIndex);
        }

        function setupSection(pelaksanaElement, section, pelaksanaIndex) {
            const container = pelaksanaElement.querySelector(`.${section}-container`);
            const template = document.getElementById(`${section}-template`);
            let subIndex = 0;

            // Validasi template dan container
            if (!container || !template) {
                console.error(`Container atau template tidak ditemukan untuk section: ${section}`);
                return;
            }

            // Tambah item handler
            pelaksanaElement.querySelector(`.add-${section}`).addEventListener('click', function() {
                const newItem = document.importNode(template.content, true);

                // Update indices
                newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                    element.name = element.name.replace('INDEX', pelaksanaIndex);
                });
                newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(element => {
                    element.name = element.name.replace('SUBINDEX', subIndex);
                });

                // Setup validasi input required
                setupRequiredValidation(newItem);

                // Remove item handler
                newItem.querySelector('.remove-item').addEventListener('click', function() {
                    this.closest(`.${section}-item`).remove();
                    updateTotalBiaya();
                });

                // Add input handler for price fields
                newItem.querySelectorAll('input[type="number"]').forEach(input => {
                    input.addEventListener('input', updateTotalBiaya);
                });

                container.appendChild(newItem);
                subIndex++;

                // Sembunyikan pesan error section jika ada
                const sectionError = pelaksanaElement.querySelector(
                    `.${section}-section .section-error`);
                if (sectionError) {
                    sectionError.classList.add('hidden');
                }

                // Update total biaya
                updateTotalBiaya();
            });
        }

        // Tambahkan pelaksana pertama saat halaman dimuat
        if (pelaksanaContainer.children.length === 0) {
            document.getElementById('add-pelaksana').click();
        }

        // Setup validasi untuk input required
        function setupRequiredValidation(element) {
            const inputs = element.querySelectorAll('input[required], select[required]');

            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateInput(this);
                });

                input.addEventListener('input', function() {
                    // Hapus pesan error saat user mulai ketik
                    const errorMsg = this.nextElementSibling;
                    if (errorMsg && errorMsg.classList.contains('error-message')) {
                        errorMsg.classList.add('hidden');
                    }
                    this.classList.remove('border-red-500');
                });
            });
        }

        // Validasi input
        function validateInput(input) {
            const errorMsg = input.nextElementSibling;

            if (input.hasAttribute('required') && !input.value.trim()) {
                input.classList.add('border-red-500');
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.classList.remove('hidden');
                }
                return false;
            } else {
                input.classList.remove('border-red-500');
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.classList.add('hidden');
                }
                return true;
            }
        }

        // Setup validasi tanggal (tanggal_mulai harus lebih awal dari tanggal_selesai)
        function setupDateValidation(element) {
            const tanggalMulai = element.querySelector('.tanggal-mulai');
            const tanggalSelesai = element.querySelector('.tanggal-selesai');
            const tanggalError = element.querySelector('.tanggal-error');

            if (tanggalMulai && tanggalSelesai && tanggalError) {
                function validateDates() {
                    if (tanggalMulai.value && tanggalSelesai.value) {
                        const startDate = new Date(tanggalMulai.value);
                        const endDate = new Date(tanggalSelesai.value);

                        if (endDate < startDate) {
                            tanggalError.classList.remove('hidden');
                            tanggalSelesai.classList.add('border-red-500');
                            return false;
                        } else {
                            tanggalError.classList.add('hidden');
                            tanggalSelesai.classList.remove('border-red-500');
                            return true;
                        }
                    }
                    return true;
                }

                tanggalMulai.addEventListener('change', validateDates);
                tanggalSelesai.addEventListener('change', validateDates);
            }
        }

        // Format error key dari Laravel ke JavaScript
        function formatErrorKey(key) {
            // Ubah format pelaksana.0.departures.0.mode_transportation menjadi pelaksana[0][departures][0][mode_transportation]
            return key.replace(/\.(\d+)\./g, '[$1].').replace(/\.(\d+)$/g, '[$1]');
        }

        // Cari elemen HTML berdasarkan nama field
        function findElementByName(name) {
            // Escape karakter khusus untuk selector
            const escapedName = name.replace(/\[/g, '\\[').replace(/\]/g, '\\]');
            return document.querySelector(`[name="${escapedName}"]`);
        }

        // Fungsi untuk menampilkan pesan error pada field array
        function showArrayFieldErrors(errors) {
            // Proses setiap error
            for (const key in errors) {
                try {
                    // Format key untuk pencarian elemen
                    const formattedKey = formatErrorKey(key);
                    const element = findElementByName(formattedKey);

                    if (element) {
                        // Tambahkan class error pada elemen
                        element.classList.add('border-red-500');

                        // Cari atau buat elemen pesan error
                        let errorElement = element.nextElementSibling;
                        if (!errorElement || !errorElement.classList.contains('error-message')) {
                            errorElement = document.createElement('p');
                            errorElement.classList.add('error-message', 'text-red-500', 'text-sm', 'mt-1');
                            element.parentNode.insertBefore(errorElement, element.nextSibling);
                        }

                        // Set pesan error
                        errorElement.textContent = errors[key][0];
                        errorElement.classList.remove('hidden');

                        // Jika ini bagian dari nested container (seperti departures, arrivals, dll)
                        // tambahkan class error pada container
                        const sectionContainer = findSectionContainer(element);
                        if (sectionContainer) {
                            // Tampilkan pesan error di level section jika belum ada
                            const sectionError = sectionContainer.querySelector('.section-error');
                            if (sectionError && sectionError.classList.contains('hidden')) {
                                sectionError.classList.remove('hidden');
                            }

                            // Buka bagian yang tertutup jika ada
                            const sectionTitle = sectionContainer.querySelector('.section-title');
                            if (sectionTitle && sectionTitle.classList.contains('collapsed')) {
                                sectionTitle.click(); // Trigger click event untuk expand section
                            }
                        }
                    } else {
                        console.warn(`Element not found for error key: ${key}`);
                    }
                } catch (e) {
                    console.error(`Error displaying validation error for ${key}:`, e);
                }
            }

            // Scroll ke error pertama
            const firstErrorElement = document.querySelector('.border-red-500');
            if (firstErrorElement) {
                scrollToElement(firstErrorElement);
            }
        }

        // Cari container section (departures, arrivals, lodgings, perdiems)
        function findSectionContainer(element) {
            let parent = element;

            // Naik ke atas DOM tree untuk menemukan container section
            while (parent && !parent.classList.contains('departure-item') &&
                !parent.classList.contains('arrival-item') &&
                !parent.classList.contains('lodging-item') &&
                !parent.classList.contains('perdiem-item')) {
                parent = parent.parentElement;
            }

            // Jika menemukan salah satu item, naik satu level lagi untuk mendapatkan container section
            if (parent) {
                if (parent.classList.contains('departure-item')) {
                    return parent.closest('.departures-section');
                } else if (parent.classList.contains('arrival-item')) {
                    return parent.closest('.arrival-section');
                } else if (parent.classList.contains('lodging-item')) {
                    return parent.closest('.lodging-section');
                } else if (parent.classList.contains('perdiem-item')) {
                    return parent.closest('.perdiem-section');
                }
            }

            return null;
        }

        // Scroll ke elemen dengan animasi smooth
        function scrollToElement(element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            // Tambahkan highlight sementara
            element.classList.add('highlight-error');
            setTimeout(() => {
                element.classList.remove('highlight-error');
            }, 2000);

            // Focus pada elemen
            element.focus();
        }

        // Fungsi kalkulasi total biaya
        function updateTotalBiaya() {
            let total = 0;

            // Biaya transport antar kota
            const transportAntarKota = parseFloat(document.getElementById('transport_antar_kota').value) || 0;
            total += transportAntarKota;

            // Biaya taksi airport
            const taksiAirport = parseFloat(document.getElementById('taksi_airport').value) || 0;
            total += taksiAirport;

            // Biaya lain-lain
            const lainLain = parseFloat(document.getElementById('lain_lain').value) || 0;
            total += lainLain;

            // Tiket keberangkatan
            document.querySelectorAll('input[name*="[departures]"][name*="[ticket_price]"]').forEach(input => {
                const ticketPrice = parseFloat(input.value) || 0;
                total += ticketPrice;
            });

            // Tiket kedatangan
            document.querySelectorAll('input[name*="[arrivals]"][name*="[ticket_price]"]').forEach(input => {
                const ticketPrice = parseFloat(input.value) || 0;
                total += ticketPrice;
            });

            // Penginapan
            document.querySelectorAll('.lodging-item').forEach(item => {
                const jumlahMalam = parseFloat(item.querySelector('input[name*="[jumlah_malam]"]')
                    .value) || 0;
                const biayaPerMalam = parseFloat(item.querySelector('input[name*="[satuan]"]').value) ||
                    0;
                total += jumlahMalam * biayaPerMalam;
            });

            // Uang harian
            document.querySelectorAll('.perdiem-item').forEach(item => {
                const jumlahHari = parseFloat(item.querySelector('input[name*="[jumlah_hari]"]')
                    .value) || 0;
                const biayaPerHari = parseFloat(item.querySelector('input[name*="[satuan]"]').value) ||
                    0;
                total += jumlahHari * biayaPerHari;
            });

            // Update tampilan total
            const totalBiayaElement = document.getElementById('total-biaya');
            if (totalBiayaElement) {
                totalBiayaElement.textContent = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(total);
            }
        }

        // Event listener untuk input yang mempengaruhi total
        document.querySelectorAll('#transport_antar_kota, #taksi_airport, #lain_lain').forEach(input => {
            input.addEventListener('input', updateTotalBiaya);
        });

        // Validasi form sebelum submit
        form.addEventListener('submit', function(event) {
            let isValid = true;

            // Validasi semua input required
            const allRequiredInputs = form.querySelectorAll('input[required], select[required]');
            allRequiredInputs.forEach(input => {
                if (!validateInput(input)) {
                    isValid = false;
                }
            });

            // Validasi tanggal mulai/selesai
            const pelaksanaCards = document.querySelectorAll('.pelaksana-card');

            if (pelaksanaCards.length === 0) {
                isValid = false;
                showErrorSummary('Minimal satu pelaksana harus ditambahkan');
            }

            pelaksanaCards.forEach(card => {
                const tanggalMulai = card.querySelector('.tanggal-mulai');
                const tanggalSelesai = card.querySelector('.tanggal-selesai');

                if (tanggalMulai && tanggalSelesai && tanggalMulai.value && tanggalSelesai
                    .value) {
                    const startDate = new Date(tanggalMulai.value);
                    const endDate = new Date(tanggalSelesai.value);

                    if (endDate < startDate) {
                        const tanggalError = card.querySelector('.tanggal-error');
                        tanggalError.classList.remove('hidden');
                        tanggalSelesai.classList.add('border-red-500');
                        isValid = false;
                    }
                }

                // Validasi minimal satu keberangkatan
                const departureItems = card.querySelectorAll('.departure-item');
                if (departureItems.length === 0) {
                    const departureError = card.querySelector(
                        '.departures-section .section-error');
                    if (departureError) {
                        departureError.classList.remove('hidden');
                        isValid = false;
                    }
                }

                // Validasi minimal satu kedatangan
                const arrivalItems = card.querySelectorAll('.arrival-item');
                if (arrivalItems.length === 0) {
                    const arrivalError = card.querySelector('.arrival-section .section-error');
                    if (arrivalError) {
                        arrivalError.classList.remove('hidden');
                        isValid = false;
                    }
                }

                // Validasi minimal satu uang harian
                const perdiemItems = card.querySelectorAll('.perdiem-item');
                if (perdiemItems.length === 0) {
                    const perdiemError = card.querySelector('.perdiem-section .section-error');
                    if (perdiemError) {
                        perdiemError.classList.remove('hidden');
                        isValid = false;
                    }
                }
            });

            // Tampilkan pesan validasi di bagian atas jika form tidak valid
            if (!isValid) {
                event.preventDefault();

                // Tampilkan pesan error umum
                showErrorSummary();

                // Scroll ke bagian atas untuk melihat pesan error
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                // Tampilkan loading state
                showLoadingState();
            }
        });

        // Helper function untuk menampilkan pesan error summary
        function showErrorSummary(customMessage) {
            let errorSummary = document.querySelector('.error-summary');
            if (!errorSummary) {
                errorSummary = document.createElement('div');
                errorSummary.className =
                    'error-summary bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm';

                let message = `
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium">
                            ${customMessage || 'Formulir tidak dapat disimpan:'}
                        </p>
                        <p class="text-sm mt-1">
                            Mohon periksa kembali form dan lengkapi semua field yang ditandai.
                        </p>
                    </div>
                </div>
            `;

                errorSummary.innerHTML = message;

                // Tambahkan ke DOM di atas form
                const panel = document.querySelector('.panel');
                if (panel) {
                    panel.insertBefore(errorSummary, panel.firstChild.nextSibling);
                }
            } else {
                errorSummary.classList.remove('hidden');
            }
        }

        // Helper function untuk menampilkan loading state
        function showLoadingState() {
            // Tampilkan progress bar
            const formProgress = document.getElementById('form-progress');
            if (formProgress) {
                formProgress.classList.remove('hidden');

                // Animasi progress bar
                const progressBar = formProgress.querySelector('.progress-bar');
                if (progressBar) {
                    let width = 0;
                    const interval = setInterval(function() {
                        if (width >= 90) {
                            clearInterval(interval);
                        } else {
                            width++;
                            progressBar.style.width = width + '%';
                        }
                    }, 50);
                }
            }

            // Disable submit button
            const submitButton = document.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-50', 'cursor-not-allowed');
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
            }
        }

        // Hitung total awal
        updateTotalBiaya();

        // Event delegation untuk perubahan di dalam container pelaksana
        pelaksanaContainer.addEventListener('input', function(event) {
            if (
                event.target.name && (
                    event.target.name.includes('[ticket_price]') ||
                    event.target.name.includes('[jumlah_malam]') ||
                    event.target.name.includes('[jumlah_hari]') ||
                    event.target.name.includes('[satuan]')
                )
            ) {
                updateTotalBiaya();
            }
        });

        // Jika ada errors dari Laravel, tampilkan
        if (typeof errors !== 'undefined') {
            showArrayFieldErrors(errors);
        }

        // Untuk form edit: populate data yang sudah ada
        function populateExistingData() {
            // Jika ini adalah form edit dan ada data trip
            if (typeof trip !== 'undefined' && trip) {
                try {
                    // Populate pelaksana yang sudah ada
                    if (trip.pics && trip.pics.length > 0) {
                        trip.pics.forEach((pic, index) => {
                            // Tambah pelaksana baru jika diperlukan
                            if (index >= pelaksanaCount) {
                                document.getElementById('add-pelaksana').click();
                            }

                            // Ambil card pelaksana
                            const pelaksanaCard = document.querySelectorAll('.pelaksana-card')[index];

                            if (pelaksanaCard) {
                                // Set employee_id
                                const employeeSelect = pelaksanaCard.querySelector(
                                    'select[name*="[employee_id]"]');
                                if (employeeSelect) {
                                    employeeSelect.value = pic.employee_id;
                                }

                                // Set data lainnya
                                setInputValue(pelaksanaCard, 'input[name*="[uraian_tugas]"]', pic
                                    .uraian_tugas);
                                setInputValue(pelaksanaCard, 'input[name*="[surat_tugas_nomor]"]', pic
                                    .surat_tugas_nomor);
                                setInputValue(pelaksanaCard, 'input[name*="[surat_tugas_tanggal]"]', pic
                                    .surat_tugas_tanggal);
                                setInputValue(pelaksanaCard, 'input[name*="[tanggal_mulai]"]', pic
                                    .tanggal_mulai);
                                setInputValue(pelaksanaCard, 'input[name*="[tanggal_selesai]"]', pic
                                    .tanggal_selesai);

                                // Set hidden id field
                                const idField = document.createElement('input');
                                idField.type = 'hidden';
                                idField.name = `pelaksana[${index}][id]`;
                                idField.value = pic.id;
                                pelaksanaCard.appendChild(idField);

                                // Populate departures
                                if (pic.departure && pic.departure.length > 0) {
                                    populateSubItems(pelaksanaCard, 'departure', pic.departure, index);
                                }

                                // Populate arrivals
                                if (pic.arrival && pic.arrival.length > 0) {
                                    populateSubItems(pelaksanaCard, 'arrival', pic.arrival, index);
                                }

                                // Populate lodgings
                                if (pic.lodging && pic.lodging.length > 0) {
                                    populateSubItems(pelaksanaCard, 'lodging', pic.lodging, index);
                                }

                                // Populate perdiems
                                if (pic.perdiem && pic.perdiem.length > 0) {
                                    populateSubItems(pelaksanaCard, 'perdiem', pic.perdiem, index);
                                }
                            }
                        });
                    }

                    // Update total setelah populasi data
                    updateTotalBiaya();
                } catch (e) {
                    console.error('Error populating existing data:', e);
                }
            }
        }

        // Helper untuk set nilai input
        function setInputValue(container, selector, value) {
            const input = container.querySelector(selector);
            if (input && value) {
                input.value = value;
            }
        }

        // Populate sub items (departures, arrivals, lodgings, perdiems)
        function populateSubItems(pelaksanaCard, section, items, pelaksanaIndex) {
            const container = pelaksanaCard.querySelector(`.${section}-container`);
            const addButton = pelaksanaCard.querySelector(`.add-${section}`);

            if (!container || !addButton) return;

            // Clear existing items yang mungkin sudah ada
            container.innerHTML = '';

            items.forEach((item, itemIndex) => {
                // Click add button untuk menambah item baru
                addButton.click();

                // Ambil item yang baru ditambahkan (item terakhir)
                const newItem = container.lastElementChild;

                if (!newItem) return;

                // Set id hidden field
                const idField = document.createElement('input');
                idField.type = 'hidden';
                idField.name = `pelaksana[${pelaksanaIndex}][${section}s][${itemIndex}][id]`;
                idField.value = item.id;
                newItem.appendChild(idField);

                // Map fields berdasarkan tipe section
                const fieldMap = getFieldMap(section);

                // Set nilai untuk setiap field
                for (const [field, sourceField] of Object.entries(fieldMap)) {
                    if (item[sourceField] !== undefined) {
                        const inputSelector = `input[name*="[${field}]"]`;
                        setInputValue(newItem, inputSelector, item[sourceField]);
                    }
                }
            });
        }

        // Get field mapping berdasarkan tipe section
        function getFieldMap(section) {
            switch (section) {
                case 'departure':
                    return {
                        'mode_transportation': 'mode_transportation',
                        'ticket_price': 'ticket_price',
                        'ticket_number': 'ticket_number',
                        'booking_code': 'booking_code',
                        'departure_date': 'departure_date'
                    };
                case 'arrival':
                    return {
                        'mode_transportation': 'moda_transportasi',
                        'ticket_price': 'harga_tiket',
                        'ticket_number': 'nomor_tiket',
                        'booking_code': 'kode_booking',
                        'arrival_date': 'arrival_date'
                    };
                case 'lodging':
                    return {
                        'jumlah_malam': 'jumlah_malam',
                        'satuan': 'satuan'
                    };
                case 'perdiem':
                    return {
                        'jumlah_hari': 'jumlah_hari',
                        'satuan': 'satuan'
                    };
                default:
                    return {};
            }
        }

        // Jalankan populasi data jika ini form edit
        if (document.querySelector('form').getAttribute('action').includes('update')) {
            populateExistingData();
        }
    });
</script>
