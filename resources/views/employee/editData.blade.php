<x-layout.default>

    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Forms</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Validation</span>
        </li>
    </ul>

    <div class="pt-5 grid grid-cols-1 xl:grid-cols-1 gap-6" x-data="form">
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Edit Employee</h5>
            </div>

            <div class="mb-5">
                <form class="space-y-5" method="POST" action="{{ route('pegawai.update', $employee->id) }}">
                    @csrf
                    @method('PUT') <!-- Menyatakan bahwa form ini menggunakan method PUT untuk update -->

                    <!-- Seksi -->
                    <div :class="[isSubmitForm6 ? (form6.seksi_id ? 'has-success' : 'has-error') : '']">
                        <label for="seksi_id">Seksi</label>
                        <select
                            id="seksi_id"
                            name="seksi_id"
                            class="form-input"
                            x-model="form6.seksi_id"
                        >
                            <option value="">Pilih Seksi</option>
                            @foreach($seksis as $seksi)
                                <option
                                    value="{{ $seksi->id }}"
                                    {{ old('seksi_id', $employee->seksi_id) == $seksi->id ? 'selected' : '' }}
                                >
                                    {{ $seksi->nama_seksi }}
                                </option>
                            @endforeach
                        </select>
                        @error('seksi_id')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Full Name -->
                    <div :class="[isSubmitForm1 ? (form1.name ? 'has-success' : 'has-error') : '']">
                        <label for="nama_pelaksana">Full Name</label>
                        <input id="nama_pelaksana" name="nama_pelaksana" type="text" placeholder="Enter Full Name"
                            class="form-input" value="{{ old('nama_pelaksana', $employee->nama_pelaksana) }}" />
                        @error('nama_pelaksana')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                        <template x-if="isSubmitForm1 && form1.name">
                            <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                        </template>
                    </div>

                    <!-- Gender -->
                    <div :class="[isSubmitForm2 ? (form2.jenis_kelamin ? 'has-success' : 'has-error') : '']">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-input">
                            <option value="L"
                                {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P"
                                {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Employee Status -->
                    <div :class="[isSubmitForm3 ? (form3.status_pegawai ? 'has-success' : 'has-error') : '']">
                        <label for="status_pegawai">Status Pegawai</label>
                        <select id="status_pegawai" name="status_pegawai" class="form-input">
                            <option value="KLHK"
                                {{ old('status_pegawai', $employee->status_pegawai) == 'KLHK' ? 'selected' : '' }}>KLHK
                            </option>
                            <option value="Non KLHK"
                                {{ old('status_pegawai', $employee->status_pegawai) == 'Non KLHK' ? 'selected' : '' }}>
                                Non KLHK</option>
                        </select>
                        @error('status_pegawai')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pangkat Golongan -->
                    <div :class="[isSubmitForm4 ? (form4.pangkat_golongan ? 'has-success' : 'has-error') : '']">
                        <label for="pangkat_golongan">Pangkat Golongan</label>
                        <input id="pangkat_golongan" name="pangkat_golongan" type="text"
                            placeholder="Enter Pangkat Golongan" class="form-input"
                            value="{{ old('pangkat_golongan', $employee->pangkat_golongan) }}" />
                        @error('pangkat_golongan')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div :class="[isSubmitForm5 ? (form5.jabatan ? 'has-success' : 'has-error') : '']">
                        <label for="jabatan">Jabatan</label>
                        <input id="jabatan" name="jabatan" type="text" placeholder="Enter Jabatan"
                            class="form-input" value="{{ old('jabatan', $employee->jabatan) }}" />
                        @error('jabatan')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nomor Telepon -->
                    <div :class="[isSubmitForm6 ? (form6.no_telp ? 'has-success' : 'has-error') : '']">
                        <label for="no_telp">Jabatan</label>
                        <input id="no_telp" name="no_telp" type="text" placeholder="Enter Nomor Telepon"
                               class="form-input" value="{{ old('no_telp', $employee->no_telp) }}" />
                        @error('no_telp')
                        <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary !mt-6">Update Employee</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                form1: {
                    name: ''
                },
                isSubmitForm1: false,
                form2: {
                    jenis_kelamin: ''
                },
                isSubmitForm2: false,
                form3: {
                    status_pegawai: ''
                },
                isSubmitForm3: false,
                form4: {
                    pangkat_golongan: ''
                },
                isSubmitForm4: false,
                form5: {
                    jabatan: ''
                },
                isSubmitForm5: false,
                form6: { seksi_id: '' },
                isSubmitForm6: false,
                isSubmitForm7: false,
                form6: { no_telp: '' },
                isSubmitForm6: false,

                submitForm1() {
                    this.isSubmitForm1 = true;
                    if (this.form1.name) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm2() {
                    this.isSubmitForm2 = true;
                    if (this.form2.jenis_kelamin) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm3() {
                    this.isSubmitForm3 = true;
                    if (this.form3.status_pegawai) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm4() {
                    this.isSubmitForm4 = true;
                    if (this.form4.pangkat_golongan) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm5() {
                    this.isSubmitForm5 = true;
                    if (this.form5.jabatan) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
                    }
                },
                submitForm6() {
                    this.isSubmitForm6 = true;
                    if (this.form6.seksi_id) {
                        this.showMessage('Seksi berhasil dipilih');
                    }
                },
                submitForm7() {
                    this.isSubmitForm6 = true;
                    if (this.form6.no_telp) {
                        this.showMessage('Nomor Telepon Berhasil ditambah');
                    }
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px'
                    });
                }
            }));
        });
    </script>

</x-layout.default>
