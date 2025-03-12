<x-layout.default>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Profil</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama -->
                    <div>
                        <label for="nama_pelaksana" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="nama_pelaksana" id="nama_pelaksana"
                            value="{{ $employee->nama_pelaksana }}"
                            class="form-input @error('nama_pelaksana') border-red-500 @enderror" required>
                        @error('nama_pelaksana')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}"
                            class="form-input @error('email') border-red-500 @enderror" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-gray-700 font-medium mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') border-red-500 @enderror" required>
                            <option value="Laki-laki" {{ $employee->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ $employee->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pangkat Golongan -->
                    <div>
                        <label for="pangkat_golongan"
                            class="block text-gray-700 font-medium mb-2">Pangkat/Golongan</label>
                        <input type="text" name="pangkat_golongan" id="pangkat_golongan"
                            value="{{ $employee->pangkat_golongan }}" class="form-input">
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan" class="block text-gray-700 font-medium mb-2">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ $employee->jabatan }}"
                            class="form-input">
                    </div>

                    <!-- Status Pegawai -->
                    <div>
                        <label for="status_pegawai" class="block text-gray-700 font-medium mb-2">Status Pegawai</label>
                        <input type="text" name="status_pegawai" id="status_pegawai"
                            value="{{ $employee->status_pegawai }}" class="form-input">
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="no_telp" class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                        <input type="tel" name="no_telp" id="no_telp" value="{{ $employee->no_telp }}"
                            class="form-input">
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-6 flex justify-end space-x-4">
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.default>
