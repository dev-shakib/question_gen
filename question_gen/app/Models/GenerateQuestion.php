<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateQuestion extends Model
{
    use HasFactory;
    protected $table = 'generate_question';
    protected $fillable = ['class', 'status','marks','ques_limit','subject','ques_type','exam_time','instructions','ques_ids'];
}
