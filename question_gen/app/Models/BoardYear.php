<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardYear extends Model
{
    use HasFactory;
    protected $table = 'board_year';
    protected $fillable = ['year'];
}
