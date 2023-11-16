<?php

namespace App\Events;

use App\Models\Memo;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MemoCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $memo;

    public function __construct(Memo $memo)
    {
        $this->memo = $memo;
    }
}

