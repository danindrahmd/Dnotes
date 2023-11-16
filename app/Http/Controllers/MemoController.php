<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MemoCreated;
use App\Models\Memo;

class MemoController extends Controller
{
    public function index()
    {
        // Ambil semua memos pengguna dan urutkan berdasarkan pinned dan created_at
        $memos = auth()->user()->memos()->orderByDesc('pinned')->orderByDesc('created_at')->get();

        return view('dashboard', compact('memos'));
    }
    
    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
      
        $memo = Memo::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
        ]);
    
        // Trigger the event
        event(new MemoCreated($memo));
    
        return redirect()->route('dashboard')->with('success', 'Memo added successfully!');
    }

    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();
    
        return redirect()->route('dashboard')->with('success', 'Memo deleted successfully!');
    }

    public function edit(Memo $memo)
    {
        return view('memos.edit', compact('memo'));
    }

    public function update(Request $request, Memo $memo)
    {
        // Validation rules
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'pinned' => 'boolean', // Tambahkan aturan validasi untuk pinned
        ]);

        // Update the memo
        $memo->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'pinned' => $request->input('pinned', false), // Gunakan nilai default false jika tidak diset
        ]);

        return redirect()->route('dashboard')->with('success', 'Memo updated successfully!');
    }
    public function pin($id)
    {
        // Logika untuk pin memo
        $memo = Memo::findOrFail($id);
        $memo->update(['pinned' => true]);

        return redirect()->route('dashboard')->with('success', 'Memo pinned successfully!');
    }
    public function unpin($id)
    {
        // Logika untuk unpin memo
        $memo = Memo::findOrFail($id);
        $memo->update(['pinned' => false]);

        return redirect()->route('dashboard')->with('success', 'Memo unpinned successfully!');
    }
}
