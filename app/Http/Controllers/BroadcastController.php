<?php

// app/Http/Controllers/BroadcastController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function create()
    {
        return view('broadcasts.create');
    }

    public function store(Request $request)
    {
        // Logika untuk menyimpan broadcast ke database
        // ...
        return redirect()->route('dashboard')->with('success', 'Broadcast added successfully!');
    }
}
