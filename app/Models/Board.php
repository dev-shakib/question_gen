<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $table = 'board';
    protected $fillable = ['name'];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
