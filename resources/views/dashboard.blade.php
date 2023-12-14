<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('assets/dnotes.png') }}">
    <style>
        body {
            background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        .nav-container {
            background-color: rgba(255, 255, 255, 0.8);
            width: 100%;
            max-width: 100%; /* Ensure it doesn't exceed the viewport width */
            margin: 0 auto; /* Center the container horizontally */
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

        body.dark-mode {
            background: url('{{ asset('assets/bg2.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            color: #fff; /* Adjust the text color for dark mode */
        }

        .dark-mode .nav-container {
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            max-width: 100%;
            margin: 0; /* Remove any margin in dark mode */
        }

        .dark-mode .memo-content,
        .dark-mode .text-gray-600,
        .dark-mode .text-xl {
            color: #fff; /* Adjust the text color for specific elements in dark mode */
        }

        .dark-mode .dark-text-black {
            color: #000; /* Adjust the text color for the specified element in dark mode */
        }
        .dark-mode .relative {
            background-color: grey; /* Change to the desired dark mode background color */
            /* Add any additional styles for dark mode */
        }
        .dark-mode .edit-button,
        .dark-mode .created-at {
            color: #fff; /* Change the text color for the specified elements in dark mode */
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
                    <button id="dark-mode-toggle" class="btn btn-primary">
                        <img id="dark-mode-image" src="{{ asset('assets/nm.png') }}" alt="Toggle Dark Mode" class="w-4 h-4 mr-2">
                    </button>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary">
                            <img src="{{ asset('assets/more.png') }}" alt="Add Memo" class="w-4 h-4 mr-2">
                        </button>
                        <div class="dropdown-content">
                            <a href="{{ route('memo.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Add Notes
                            </a>
                            <!-- <a href="{{ route('todo.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                Add To-Do List
                            </a> -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- <a href="{{ route('notifications') }}" class="text-gray-600 hover:text-gray-800">
                        <img src="{{ asset('assets/notification.png') }}" alt="Notifications" class="w-6 h-6">
                    </a> -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($memos as $memo)
            <div class="relative bg-white p-6 rounded-lg shadow-md {{ $memo->pinned ? 'border-2 border-yellow-500' : '' }} dark-text-black">
                @if ($memo->pinned)
                <form action="{{ route('memo.unpin', $memo->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-warning hover:bg-yellow-500 hover:text-white rounded-full px-4 py-2 absolute top-0 right-0 mt-2 mr-2">
                        <img src="{{ asset('assets/pin.png') }}" alt="Pin Icon" class="w-4 h-4 mr-2">
                    </button>
                </form>
                @else
                <form action="{{ route('memo.pin', $memo->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary hover:bg-yellow-500 hover:text-white rounded-full px-4 py-2 absolute top-0 right-0 mt-2 mr-2">
                        <img src="{{ asset('assets/pin.png') }}" alt="Pin Icon" class="w-4 h-4 mr-2">
                    </button>
                </form>
                @endif


                <h3 class="text-xl font-semibold mb-4">{{ $memo->title }}</h3>

                <p class="text-gray-600 memo-content">{{ $memo->content }}</p>

                <p class="created-at text-gray-500 mt-2">Created at: {{ optional($memo->created_at)->format('Y-m-d H:i:s') }}</p>
                <!-- Tambahkan tulisan "Memo" di sini -->
                <p class="text-blue-500 mt-2">Notes</p>

                <!-- "Edit" and "Delete" buttons below the notes -->
                <div class="mt-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <a href="{{ route('memo.edit', ['memo' => $memo]) }}" class="edit-button btn btn-primary hover:bg-indigo-700 hover:text-white rounded-full px-4 py-2">Edit</a>
                        </div>
                        <form action="{{ route('memo.destroy', $memo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger hover:bg-red-700 hover:text-white rounded-full px-4 py-2">
                                <img id="delete-image" src="{{ asset('assets/delete.png') }}" alt="Delete Icon" class="w-4 h-4 mr-2">
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    @vite('resources/js/app.js')

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            document.getElementById('menu').classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!event.target.matches('#menu-button')) {
                var dropdown = document.getElementById('menu');
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.add('hidden');
                }
            }
        });
    </script>

    <script>
        document.getElementById('dark-mode-toggle').addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');

                    // Update toggle button image based on dark mode status
            const darkModeImage = document.getElementById('dark-mode-image');
            darkModeImage.src = document.body.classList.contains('dark-mode') ? '{{ asset('assets/nm2.png') }}' : '{{ asset('assets/nm.png') }}';

            // Update pinned button image based on dark mode status
            const pinnedImage = document.getElementById('pinned-image');
            pinnedImage.src = document.body.classList.contains('dark-mode') ? '{{ asset('assets/pin2.png') }}' : '{{ asset('assets/pin.png') }}';

            // Update delete button image based on dark mode status
            const deleteImage = document.getElementById('delete-image');
            deleteImage.src = document.body.classList.contains('dark-mode') ? '{{ asset('assets/delete2.png') }}' : '{{ asset('assets/delete.png') }}';


            // Update background image and note colors based on dark mode status
            if (document.body.classList.contains('dark-mode')) {
                document.body.style.backgroundImage = "url('{{ asset('assets/bg2.jpg') }}')";
                // Additional styles for dark mode notes
                document.querySelectorAll('.memo-content').forEach(function (note) {
                    note.style.color = '#fff'; // Change note text color in dark mode
                });
            } else {
                document.body.style.backgroundImage = "url('{{ asset('assets/bg.jpg') }}')";
                // Additional styles for light mode notes
                document.querySelectorAll('.memo-content').forEach(function (note) {
                    note.style.color = '#000'; // Change note text color in light mode
                });
            }

            // Store user preference (optional)
            const isDarkMode = document.body.classList.contains('dark-mode');
            localStorage.setItem('dark-mode-preference', isDarkMode ? 'dark' : 'light');
        });

        // Apply dark mode based on user preference on page load
        const userPreference = localStorage.getItem('dark-mode-preference');
        if (userPreference === 'dark') {
            document.body.classList.add('dark-mode');
            document.body.style.backgroundImage = "url('{{ asset('assets/bg2.jpg') }}')";
            document.querySelectorAll('.memo-content').forEach(function (note) {
                note.style.color = '#fff';
            });
        }
    </script>

</body>
</html>

