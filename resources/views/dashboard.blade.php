<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--                 <img src="{{ asset('assets/dnotes.png') }}" alt="Memo App Logo" class="w-8 h-8 mr-2"> --}} 
    <title>DNotes Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <style>
        body {
            background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0; /* Remove default body margin */
        }

        .nav-container {
            background-color: rgba(255, 255, 255, 0.8);
            /* You can adjust the opacity and other styles as needed */
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
    </style>
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow-lg">
    <div class="container mx-auto p-4 nav-container">
        <div class="flex items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center">
                <img src="{{ asset('assets/dnotes.png') }}" alt="Memo App Logo" class="w-8 h-8 mr-2">
                <a class="text-xl font-bold text-slate-400" href="#">Dnotes</a>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Welcome, {{ auth()->user()->name }}!</span>

                <!-- Improved Collapsible Navigation Bar -->
                <div class="dropdown">
                    <button type="button" class="btn btn-primary">
                        <img src="{{ asset('assets/more.png') }}" alt="Add Memo" class="w-4 h-4 mr-2"> 
                    </button>
                    <div class="dropdown-content">
                        <a href="{{ route('memo.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Add Notes
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <!-- End Improved Collapsible Navigation Bar -->

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
                <div class="mt-4">
                    <!-- Add the Edit button with a link to the edit route -->
                    <a href="{{ route('memo.edit', ['memo' => $memo]) }}" class="btn btn-primary hover:bg-indigo-700 hover:text-white rounded-full px-4 py-2">Edit</a>
                </div>
                <form action="{{ route('memo.destroy', $memo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger hover:bg-red-700 hover:text-white rounded-full px-4 py-2 mt-2">Delete Memo</button>
                </form>
            </div>
        @endforeach
    </div>
</div>



<script src="{{ mix('js/app.js') }}"></script>
@vite('resources/js/app.js')

<script>
    // JavaScript to handle the dropdown menu
    document.getElementById('menu-button').addEventListener('click', function () {
        document.getElementById('menu').classList.toggle('hidden');
    });

    // Close the dropdown menu if the user clicks outside of it
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
