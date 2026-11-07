@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-1">Welcome, {{ auth()->user()->name }}</h1>
<p class="text-gray-500 mb-6">Choose what you want to manage</p>

<div class="grid md:grid-cols-2 gap-6">

    <a href="{{ route('employees.index') }}"
       class="bg-white p-6 rounded-xl shadow hover:shadow-md transition block">
        <p class="text-4xl font-bold text-indigo-600">{{ $employeeCount }}</p>
        <h2 class="text-lg font-semibold mt-2">Employee Management</h2>
        <p class="text-sm text-gray-500">Add, edit, view and delete employees</p>
    </a>

    <a href="{{ route('departments.index') }}"
       class="bg-white p-6 rounded-xl shadow hover:shadow-md transition block">
        <p class="text-4xl font-bold text-indigo-600">{{ $departmentCount }}</p>
        <h2 class="text-lg font-semibold mt-2">Department Management</h2>
        <p class="text-sm text-gray-500">Add, edit and delete departments</p>
    </a>

</div>
@endsection