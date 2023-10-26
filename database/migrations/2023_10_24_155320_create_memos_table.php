<?php

// database/migrations/xxxx_xx_xx_create_memos_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemosTable extends Migration
{
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->boolean('pinned')->default(false); // Tambahkan kolom pinned
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('memos');
    }
}
