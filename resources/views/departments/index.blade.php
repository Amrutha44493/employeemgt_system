@extends('layouts.app')
@section('title', 'Departments')

@section('content')
<h1 class="text-2xl font-bold mb-4">Departments</h1>

<form method="POST" action="{{ route('departments.store') }}"
      class="bg-white p-4 rounded-xl shadow mb-6 flex gap-3 items-start">
    @csrf
    <div class="flex-1">
        <input type="text" name="name" placeholder="New department name"
               value="{{ old('name') }}" class="w-full border rounded px-3 py-2">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
    <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add</button>
</form>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-sm text-gray-600">
            <tr>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Employees</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($departments as $dept)
            <tr class="border-t">
                <td class="px-4 py-3">{{ $dept->name }}</td>
                <td class="px-4 py-3">{{ $dept->employees_count }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('departments.edit', $dept) }}" class="text-indigo-600 mr-3">Edit</a>
                    <form method="POST" action="{{ route('departments.destroy', $dept) }}" class="inline"
                          onsubmit="return confirm('Delete this department?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3" class="px-4 py-6 text-center text-gray-500">No departments yet</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection