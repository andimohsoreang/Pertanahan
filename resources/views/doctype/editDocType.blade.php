<x-layout.default>

    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="javascript:;" class="text-primary hover:underline">Forms</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Edit Document Type</span>
        </li>
    </ul>

    <div class="pt-5 grid grid-cols-1 xl:grid-cols-1 gap-6" x-data="form">
        <div class="panel">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Edit Document Type</h5>
            </div>
            <div class="mb-5">
                <form class="space-y-5" method="POST" action="{{ route('type.update', $documentType->id) }}">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->



                    <!-- Full Name -->
                    <div :class="[isSubmitForm1 ? (form1.jenis_dokumen ? 'has-success' : 'has-error') : '']">
                        <label for="jenis_dokumen">Tipe Dokumen</label>
                        <input id="jenis_dokumen" name="jenis_dokumen" type="text" placeholder="Enter Document Type"
                            class="form-input" value="{{ old('jenis_dokumen', $documentType->jenis_dokumen) }}" />
                        @error('jenis_dokumen')
                            <p class="text-danger mt-1">{{ $message }}</p>
                        @enderror
                        <template x-if="isSubmitForm1 && form1.jenis_dokumen">
                            <p class="text-[#1abc9c] mt-1">Looks Good!</p>
                        </template>
                    </div>

                    <button type="submit" class="btn btn-primary !mt-6">Update Document Type</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                form1: {
                    jenis_dokumen: ''
                },
                isSubmitForm1: false,

                submitForm1() {
                    this.isSubmitForm1 = true;
                    if (this.form1.jenis_dokumen) {
                        // Form validated success
                        this.showMessage('Form submitted successfully.');
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
