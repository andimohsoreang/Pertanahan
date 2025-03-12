<x-layout.default>
    @section('title', 'Edit Perdis')
    <div class="panel mt-6">
        <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Edit Perjalanan Dinas</h5>

        <form action="{{ route('perdis.update', $trip->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Dokumen Informasi -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="jenis_dokumen_id" class="block mb-2">Jenis Dokumen</label>
                    <select name="jenis_dokumen_id" id="jenis_dokumen_id" class="form-select" required>
                        <option value="">Pilih Jenis Dokumen</option>
                        @foreach ($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}"
                                {{ $trip->document->jenis_dokumen_id == $documentType->id ? 'selected' : '' }}>
                                {{ $documentType->jenis_dokumen }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="nomor_dokumen" class="block mb-2">Nomor Dokumen</label>
                    <input type="text" name="nomor_dokumen" id="nomor_dokumen" class="form-input"
                        value="{{ $trip->document->nomor_dokumen }}" required>
                </div>
                <div>
                    <label for="tanggal_pembuatan" class="block mb-2">Tanggal Pembuatan</label>
                    <input type="date" name="tanggal_pembuatan" id="tanggal_pembuatan" class="form-input"
                        value="{{ $trip->document->tanggal_pembuatan }}" required>
                </div>
            </div>

            <!-- Biaya Tambahan -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="nomor_spm" class="block mb-2">Nomor SPM</label>
                    <input type="text" name="nomor_spm" id="nomor_spm" class="form-input"
                        value="{{ $trip->nomor_spm }}" required>
                </div>
                <div>
                    <label for="nomor_sp2d" class="block mb-2">Nomor SP2D</label>
                    <input type="text" name="nomor_sp2d" id="nomor_sp2d" class="form-input"
                        value="{{ $trip->nomor_sp2d }}" required>
                </div>
                <div>
                    <label for="transport_antar_kota" class="block mb-2">Biaya Transport Antar Kota</label>
                    <input type="number" name="transport_antar_kota" id="transport_antar_kota" class="form-input"
                        step="0.01" value="{{ $trip->transport_antar_kota }}">
                </div>
                <div>
                    <label for="taksi_airport" class="block mb-2">Biaya Taksi Airport</label>
                    <input type="number" name="taksi_airport" id="taksi_airport" class="form-input" step="0.01"
                        value="{{ $trip->taksi_airport }}">
                </div>
                <div>
                    <label for="lain_lain" class="block mb-2">Biaya Lain-lain</label>
                    <input type="number" name="lain_lain" id="lain_lain" class="form-input" step="0.01"
                        value="{{ $trip->lain_lain }}">
                </div>
            </div>

            <!-- Pelaksana Container -->
            <div id="pelaksana-container"></div>
            <button type="button" id="add-pelaksana" class="btn btn-secondary mt-4">
                <i class="fas fa-plus mr-2"></i>Tambah Pelaksana
            </button>

            <div class="mt-6">
                <button type="submit" class="btn btn-primary">Perbarui Perjalanan Dinas</button>
            </div>
        </form>
    </div>

    <!-- Template untuk pelaksana baru -->
    <template id="pelaksana-template">
        <div class="pelaksana-card border rounded-lg p-4 mb-4 bg-white dark:bg-gray-800">
            <input type="hidden" name="pelaksana[INDEX][id]" value="">
            <div class="flex justify-between items-center mb-4">
                <h6 class="font-semibold">Pelaksana <span class="pelaksana-number"></span></h6>
                <button type="button" class="remove-pelaksana text-red-500">
                    <i class="fas fa-times"></i> Hapus
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block mb-2">Pilih Pelaksana</label>
                    <select name="pelaksana[INDEX][employee_id]" class="form-select employee-select" required>
                        <option value="">Pilih Pelaksana</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_pelaksana }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-2">Uraian Tugas</label>
                    <input type="text" name="pelaksana[INDEX][uraian_tugas]" class="form-input" required>
                </div>
                <div>
                    <label class="block mb-2">Nomor Surat Tugas</label>
                    <input type="text" name="pelaksana[INDEX][surat_tugas_nomor]" class="form-input" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Surat Tugas</label>
                    <input type="date" name="pelaksana[INDEX][surat_tugas_tanggal]" class="form-input" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Mulai</label>
                    <input type="date" name="pelaksana[INDEX][tanggal_mulai]" class="form-input" required>
                </div>
                <div>
                    <label class="block mb-2">Tanggal Selesai</label>
                    <input type="date" name="pelaksana[INDEX][tanggal_selesai]" class="form-input" required>
                </div>
            </div>

            <!-- Keberangkatan Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h6 class="font-semibold">Keberangkatan</h6>
                    <button type="button" class="add-departure text-blue-500">
                        <i class="fas fa-plus"></i> Tambah Keberangkatan
                    </button>
                </div>
                <div class="departure-container"></div>
            </div>

            <!-- Kedatangan Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h6 class="font-semibold">Kedatangan</h6>
                    <button type="button" class="add-arrival text-blue-500">
                        <i class="fas fa-plus"></i> Tambah Kedatangan
                    </button>
                </div>
                <div class="arrival-container"></div>
            </div>

            <!-- Penginapan Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h6 class="font-semibold">Penginapan</h6>
                    <button type="button" class="add-lodging text-blue-500">
                        <i class="fas fa-plus"></i> Tambah Penginapan
                    </button>
                </div>
                <div class="lodging-container"></div>
            </div>

            <!-- Uang Harian Section -->
            <div class="mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h6 class="font-semibold">Uang Harian</h6>
                    <button type="button" class="add-perdiem text-blue-500">
                        <i class="fas fa-plus"></i> Tambah Uang Harian
                    </button>
                </div>
                <div class="perdiem-container"></div>
            </div>
        </div>
    </template>

    <!-- Template untuk keberangkatan -->
    <template id="departure-template">
        <div class="departure-item border border-gray-200 p-3 mb-2 rounded bg-gray-50 dark:bg-gray-700">
            <input type="hidden" name="pelaksana[INDEX][departures][SUBINDEX][id]" value="">
            <div class="flex justify-between items-start mb-2">
                <h6 class="font-semibold text-sm">Detail Keberangkatan</h6>
                <button type="button" class="remove-item text-red-500 text-sm">
                    <i class="fas fa-times"></i> Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div>
                    <label class="block mb-1 text-sm">Moda Transportasi</label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][mode_transportation]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Harga Tiket</label>
                    <input type="number" name="pelaksana[INDEX][departures][SUBINDEX][ticket_price]"
                        class="form-input text-sm" step="0.01">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Nomor Tiket</label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][ticket_number]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Kode Booking</label>
                    <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][booking_code]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Tanggal Keberangkatan</label>
                    <input type="date" name="pelaksana[INDEX][departures][SUBINDEX][departure_date]"
                        class="form-input text-sm">
                </div>
            </div>
        </div>
    </template>

    <!-- Template untuk kedatangan -->
    <template id="arrival-template">
        <div class="arrival-item border border-gray-200 p-3 mb-2 rounded bg-gray-50 dark:bg-gray-700">
            <input type="hidden" name="pelaksana[INDEX][arrivals][SUBINDEX][id]" value="">
            <div class="flex justify-between items-start mb-2">
                <h6 class="font-semibold text-sm">Detail Kedatangan</h6>
                <button type="button" class="remove-item text-red-500 text-sm">
                    <i class="fas fa-times"></i> Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div>
                    <label class="block mb-1 text-sm">Moda Transportasi</label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][moda_transportasi]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Harga Tiket</label>
                    <input type="number" name="pelaksana[INDEX][arrivals][SUBINDEX][harga_tiket]"
                        class="form-input text-sm" step="0.01">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Nomor Tiket</label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][nomor_tiket]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Kode Booking</label>
                    <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][kode_booking]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Tanggal Kedatangan</label>
                    <input type="date" name="pelaksana[INDEX][arrivals][SUBINDEX][arrival_date]"
                        class="form-input text-sm">
                </div>
            </div>
        </div>
    </template>

    <!-- Template untuk penginapan -->
    <template id="lodging-template">
        <div class="lodging-item border border-gray-200 p-3 mb-2 rounded bg-gray-50 dark:bg-gray-700">
            <input type="hidden" name="pelaksana[INDEX][lodgings][SUBINDEX][id]" value="">
            <div class="flex justify-between items-start mb-2">
                <h6 class="font-semibold text-sm">Detail Penginapan</h6>
                <button type="button" class="remove-item text-red-500 text-sm">
                    <i class="fas fa-times"></i> Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <label class="block mb-1 text-sm">Jumlah Malam</label>
                    <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][jumlah_malam]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Biaya per Malam</label>
                    <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][satuan]"
                        class="form-input text-sm" step="0.01">
                </div>
            </div>
        </div>
    </template>

    <!-- Template untuk uang harian -->
    <template id="perdiem-template">
        <div class="perdiem-item border border-gray-200 p-3 mb-2 rounded bg-gray-50 dark:bg-gray-700">
            <input type="hidden" name="pelaksana[INDEX][perdiems][SUBINDEX][id]" value="">
            <div class="flex justify-between items-start mb-2">
                <h6 class="font-semibold text-sm">Detail Uang Harian</h6>
                <button type="button" class="remove-item text-red-500 text-sm">
                    <i class="fas fa-times"></i> Hapus
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div>
                    <label class="block mb-1 text-sm">Jumlah Hari</label>
                    <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][jumlah_hari]"
                        class="form-input text-sm">
                </div>
                <div>
                    <label class="block mb-1 text-sm">Biaya per Hari</label>
                    <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][satuan]"
                        class="form-input text-sm" step="0.01">
                </div>
            </div>
        </div>
    </template>
