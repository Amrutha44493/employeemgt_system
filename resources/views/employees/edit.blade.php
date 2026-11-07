@extends('layouts.app')
@section('title', 'Edit Employee')

@section('content')
<div class="max-w-3xl bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold mb-5">Edit Employee</h1>

    <form method="POST" action="{{ route('employees.update', $employee) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('employees._form')

        <div class="mt-6 flex gap-3">
            <button class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700">Update</button>
            <a href="{{ route('employees.index') }}" class="px-5 py-2 text-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection