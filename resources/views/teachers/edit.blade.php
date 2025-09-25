<x-data-form-layout
    title="Edit Teacher"
    :action="route('teachers.update', $teacher)"
    submitText="Update teacher"
    :backRoute="route('teachers.index')"
    method="PUT"
>
    <div>
        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $teacher->nama) }}" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               placeholder="Full name">
        @error('nama')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="mapel" class="block text-sm font-medium text-gray-700 mb-2">Mapel</label>
        <input type="text" name="mapel" id="mapel" value="{{ old('mapel', $teacher->mapel) }}" required
               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
               placeholder="Example: Matematika, Bahasa Indonesia">
        @error('mapel')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Gander</label>
        <div class="flex space-x-4">
            <label class="inline-flex items-center">
                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $teacher->jenis_kelamin) === 'L' ? 'checked' : '' }} required class="form-radio text-blue-600">
                <span class="ml-2">Laki-laki</span>
            </label>
            <label class="inline-flex items-center">
                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $teacher->jenis_kelamin) === 'P' ? 'checked' : '' }} required class="form-radio text-blue-600">
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
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas_id', $teacher->kelas_id) == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</x-data-form-layout>
