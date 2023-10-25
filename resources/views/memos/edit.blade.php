@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white border border-gray-300 shadow-md rounded px-8 py-6">
                    <h2 class="text-2xl font-bold mb-6 text-indigo-600">Edit Memo</h2>
                    <form action="{{ route('memo.update', $memo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded" value="{{ $memo->title }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                            <textarea name="content" id="content" class="w-full px-3 py-2 border rounded" rows="5" required>{{ $memo->content }}</textarea>
                        </div>

                        <button type="submit" class="bg-indigo-500 text-white py-2 px-4 rounded hover:bg-indigo-600 focus:outline-none focus:shadow-outline-indigo active:bg-indigo-800">
                            Update Memo
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
    