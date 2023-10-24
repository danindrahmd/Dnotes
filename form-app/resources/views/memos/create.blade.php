<!-- resources/views/memos/create.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="row">

            <div class="col-md-6 offset-md-3">

                <h2>Create Memo</h2>

                <form action="{{ route('memo.store') }}" method="POST">

                    @csrf

                    <div class="form-group">

                        <label for="title">Title</label>

                        <input type="text" class="form-control" id="title" name="title" required>

                    </div>

                    <div class="form-group">

                        <label for="content">Content</label>

                        <textarea class="form-control" id="content" name="content" rows="5" required></textarea>

                    </div>

                    <button type="submit" class="btn btn-primary">Save Memo</button>

                </form>

            </div>

        </div>

    </div>

@endsection
