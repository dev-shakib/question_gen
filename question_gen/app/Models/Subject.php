<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = ['name'];
    protected $hidden = [
        'code',
        'created_at',
        'updated_at',
    ];
}