</x-layout.default>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data perjalanan dinas dari backend
        const tripData = @json($trip);
        console.log('Data perjalanan dinas:', tripData); // Debug: lihat struktur data

        let pelaksanaCount = 0;
        const pelaksanaContainer = document.getElementById('pelaksana-container');
        const pelaksanaTemplate = document.getElementById('pelaksana-template');

        // Format tanggal untuk konsistensi
        function formatDate(dateString) {
            if (!dateString) return '';

            try {
                // Coba parse berbagai format
                const date = new Date(dateString);

                // Pastikan tanggal valid
                if (isNaN(date)) return '';

                // Format ke YYYY-MM-DD
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');

                return `${year}-${month}-${day}`;
            } catch (error) {
                console.error('Gagal memformat tanggal:', dateString);
                return '';
            }
        }

        // Format tanggal dokumen
        const documentTanggalPembuatan = document.getElementById('tanggal_pembuatan');
        if (documentTanggalPembuatan) {
            documentTanggalPembuatan.value = formatDate(tripData.document.tanggal_pembuatan);
        }

        // Fungsi untuk mengatur button penambahan sub-item
        function setupAddButtons(pelaksanaCard) {
            try {
                const pelaksanaIndex = Array.from(document.querySelectorAll('.pelaksana-card')).indexOf(
                    pelaksanaCard);

                // Setup Add Departure Button
                const addDepartureBtn = pelaksanaCard.querySelector('.add-departure');
                if (addDepartureBtn) {
                    addDepartureBtn.addEventListener('click', function() {
                        addSubItem(this, 'departure', pelaksanaIndex);
                    });
                }

                // Setup Add Arrival Button
                const addArrivalBtn = pelaksanaCard.querySelector('.add-arrival');
                if (addArrivalBtn) {
                    addArrivalBtn.addEventListener('click', function() {
                        addSubItem(this, 'arrival', pelaksanaIndex);
                    });
                }

                // Setup Add Lodging Button
                const addLodgingBtn = pelaksanaCard.querySelector('.add-lodging');
                if (addLodgingBtn) {
                    addLodgingBtn.addEventListener('click', function() {
                        addSubItem(this, 'lodging', pelaksanaIndex);
                    });
                }

                // Setup Add Perdiem Button
                const addPerdiemBtn = pelaksanaCard.querySelector('.add-perdiem');
                if (addPerdiemBtn) {
                    addPerdiemBtn.addEventListener('click', function() {
                        addSubItem(this, 'perdiem', pelaksanaIndex);
                    });
                }
            } catch (error) {
                console.error('Error saat setup button:', error);
            }
        }

        // Fungsi untuk menambah sub-item (departure, arrival, lodging, perdiem)
        function addSubItem(button, itemType, pelaksanaIndex) {
            try {
                const pelaksanaCard = button.closest('.pelaksana-card');
                const container = pelaksanaCard.querySelector(`.${itemType}-container`);
                const template = document.getElementById(`${itemType}-template`);

                if (!container || !template) {
                    console.error(`Container atau template untuk ${itemType} tidak ditemukan`);
                    return;
                }

                const subIndex = container.children.length;
                const newItem = document.importNode(template.content, true);

                // Update indices
                newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                    element.name = element.name.replace('INDEX', pelaksanaIndex);
                });
                newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(element => {
                    element.name = element.name.replace('SUBINDEX', subIndex);
                });

                // Event handler untuk tombol hapus
                const removeButton = newItem.querySelector('.remove-item');
                if (removeButton) {
                    removeButton.addEventListener('click', function() {
                        this.closest(`.${itemType}-item`).remove();
                    });
                }

                container.appendChild(newItem);
            } catch (error) {
                console.error(`Error saat menambah ${itemType}:`, error);
            }
        }

        // Fungsi untuk mengisi data pelaksana dari backend
        function populatePelaksanaData() {
            try {
                if (!tripData.pics || tripData.pics.length === 0) {
                    // Tambah pelaksana pertama jika tidak ada data
                    const addPelaksanaBtn = document.getElementById('add-pelaksana');
                    if (addPelaksanaBtn) {
                        addPelaksanaBtn.click();
                    }
                    return;
                }

                tripData.pics.forEach(pic => {
                    try {
                        console.log('Processing PIC:', pic); // Debug log

                        const newPelaksana = document.importNode(pelaksanaTemplate.content, true);

                        // Update indices untuk semua input
                        newPelaksana.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                            element.name = element.name.replace('INDEX', pelaksanaCount);
                        });

                        // Set ID pelaksana
                        const idField = newPelaksana.querySelector('input[name*="[id]"]');
                        if (idField) {
                            idField.value = pic.id || '';
                        }

                        // Set data pegawai
                        const employeeSelect = newPelaksana.querySelector('.employee-select');
                        if (employeeSelect) {
                            employeeSelect.value = pic.employee_id || '';
                        }

                        // Isi data dasar pelaksana
                        const fieldMappings = [{
                                selector: 'input[name*="[uraian_tugas]"]',
                                value: pic.uraian_tugas
                            },
                            {
                                selector: 'input[name*="[surat_tugas_nomor]"]',
                                value: pic.surat_tugas_nomor
                            },
                            {
                                selector: 'input[name*="[surat_tugas_tanggal]"]',
                                value: formatDate(pic.surat_tugas_tanggal)
                            },
                            {
                                selector: 'input[name*="[tanggal_mulai]"]',
                                value: formatDate(pic.tanggal_mulai)
                            },
                            {
                                selector: 'input[name*="[tanggal_selesai]"]',
                                value: formatDate(pic.tanggal_selesai)
                            }
                        ];

                        fieldMappings.forEach(mapping => {
                            const field = newPelaksana.querySelector(mapping.selector);
                            if (field) {
                                field.value = mapping.value || '';
                            }
                        });

                        // Update nomor pelaksana
                        const pelaksanaNumber = newPelaksana.querySelector('.pelaksana-number');
                        if (pelaksanaNumber) {
                            pelaksanaNumber.textContent = pelaksanaCount + 1;
                        }

                        // Event handler untuk tombol hapus pelaksana
                        const removePelaksanaButton = newPelaksana.querySelector('.remove-pelaksana');
                        if (removePelaksanaButton) {
                            removePelaksanaButton.addEventListener('click', function() {
                                this.closest('.pelaksana-card').remove();
                            });
                        }

                        pelaksanaContainer.appendChild(newPelaksana);

                        // Ambil pelaksana card yang baru ditambahkan
                        const pelaksanaCard = pelaksanaContainer.lastElementChild;

                        // Setup event listener untuk tombol penambahan
                        setupAddButtons(pelaksanaCard);

                        // Populate sub-items
                        populateSubItems(pelaksanaCard, pic, pelaksanaCount);

                        pelaksanaCount++;
                    } catch (picError) {
                        console.error('Error memproses PIC:', picError);
                    }
                });
            } catch (error) {
                console.error('Error populatePelaksanaData:', error);
            }
        }

        // Fungsi untuk mengisi subitem dari backend data
        function populateSubItems(pelaksanaCard, pic, pelaksanaIndex) {
            try {
                console.log('Debug populateSubItems:', {
                    pelaksanaIndex,
                    picId: pic.id,
                    picKeys: Object.keys(pic),
                    departureData: pic.departure,
                    arrivalData: pic.arrival,
                    lodgingData: pic.lodging,
                    perdiemData: pic.perdiem
                });

                // Helper function untuk verifikasi container
                function verifyContainer(container, name) {
                    if (!container) {
                        console.error(`Container untuk ${name} tidak ditemukan`);
                        return false;
                    }
                    return true;
                }

                // Populate Departures
                populateDepartures();

                // Populate Arrivals
                populateArrivals();

                // Populate Lodgings
                populateLodgings();

                // Populate Perdiems
                populatePerdiems();

                // Fungsi untuk populate departures
                function populateDepartures() {
                    try {
                        const container = pelaksanaCard.querySelector('.departure-container');
                        const template = document.getElementById('departure-template');

                        if (!verifyContainer(container, 'departures') || !template) return;

                        if (pic.departure && Array.isArray(pic.departure) && pic.departure.length > 0) {
                            pic.departure.forEach((departure, index) => {
                                try {
                                    console.log('Populating departure:', departure);

                                    const newItem = document.importNode(template.content, true);

                                    // Update indices
                                    newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                                        element.name = element.name.replace('INDEX',
                                            pelaksanaIndex);
                                    });
                                    newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(
                                    element => {
                                        element.name = element.name.replace('SUBINDEX', index);
                                    });

                                    // Set ID
                                    const idField = newItem.querySelector('input[name*="[id]"]');
                                    if (idField) idField.value = departure.id || '';

                                    // Map fields
                                    const fieldMappings = [{
                                            selector: 'input[name*="[mode_transportation]"]',
                                            value: departure.mode_transportation
                                        },
                                        {
                                            selector: 'input[name*="[ticket_price]"]',
                                            value: departure.ticket_price
                                        },
                                        {
                                            selector: 'input[name*="[ticket_number]"]',
                                            value: departure.ticket_number
                                        },
                                        {
                                            selector: 'input[name*="[booking_code]"]',
                                            value: departure.booking_code
                                        },
                                        {
                                            selector: 'input[name*="[departure_date]"]',
                                            value: formatDate(departure.departure_date)
                                        }
                                    ];

                                    fieldMappings.forEach(mapping => {
                                        const field = newItem.querySelector(mapping.selector);
                                        if (field) {
                                            field.value = mapping.value || '';
                                        }
                                    });

                                    // Event handler untuk hapus
                                    const removeButton = newItem.querySelector('.remove-item');
                                    if (removeButton) {
                                        removeButton.addEventListener('click', function() {
                                            this.closest('.departure-item').remove();
                                        });
                                    }

                                    container.appendChild(newItem);
                                } catch (depError) {
                                    console.error('Error memproses departure:', depError);
                                }
                            });
                        }
                    } catch (error) {
                        console.error('Error populateDepartures:', error);
                    }
                }

                // Fungsi untuk populate arrivals
                function populateArrivals() {
                    try {
                        const container = pelaksanaCard.querySelector('.arrival-container');
                        const template = document.getElementById('arrival-template');

                        if (!verifyContainer(container, 'arrivals') || !template) return;

                        if (pic.arrival && Array.isArray(pic.arrival) && pic.arrival.length > 0) {
                            pic.arrival.forEach((arrival, index) => {
                                try {
                                    console.log('Populating arrival:', arrival);

                                    const newItem = document.importNode(template.content, true);

                                    // Update indices
                                    newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                                        element.name = element.name.replace('INDEX',
                                            pelaksanaIndex);
                                    });
                                    newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(
                                    element => {
                                        element.name = element.name.replace('SUBINDEX', index);
                                    });

                                    // Set ID
                                    const idField = newItem.querySelector('input[name*="[id]"]');
                                    if (idField) idField.value = arrival.id || '';

                                    // Map fields - gunakan nama field yang sesuai dengan model
                                    const fieldMappings = [{
                                            selector: 'input[name*="[moda_transportasi]"]',
                                            value: arrival.moda_transportasi
                                        },
                                        {
                                            selector: 'input[name*="[harga_tiket]"]',
                                            value: arrival.harga_tiket
                                        },
                                        {
                                            selector: 'input[name*="[nomor_tiket]"]',
                                            value: arrival.nomor_tiket
                                        },
                                        {
                                            selector: 'input[name*="[kode_booking]"]',
                                            value: arrival.kode_booking
                                        },
                                        {
                                            selector: 'input[name*="[arrival_date]"]',
                                            value: formatDate(arrival.arrival_date)
                                        }
                                    ];

                                    fieldMappings.forEach(mapping => {
                                        const field = newItem.querySelector(mapping.selector);
                                        if (field) {
                                            field.value = mapping.value || '';
                                        }
                                    });

                                    // Event handler untuk hapus
                                    const removeButton = newItem.querySelector('.remove-item');
                                    if (removeButton) {
                                        removeButton.addEventListener('click', function() {
                                            this.closest('.arrival-item').remove();
                                        });
                                    }

                                    container.appendChild(newItem);
                                } catch (arrError) {
                                    console.error('Error memproses arrival:', arrError);
                                }
                            });
                        }
                    } catch (error) {
                        console.error('Error populateArrivals:', error);
                    }
                }

                // Fungsi untuk populate lodgings
                function populateLodgings() {
                    try {
                        const container = pelaksanaCard.querySelector('.lodging-container');
                        const template = document.getElementById('lodging-template');

                        if (!verifyContainer(container, 'lodgings') || !template) return;

                        if (pic.lodging && Array.isArray(pic.lodging) && pic.lodging.length > 0) {
                            pic.lodging.forEach((lodging, index) => {
                                try {
                                    console.log('Populating lodging:', lodging);

                                    const newItem = document.importNode(template.content, true);

                                    // Update indices
                                    newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                                        element.name = element.name.replace('INDEX',
                                            pelaksanaIndex);
                                    });
                                    newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(
                                    element => {
                                        element.name = element.name.replace('SUBINDEX', index);
                                    });

                                    // Set ID
                                    const idField = newItem.querySelector('input[name*="[id]"]');
                                    if (idField) idField.value = lodging.id || '';

                                    // Map fields
                                    const fieldMappings = [{
                                            selector: 'input[name*="[jumlah_malam]"]',
                                            value: lodging.jumlah_malam
                                        },
                                        {
                                            selector: 'input[name*="[satuan]"]',
                                            value: lodging.satuan
                                        }
                                    ];

                                    fieldMappings.forEach(mapping => {
                                        const field = newItem.querySelector(mapping.selector);
                                        if (field) {
                                            field.value = mapping.value || '';
                                        }
                                    });

                                    // Event handler untuk hapus
                                    const removeButton = newItem.querySelector('.remove-item');
                                    if (removeButton) {
                                        removeButton.addEventListener('click', function() {
                                            this.closest('.lodging-item').remove();
                                        });
                                    }

                                    container.appendChild(newItem);
                                } catch (lodgError) {
                                    console.error('Error memproses lodging:', lodgError);
                                }
                            });
                        }
                    } catch (error) {
                        console.error('Error populateLodgings:', error);
                    }
                }

                // Fungsi untuk populate perdiems
                function populatePerdiems() {
                    try {
                        const container = pelaksanaCard.querySelector('.perdiem-container');
                        const template = document.getElementById('perdiem-template');

                        if (!verifyContainer(container, 'perdiems') || !template) return;

                        if (pic.perdiem && Array.isArray(pic.perdiem) && pic.perdiem.length > 0) {
                            pic.perdiem.forEach((perdiem, index) => {
                                try {
                                    console.log('Populating perdiem:', perdiem);

                                    const newItem = document.importNode(template.content, true);

                                    // Update indices
                                    newItem.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                                        element.name = element.name.replace('INDEX',
                                            pelaksanaIndex);
                                    });
                                    newItem.querySelectorAll('[name*="[SUBINDEX]"]').forEach(
                                    element => {
                                        element.name = element.name.replace('SUBINDEX', index);
                                    });

                                    // Set ID
                                    const idField = newItem.querySelector('input[name*="[id]"]');
                                    if (idField) idField.value = perdiem.id || '';

                                    // Map fields
                                    const fieldMappings = [{
                                            selector: 'input[name*="[jumlah_hari]"]',
                                            value: perdiem.jumlah_hari
                                        },
                                        {
                                            selector: 'input[name*="[satuan]"]',
                                            value: perdiem.satuan
                                        }
                                    ];

                                    fieldMappings.forEach(mapping => {
                                        const field = newItem.querySelector(mapping.selector);
                                        if (field) {
                                            field.value = mapping.value || '';
                                        }
                                    });

                                    // Event handler untuk hapus
                                    const removeButton = newItem.querySelector('.remove-item');
                                    if (removeButton) {
                                        removeButton.addEventListener('click', function() {
                                            this.closest('.perdiem-item').remove();
                                        });
                                    }

                                    container.appendChild(newItem);
                                } catch (perdiemError) {
                                    console.error('Error memproses perdiem:', perdiemError);
                                }
                            });
                        }
                    } catch (error) {
                        console.error('Error populatePerdiems:', error);
                    }
                }
            } catch (error) {
                console.error('Error dalam populateSubItems:', error);
            }
        }

        // Event handler untuk tambah pelaksana
        const addPelaksanaBtn = document.getElementById('add-pelaksana');
        if (addPelaksanaBtn) {
            addPelaksanaBtn.addEventListener('click', function() {
                try {
                    const newPelaksana = document.importNode(pelaksanaTemplate.content, true);

                    // Update indices
                    newPelaksana.querySelectorAll('[name*="[INDEX]"]').forEach(element => {
                        element.name = element.name.replace('INDEX', pelaksanaCount);
                    });

                    // Update nomor pelaksana
                    const pelaksanaNumber = newPelaksana.querySelector('.pelaksana-number');
                    if (pelaksanaNumber) {
                        pelaksanaNumber.textContent = pelaksanaCount + 1;
                    }

                    // Event handler untuk tombol hapus
                    const removePelaksanaButton = newPelaksana.querySelector('.remove-pelaksana');
                    if (removePelaksanaButton) {
                        removePelaksanaButton.addEventListener('click', function() {
                            this.closest('.pelaksana-card').remove();
                        });
                    }

                    pelaksanaContainer.appendChild(newPelaksana);

                    // Setup event listener untuk tombol penambahan
                    setupAddButtons(pelaksanaContainer.lastElementChild);

                    pelaksanaCount++;
                } catch (error) {
                    console.error('Error menambah pelaksana:', error);
                }
            });
        }

        // Validasi form saat submit
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(event) {
                try {
                    const pelaksanaElements = document.querySelectorAll('.pelaksana-card');

                    if (pelaksanaElements.length === 0) {
                        event.preventDefault();
                        alert('Minimal tambahkan satu pelaksana');
                        return;
                    }

                    // Validasi field yang wajib diisi
                    const requiredFields = form.querySelectorAll('[required]');
                    let isValid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            isValid = false;
                            field.classList.add('border-red-500');
                        } else {
                            field.classList.remove('border-red-500');
                        }
                    });

                    if (!isValid) {
                        event.preventDefault();
                        alert('Harap lengkapi semua field yang wajib diisi');
                    }
                } catch (error) {
                    console.error('Error validasi form:', error);
                }
            });
        }

        // Fungsi untuk perhitungan otomatis total
        function setupAutoCalculation() {
            try {
                document.addEventListener('change', function(e) {
                    const target = e.target;

                    // Untuk lodging: jumlah_malam * satuan
                    if (target.name && target.name.includes('lodgings') &&
                        (target.name.includes('jumlah_malam') || target.name.includes('satuan'))) {

                        const lodgingItem = target.closest('.lodging-item');
                        if (!lodgingItem) return;

                        const jumlahMalamInput = lodgingItem.querySelector(
                            'input[name*="[jumlah_malam]"]');
                        const satuanInput = lodgingItem.querySelector('input[name*="[satuan]"]');

                        if (jumlahMalamInput && satuanInput) {
                            const jumlahMalam = parseFloat(jumlahMalamInput.value) || 0;
                            const satuan = parseFloat(satuanInput.value) || 0;
                            const total = jumlahMalam * satuan;

                            // Jika ada elemen untuk menampilkan total
                            const totalDisplay = lodgingItem.querySelector('.total-display');
                            if (totalDisplay) {
                                totalDisplay.textContent =
                                    `Total: ${total.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'})}`;
                            }
                        }
                    }

                    // Untuk perdiem: jumlah_hari * satuan
                    if (target.name && target.name.includes('perdiems') &&
                        (target.name.includes('jumlah_hari') || target.name.includes('satuan'))) {

                        const perdiemItem = target.closest('.perdiem-item');
                        if (!perdiemItem) return;

                        const jumlahHariInput = perdiemItem.querySelector(
                            'input[name*="[jumlah_hari]"]');
                        const satuanInput = perdiemItem.querySelector('input[name*="[satuan]"]');

                        if (jumlahHariInput && satuanInput) {
                            const jumlahHari = parseFloat(jumlahHariInput.value) || 0;
                            const satuan = parseFloat(satuanInput.value) || 0;
                            const total = jumlahHari * satuan;

                            // Jika ada elemen untuk menampilkan total
                            const totalDisplay = perdiemItem.querySelector('.total-display');
                            if (totalDisplay) {
                                totalDisplay.textContent =
                                    `Total: ${total.toLocaleString('id-ID', {style: 'currency', currency: 'IDR'})}`;
                            }
                        }
                    }
                });
            } catch (error) {
                console.error('Error setup auto calculation:', error);
            }
        }

        // Setup perhitungan otomatis
        setupAutoCalculation();

        // Jalankan fungsi untuk mengisi data saat halaman dimuat
        populatePelaksanaData();
    });
</script>
