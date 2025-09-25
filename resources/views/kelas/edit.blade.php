<x-data-form-layout
    title="Edit Kelas"
    :action="route('kelas.update', $kelas)"
    submitText="Update Kelas"
    :backRoute="route('kelas.index')"
    method="PUT"
>
    <div>
        <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">Class Name</label>
        <input type="text" name="nama_kelas" id="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               placeholder="Contoh: XII RPL 1">
        @error('nama_kelas')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</x-data-form-layout>
