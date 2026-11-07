<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Employee System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

@auth
<nav class="bg-white shadow">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex items-center gap-6">
            <span class="font-bold text-indigo-600 text-lg">Employee System</span>
            <a href="{{ route('employees.index') }}" class="hover:text-indigo-600">Employees</a>
            <a href="{{ route('departments.index') }}" class="hover:text-indigo-600">Departments</a>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm bg-gray-800 text-white px-3 py-1.5 rounded hover:bg-gray-900">
                Logout ({{ auth()->user()->name }})
            </button>
        </form>
    </div>
</nav>
@endauth

<main class="max-w-6xl mx-auto px-4 py-6">

    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
    @endif

    @yield('content')
</main>

</body>
</html>