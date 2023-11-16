<?php

namespace App\Listeners;

use App\Events\MemoCreated;

class MemoCreatedListener
{
    public function handle(MemoCreated $event)
    {
        
        $memo = $event->memo;
     
    }
}
