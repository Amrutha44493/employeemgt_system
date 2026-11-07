@extends('layouts.app')
@section('title', 'Admin Login')

@section('content')
<div class="max-w-sm mx-auto mt-16 bg-white p-8 rounded-xl shadow">
    <h1 class="text-2xl font-bold text-center mb-6"> Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
        class="w-full border rounded px-3 py-2 mb-1 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        @error('email') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

        <label class="block text-sm font-medium mb-1 mt-3">Password</label>
        <input type="password" name="password"
               class="w-full border rounded px-3 py-2 mb-1 focus:outline-none focus:ring-2 focus:ring-indigo-400">
        @error('password') <p class="text-red-500 text-sm mb-2">{{ $message }}</p> @enderror

        <button class="w-full mt-5 bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
            Login
        </button>
    </form>
</div>
@endsection