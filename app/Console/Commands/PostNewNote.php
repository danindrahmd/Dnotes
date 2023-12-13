<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Memo;

class PostNewNote extends Command
{
    protected $signature = 'post:new-note';
    protected $description = 'Post a new note';

    public function handle()
    {
        // Your logic to create and save a new note
        Memo::create([
            'title' => 'How to Use this appp',
            'content' => 'You can add more notes and logout by using three dots beside the name, Edit and delete button will be provided for every different note. Enjoy Take Note',
        ]);

        $this->info('New note posted successfully!');
    }
}
