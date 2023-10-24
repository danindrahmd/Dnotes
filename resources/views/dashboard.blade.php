<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-lg">
    <div class="container mx-auto p-4">
        <div class="flex items-center justify-between">
            <a class="text-xl font-bold text-indigo-600" href="#">Memo App</a>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ auth()->user()->name }}!</span>
                <a href="{{ route('memo.create') }}" class="btn btn-primary">Add Memo</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach(auth()->user()->memos as $memo)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">{{ $memo->title }}</h3>
                <p class="text-gray-600">{{ $memo->content }}</p>
                <form action="{{ route('memo.destroy', $memo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-4">Delete Memo</button>
                </form>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@vite('resources/js/app.js')

</body>
</html>
