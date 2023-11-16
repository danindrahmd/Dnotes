<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNotes</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/dnotes.png') }}">
    @vite('resources/css/app.css')
</head>
<body>

    <!-- Your navigation bar or header goes here -->

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Other scripts you may include -->

</body>
</html>