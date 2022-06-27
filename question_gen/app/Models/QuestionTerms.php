<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTerms extends Model
{
    use HasFactory;
    protected $table = 'question_terms';
    protected $fillable = ['name'];
}
