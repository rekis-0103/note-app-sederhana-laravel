<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // izinkan kolom ini untuk mass assignment (biar Note::create() bisa jalan)
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];
}
