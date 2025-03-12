<x-layout.default>
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-lg p-6">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">{{ $employee->nama_pelaksana }}</h2>
                <p class="text-gray-600">{{ $employee->jabatan ?? 'Tidak ada Jabatan' }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-600 font-medium">Email</p>
                    <p class="text-gray-800">{{ $user->email }}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-medium">Jenis Kelamin</p>
                    <p class="text-gray-800">{{ $employee->jenis_kelamin }}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-medium">Pangkat/Golongan</p>
                    <p class="text-gray-800">{{ $employee->pangkat_golongan ?? 'Tidak ada' }}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-medium">Status Pegawai</p>
                    <p class="text-gray-800">{{ $employee->status_pegawai ?? 'Tidak ada' }}</p>
                </div>
                <div>
                    <p class="text-gray-600 font-medium">Nomor Telepon</p>
                    <p class="text-gray-800">{{ $employee->no_telp ?? 'Tidak ada' }}</p>
                </div>
            </div>

            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    Edit Profil
                </a>
                <a href="{{ route('profile.change-password') }}" class="btn btn-secondary">
                    Ubah Password
                </a>
            </div>
        </div>
    </div>
</x-layout.default>
