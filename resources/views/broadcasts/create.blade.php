<!-- resources/views/memos/create.blade.php -->

@extends('layouts.app')
<title>DNotes Create Memo</title>

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

    @media (max-width: 500px) {
        .card {
            max-width: 100%;
        }
        .card-body textarea {
            width: 95%;
        }
        .card-body input {
            width: 95%;
        }
    }

    .card-header {
        background-color: #007bff;
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

<div class="card">
    <div class="card-header">
        <h2>Create Memo</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('memo.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Enter memo title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Write your memo content"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Save Memo</button>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block">Return to Dashboard</a>
    </div>
</div>

@endsection
