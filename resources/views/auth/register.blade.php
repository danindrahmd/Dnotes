<!-- resources/views/auth/register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('assets/dnotes.png') }}">

    <style>
        body {
            background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            margin: 0; /* Remove default body margin */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .content-container {
            position: relative;
            z-index: 1;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center">

    <div class="logo-container">
        <img src="{{ asset('assets/dnotes.png') }}" alt="DNotes Logo" class="w-12 h-12">
    </div>

    <div class="content-container">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-4">Register</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-3 py-2 border rounded" required>
                </div>

                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Register</button>
            </form>

            <p class="mt-4 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Back to Login</a></p>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    document.querySelector('.flash-message').style.display = 'none';
                }, 5000);
            });
        </script>
    </div>
</body>
</html>
