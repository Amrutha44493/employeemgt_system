@extends('layouts.app')
@section('title', 'Edit Department')

@section('content')
<div class="max-w-md bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold mb-4">Edit Department</h1>

    <form method="POST" action="{{ route('departments.update', $department) }}">
        @csrf @method('PUT')

        <input type="text" name="name" value="{{ old('name', $department->name) }}"
               class="w-full border rounded px-3 py-2">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror

        <div class="mt-4 flex gap-3">
            <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('departments.index') }}" class="px-4 py-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection