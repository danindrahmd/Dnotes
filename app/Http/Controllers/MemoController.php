<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        // Validasi data memo
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Simpan memo ke database
        Memo::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Memo added successfully!');
    }

    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();

        return redirect()->route('dashboard')->with('success', 'Memo deleted successfully!');
    }
}
