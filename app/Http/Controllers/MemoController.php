<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MemoCreated;
use App\Models\Memo;

class MemoController extends Controller
{
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
        ]);

        // Update the memo
        $memo->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Memo updated successfully!');
    }
}
