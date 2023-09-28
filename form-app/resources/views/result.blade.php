<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Submission Result</h1>

        <p>Name: {{ $data['name'] }}</p>
        <p>Gender: {{ $data['gender'] }}</p>
        <p>Age: {{ $data['age'] }}</p>
        <p>Weight (kg): {{ $data['weight'] }}</p>
        <p>Height (meters): {{ $data['height'] }}</p>

        @if (!empty($data['image']))
            <img src="{{ asset('uploads/' . $data['image']) }}" alt="Uploaded Image">
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
