@extends('layouts.app')
<title>Notifications</title>

@section('content')
<style>
    body {
        background: url('{{ asset('assets/bg.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
    }

    .card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        margin: 20px auto;
        width: 80%;
        max-width: 500px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .card-header {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: #fff;
        text-align: center;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 15px;
    }

    .card-header h2 {
        margin: 0;
    }

    .card-body {
        flex: 1;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 12px 24px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .card-footer {
        background-color: #f0f0f0;
        padding: 15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .card-footer a {
        display: block;
        text-align: center;
        background-color: #007bff;
        color: #fff;
        padding: 12px 0;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .card-footer a:hover {
        background-color: #0056b3;
    }
</style>

    <h1>Notifications</h1>
    @foreach ($memos as $memo)
        <div>
            <h3>{{ $memo->title }}</h3>
            <p>{{ $memo->content }}</p>
        </div>
    @endforeach
@endsection