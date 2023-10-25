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
            'title' => 'First interaction',
            'content' => 'The first time here? come join us!',
            'user_id' => 1, // Replace 1 with the actual user_id
        ]);
    
        // You can add more data as needed by duplicating the insert block.
    }
    

}
