@extends('layouts.app')
@section('title', 'Employees')

@section('content')
<div class="flex flex-wrap items-center justify-between gap-3 mb-4">
    <h1 class="text-2xl font-bold">Employees</h1>
    <a href="{{ route('employees.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">+ Add Employee</a>
</div>

{{-- Search --}}
<form method="GET" action="{{ route('employees.index') }}" class="flex gap-2 mb-4">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search name, email, phone or department..."
           class="flex-1 border rounded px-3 py-2">
    <button class="bg-gray-800 text-white px-4 py-2 rounded">Search</button>
    @if(request('search'))
        <a href="{{ route('employees.index') }}" class="px-4 py-2 text-gray-600">Clear</a>
    @endif
</form>

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-left">
        <thead class="bg-gray-50 text-sm text-gray-600">
            <tr>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Age</th>
                <th class="px-4 py-3">Date of Birth</th>
                <th class="px-4 py-3">Department</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($employees as $emp)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-3">
                    <div class="flex items-center gap-3">
                        @if($emp->photo)
                            <img src="{{ asset('storage/' . $emp->photo) }}"
                                 class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600
                                        flex items-center justify-center font-bold">
                                {{ strtoupper(substr($emp->name, 0, 1)) }}
                            </div>
                        @endif
                        <span class="font-medium">{{ $emp->name }}</span>
                    </div>
                </td>
                <td class="px-4 py-3">{{ $emp->phone }}</td>
                <td class="px-4 py-3">{{ $emp->age }}</td>
                <td class="px-4 py-3">{{ $emp->dob->format('d M Y') }}</td>
                <td class="px-4 py-3">
                    <span class="bg-indigo-50 text-indigo-700 text-sm px-2 py-1 rounded">
                        {{ $emp->department->name }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right whitespace-nowrap">
                    <a href="{{ route('employees.show', $emp) }}" class="text-gray-600 mr-3">View</a>
                    <a href="{{ route('employees.edit', $emp) }}" class="text-indigo-600 mr-3">Edit</a>
                    <form method="POST" action="{{ route('employees.destroy', $emp) }}" class="inline"
                          onsubmit="return confirm('Delete this employee?')">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">No employees found</td></tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $employees->links() }}</div>
@endsection