<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionYear extends Model
{
    use HasFactory;
    protected $table = 'question_year';
    protected $fillable = ['year'];
    protected $hidden = [
        'created_at',
        'updated_at',

    ];
}
