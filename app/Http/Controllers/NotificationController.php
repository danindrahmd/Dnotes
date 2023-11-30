<?php

// app/Http/Controllers/NotificationController.php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Memo; // Tambahkan baris ini untuk mengimpor kelas Memo
use App\Events\MemoCreated;

// app/Http/Controllers/NotificationController.php

use App\Models\User;

class NotificationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = $user->notifications;
        $memos = Memo::whereIn('id', $notifications->pluck('memo_id'))->get();

        return view('notifications.index', compact('notifications', 'memos'));
    }

    public function broadcast(Request $request)
    {
        $users = User::where('id', '!=', auth()->id())->get();

        $memo = Memo::create([
            'user_id' => auth()->id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        // Broadcast the event
        event(new MemoCreated($memo));

        return redirect()->route('dashboard')->with('success', 'Memo broadcasted successfully!');
    }
}
