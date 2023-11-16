<?php

// app/Http/Controllers/ToDoController.php

// app/Http/Controllers/ToDoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $todo = ToDo::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'To-Do List added successfully!');
    }

    public function index()
    {
        $todos = ToDo::where('user_id', auth()->id())->get();
        return view('dashboard', ['todos' => $todos]);
    }
}

