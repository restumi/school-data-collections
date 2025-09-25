<x-data-index-layout
    title="Manage Students"
    :createRoute="route('students.create')"
    singular="Student"
>
    <thead>
        <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birth Day</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gander</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse ($students as $index => $s)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                <td class="px-4 py-4 text-sm text-gray-900">{{ $s->nama }}</td>
                <td class="px-4 py-4 text-sm text-gray-900">{{ $s->tanggal_lahir }}</td>
                <td class="px-4 py-4 text-sm text-gray-900">{{ $s->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                <td class="px-4 py-4 text-sm text-gray-900">{{ $s->kelas->nama_kelas ?? 'N/A' }}</td>
                <td class="px-4 py-4 text-sm text-gray-900 space-x-2">
                    <a href="{{ route('students.edit', $s) }}">
                        <x-button color="yellow" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </x-button>
                    </a>
                    <form action="{{ route('students.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete {{ $s->nama }}?')">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" color="red" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </x-button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-4 py-4 text-center text-gray-500">nothing . . .</td>
            </tr>
        @endforelse
    </tbody>
</x-data-index-layout>
