@extends('layouts.app')
@section('title', 'Employee Details')

@section('content')
<div class="max-w-2xl bg-white p-6 rounded-xl shadow">
    <div class="flex items-center gap-4 mb-6">
        @if($employee->photo)
            <img src="{{ asset('storage/' . $employee->photo) }}"
                 class="w-24 h-24 rounded-full object-cover">
        @else
            <div class="w-24 h-24 rounded-full bg-indigo-100 text-indigo-600
                        flex items-center justify-center text-3xl font-bold">
                {{ strtoupper(substr($employee->name, 0, 1)) }}
            </div>
        @endif
        <div>
            <h1 class="text-2xl font-bold">{{ $employee->name }}</h1>
            <p class="text-gray-500">{{ $employee->department->name }}</p>
        </div>
    </div>

    <dl class="grid grid-cols-2 gap-4">
        <div><dt class="text-sm text-gray-500">Email</dt><dd>{{ $employee->email }}</dd></div>
        <div><dt class="text-sm text-gray-500">Phone</dt><dd>{{ $employee->phone }}</dd></div>
        <div><dt class="text-sm text-gray-500">Date of Birth</dt><dd>{{ $employee->dob->format('d M Y') }}</dd></div>
        <div><dt class="text-sm text-gray-500">Age</dt><dd>{{ $employee->age }} years</dd></div>
        <div><dt class="text-sm text-gray-500">Gender</dt><dd>{{ $employee->gender }}</dd></div>
        <div class="col-span-2"><dt class="text-sm text-gray-500">Address</dt><dd>{{ $employee->address }}</dd></div>
    </dl>

    <div class="mt-6 flex gap-3">
        <a href="{{ route('employees.edit', $employee) }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded">Edit</a>
        <a href="{{ route('employees.index') }}" class="px-4 py-2 text-gray-600">Back</a>
    </div>
</div>
@endsection