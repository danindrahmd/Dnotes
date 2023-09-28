<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Assignment</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #333;
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            color: #333;
        }
        
        h1 {
            color: #000;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #000;
        }
        
        input[type="text"],
        input[type="number"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: #f0f0f0; /* Light grey background */
            color: #333;
        }
        
        select {
            height: 35px;
        }
        
        button[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #000;
        }
        
        .alert {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #000;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Assignment</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('form.submit') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" value="{{ old('age') }}" required>
            </div>

            <div class="form-group">
                <label for="weight">Weight (kg):</label>
                <input type="number" step="0.01" class="form-control" name="weight" min="2.50" max="99.99" value="{{ old('weight') }}" required>
            </div>

            <div class="form-group">
                <label for="height">Height (meters):</label>
                <input type="number" step="0.01" class="form-control" name="height" min="0.50" max="2.50" value="{{ old('height') }}" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Image (png/jpg/jpeg, max 2MB):</label>
                <input type="file" class="form-control-file" name="image" accept=".png, .jpg, .jpeg" required>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>