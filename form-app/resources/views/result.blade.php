<!-- resources/views/result.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission Result</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Your CSS styles here */
        .container {
            margin-top: 20px;
        }
        .submission {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
        }
        .submission img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Submission Results</h1>

        @forelse($submissions as $submission)
            <div class="submission">
                <p><strong>Name:</strong> {{ $submission->name }}</p>
                <p><strong>Gender:</strong> {{ $submission->gender }}</p>
                <p><strong>Age:</strong> {{ $submission->age }}</p>
                <p><strong>Weight (kg):</strong> {{ $submission->weight }}</p>
                <p><strong>Height (meters):</strong> {{ $submission->height }}</p>

                @if (!empty($submission->image))
                    <img src="{{ asset('uploads/' . $submission->image) }}" alt="Uploaded Image">
                @endif
            </div>
        @empty
            <p>No submissions yet.</p>
        @endforelse
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
