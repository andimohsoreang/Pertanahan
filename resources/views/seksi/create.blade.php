<x-layout.default>
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <a href="{{ route('seksi.get') }}" class="text-primary hover:underline">Seksi</a>
        </li>
        <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
            <span>Create Seksi</span>
        </li>
    </ul>

    <div class="pt-5 grid grid-cols-1 xl:grid-cols-1 gap-6">
        <!-- Create Seksi Form -->
        <div class="panel">
            <h5 class="font-semibold text-lg mb-3 dark:text-white-light">Create Seksi</h5>
            <form action="{{ route('seksi.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_seksi" class="block text-sm font-medium text-gray-700">Nama Seksi</label>
                    <input type="text" name="nama_seksi" id="nama_seksi"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm
                           focus:ring focus:ring-opacity-50"
                           required>
                    @error('nama_seksi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm
                              focus:ring focus:ring-opacity-50"></textarea>
                    @error('deskripsi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn bg-primary text-white px-4 py-2 rounded">
                        Create Seksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout.default>
