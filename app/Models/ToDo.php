<?php

// app/Models/ToDo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
