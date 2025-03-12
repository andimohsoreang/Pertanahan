<x-layout.default>
    @section('title', 'Edit Account')
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('users.listAccount') }}" class="text-primary hover:underline">User</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit User</span>
        </li>
    </ul>

    <div class="pt-5 grid grid-cols-1 xl:grid-cols-1 gap-6">
        <div class="panel">
            <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Edit User</h5>
            <form action="{{ route('users.updateAccount', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" class="form-input"
                            value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="form-input"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru
                            (Opsional)</label>
                        <input type="password" name="password" id="password" class="form-input"
                            placeholder="Kosongkan jika tidak ingin mengubah password">
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                            Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-input" placeholder="Konfirmasi password baru">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="employee_id" class="block text-sm font-medium text-gray-700">Pilih Pegawai</label>
                        <select name="employee_id" id="employee_id" class="form-select">
                            <option value="">Pilih Pegawai</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ $user->employee_id == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_pelaksana }} - {{ $employee->jabatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="">Pilih Role</option>
                            <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator
                            </option>
                            <option value="verificator" {{ $user->role == 'verificator' ? 'selected' : '' }}>
                                Verificator</option>
                            <option value="hod" {{ $user->role == 'hod' ? 'selected' : '' }}>HOD</option>
                            <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin
                            </option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn bg-primary text-white px-4 py-2 rounded">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('password_confirmation');

            confirmPassword.addEventListener('input', function() {
                if (password.value && password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Password tidak cocok');
                } else {
                    confirmPassword.setCustomValidity('');
                }
            });
        });
    </script>
</x-layout.default>
