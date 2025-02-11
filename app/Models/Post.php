<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ /*properti yang memperbolehkan kolom mana yg bisa di isi*/
        'title', 'body'
    ];
}

