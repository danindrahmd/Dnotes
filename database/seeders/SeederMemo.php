<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeederMemo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('memos')->insert([
            'title' => 'How to Use this app',
            'content' => 'You can add more notes and logout by using three dots beside the name, Edit and delete button will be provide for every different notes. Enjoy Take Note',
            'user_id' => 1, // Replace 1 with the actual user_id
        ]);
    
        // You can add more data as needed by duplicating the insert block.
    }
    

}
