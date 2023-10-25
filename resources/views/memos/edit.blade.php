Ini isi dari edit.blade

@extends('layouts.app')

@section('content')
<style>

    .card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        margin: 0 auto; 
        max-width: 500px; 
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
        padding: 10px;
    }
    
    .card-footer {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    
        .card-footer a {
            display: block;
            text-align: center;
            background-color: #007bff; 
            color: #fff; 
            padding: 10px 0; 
            border-radius: 5px; 
            text-decoration: none; 
            transition: background-color 0.3s; 
        }
    
        .card-footer a:hover {
            background-color: #0056b3; 
        }
    
    .card-body {
        padding: 20px;
    }
    
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-control {
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        padding: 10px;
    }
    
    .btn-primary {
        background-color:  #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
    }
    
    .btn-primary:hover {
        background-color: #0056b3;
    }
    
        </style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Edit Memo</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('memo.update', $memo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label text-right text-dark">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $memo->title }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-sm-3 col-form-label text-right text-dark">Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $memo->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update Memo</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-block">Return to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
