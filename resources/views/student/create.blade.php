<x-data-form-layout
    title="Add student"
    :action="route('students.store')"
    submitText="Save"
    :backRoute="route('students.index')"
>
    <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
        <input type="text" name="nama" id="nama" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               placeholder="Full name">
        @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Birth Day</label>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        @error('tanggal_lahir')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Gander</label>
        <div class="flex space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" name="jenis_kelamin" value="L" required class="form-radio text-blue-600">
                <span class="ml-2">Laki-laki</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="jenis_kelamin" value="P" required class="form-radio text-blue-600">
                <span class="ml-2">Perempuan</span>
            </label>
        </div>
        @error('jenis_kelamin')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">Class</label>
        <select name="kelas_id" id="kelas_id" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Select class</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ (string) old('kelas_id', $selectedClass ?? null) === (string) $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</x-data-form-layout>
