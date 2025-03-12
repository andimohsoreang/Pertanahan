<!-- Pelaksana Template -->

<template id="pelaksana-template">
    <div class="pelaksana-card border p-4 mb-4 rounded-md bg-gray-50">
        <div class="flex justify-between mb-4">
            <h6 class="font-semibold">Pelaksana #<span class="pelaksana-number">1</span></h6>
            <button type="button" class="btn btn-danger btn-sm remove-pelaksana">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Informasi Dasar Pelaksana -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label class="block mb-2">Pegawai</label>
                <select name="pelaksana[INDEX][employee_id]" class="form-select employee-select" required>
                    <option value="">Pilih Pegawai</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" data-seksi-id="{{ $employee->seksi_id }}"
                            data-seksi-nama="{{ $employee->seksi ? $employee->seksi->nama_seksi : '' }}">
                            {{ $employee->nama_pelaksana }} - {{ $employee->seksi->nama_seksi }}
                        </option>
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
        </div>

        <!-- Tanggal -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
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

        <!-- Detail Perjalanan -->
        <div class="travel-details">
            <!-- Keberangkatan -->
            <div class="departures-section mb-4">
                <h6 class="font-semibold mb-2">Detail Keberangkatan</h6>
                <div class="departure-container"></div>
                <button type="button" class="btn btn-info btn-sm add-departure mt-2">
                    <i class="fas fa-plus mr-1"></i>Tambah Keberangkatan
                </button>
            </div>

            <!-- Kedatangan -->
            <div class="arrival-section mb-4">
                <h6 class="font-semibold mb-2">Detail Kedatangan</h6>
                <div class="arrival-container"></div>
                <button type="button" class="btn btn-info btn-sm add-arrival mt-2">
                    <i class="fas fa-plus mr-1"></i>Tambah Kedatangan
                </button>
            </div>

            <!-- Penginapan -->
            <div class="lodging-section mb-4">
                <h6 class="font-semibold mb-2">Detail Penginapan</h6>
                <div class="lodging-container"></div>
                <button type="button" class="btn btn-info btn-sm add-lodging mt-2">
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
            </div>
        </div>
    </div>
</template>

<!-- Template Keberangkatan -->
<template id="departure-template">
    <div class="departure-item border-l-2 border-blue-400 pl-3 mb-2 bg-white p-3 rounded">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-2">Moda Transportasi</label>
                <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][mode_transportation]"
                    class="form-input" required>
            </div>
            <div>
                <label class="block mb-2">Harga Tiket</label>
                <input type="number" name="pelaksana[INDEX][departures][SUBINDEX][ticket_price]" class="form-input"
                    required step="0.01">
            </div>
            <div>
                <label class="block mb-2">Nomor Tiket</label>
                <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][ticket_number]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Kode Booking</label>
                <input type="text" name="pelaksana[INDEX][departures][SUBINDEX][booking_code]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Tanggal Keberangkatan</label>
                <input type="date" name="pelaksana[INDEX][departures][SUBINDEX][departure_date]" class="form-input"
                    required>
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
                <label class="block mb-2">Moda Transportasi</label>
                <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][mode_transportation]"
                    class="form-input" required>
            </div>
            <div>
                <label class="block mb-2">Harga Tiket</label>
                <input type="number" name="pelaksana[INDEX][arrivals][SUBINDEX][ticket_price]" class="form-input"
                    required step="0.01">
            </div>
            <div>
                <label class="block mb-2">Nomor Tiket</label>
                <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][ticket_number]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Kode Booking</label>
                <input type="text" name="pelaksana[INDEX][arrivals][SUBINDEX][booking_code]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Tanggal Kedatangan</label>
                <input type="date" name="pelaksana[INDEX][arrivals][SUBINDEX][arrival_date]" class="form-input"
                    required>
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
                <label class="block mb-2">Jumlah Malam</label>
                <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][jumlah_malam]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Biaya Per Malam</label>
                <input type="number" name="pelaksana[INDEX][lodgings][SUBINDEX][satuan]" class="form-input" required
                    step="0.01">
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
                <label class="block mb-2">Jumlah Hari</label>
                <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][jumlah_hari]" class="form-input"
                    required>
            </div>
            <div>
                <label class="block mb-2">Biaya Per Hari</label>
                <input type="number" name="pelaksana[INDEX][perdiems][SUBINDEX][satuan]" class="form-input" required
                    step="0.01">
            </div>
        </div>
        <button type="button" class="btn btn-danger btn-sm mt-2 remove-item">Hapus</button>
    </div>
</template>
