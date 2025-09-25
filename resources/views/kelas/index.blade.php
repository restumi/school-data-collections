<x-data-index-layout
    title="Manage Kelas"
    :createRoute="route('kelas.create')"
    singular="Kelas"
>
    <thead>
        <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name Class</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Add Student</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Add Teacher</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        @forelse ($kelas as $index => $k)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                <td class="px-4 py-4 text-sm text-gray-900">{{ $k->nama_kelas }}</td>
                <td class="px-4 py-4 text-sm text-gray-900 space-x-2">
                    <a href="{{ route('kelas.edit', $k) }}">
                        <x-button color="yellow" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-edit mr-1"></i>Edit
                        </x-button>
                    </a>
                    <form action="{{ route('kelas.destroy', $k) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete class {{ $k->nama_kelas }}?')">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" color="red" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-trash mr-1"></i>Delete
                        </x-button>
                    </form>
                </td>
                <td class="px-4 py-4 text-sm text-gray-900">
                    <a href="{{ route('students.create', ['kelas_id' => $k->id]) }}">
                        <x-button color="blue" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-plus mr-1"></i>Add Student
                        </x-button>
                    </a>
                </td>
                <td class="px-4 py-4 text-sm text-gray-900">
                    <a href="{{ route('teachers.create', ['kelas_id' => $k->id]) }}">
                        <x-button color="blue" class="!px-3 !py-1 !text-xs">
                            <i class="fas fa-plus mr-1"></i>Add Teacher
                        </x-button>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="px-4 py-4 text-center text-gray-500">nothing . . .</td>
            </tr>
        @endforelse
    </tbody>
</x-data-index-layout>
