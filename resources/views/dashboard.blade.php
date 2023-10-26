<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .nav-container {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
            min-width: 160px;
            border-radius: 4px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .memo-content {
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-lg">
    <div class="container mx-auto p-4 nav-container">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('assets/dnotes.png') }}" alt="Memo App Logo" class="w-8 h-8 mr-2">
                <a class="text-xl font-bold text-slate-400" href="#">Dnotes</a>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ auth()->user()->name }}!</span>

                <div class="dropdown">
                    <button type="button" class="btn btn-primary">
                        <img src="{{ asset('assets/more.png') }}" alt="Add Memo" class="w-4 h-4 mr-2"> 
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('memo.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Add Notes
                        </a>
                        <a href="{{ route('todo.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Add To-Do List
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($memos as $memo)
            <div class="bg-white p-6 rounded-lg shadow-md {{ $memo->pinned ? 'border-2 border-yellow-500' : '' }}">
                <h3 class="text-xl font-semibold mb-4">{{ $memo->title }}</h3>
                <p class="text-gray-600 memo-content">{{ $memo->content }}</p>
                <p class="text-gray-500 mt-2">Created at: {{ $memo->created_at->format('Y-m-d H:i:s') }}</p>
                <!-- Tambahkan tulisan "Memo" di sini -->
                <p class="text-blue-500 mt-2">Memo</p>
                <div class="mt-4">
                    <a href="{{ route('memo.edit', ['memo' => $memo]) }}" class="btn btn-primary hover:bg-indigo-700 hover:text-white rounded-full px-4 py-2">Edit</a>
                </div>
                <form action="{{ route('memo.destroy', $memo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger hover:bg-red-700 hover:text-white rounded-full px-4 py-2 mt-2">Delete Memo</button>
                </form>
                @if ($memo->pinned)
                    <form action="{{ route('memo.unpin', $memo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning hover:bg-yellow-500 hover:text-white rounded-full px-4 py-2 mt-2">Unpin Memo</button>
                    </form>
                @else
                    <form action="{{ route('memo.pin', $memo->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary hover:bg-yellow-500 hover:text-white rounded-full px-4 py-2 mt-2">Pin Memo</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@vite('resources/js/app.js')

<script>
    document.getElementById('menu-button').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
        if (!event.target.matches('#menu-button')) {
            var dropdown = document.getElementById('menu');
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        }
    });
</script>

</body>
</html>
