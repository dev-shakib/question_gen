<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomQuestion extends Model
{
    use HasFactory;
    protected $table = 'custom_questions';
    protected $fillable = ['question','subject','status','isactive','class','institute','board','ques_year','marks','ques_limit','time','instructions'];
    public function answer(){
        return $this->hasMany('App\Models\CustomQuestionAnswer', 'qus_id', 'id');
    }
    public function options(){
        return $this->hasMany('App\Models\CustomQuestionOption', 'qus_id', 'id');
    }
    public function class(){
        return $this->hasMany('App\Models\Classes', 'id', 'class');
    }
    public function institute(){
        return $this->hasMany('App\Models\Institute', 'id', 'institute');
    }
    public function board(){
        return $this->hasMany('App\Models\Board', 'id', 'board');
    }
    public function ques_year(){
        return $this->hasMany('App\Models\QuestionYear', 'id', 'ques_year');
    }
    public function subject(){
        return $this->belongsTo('App\Models\Subject', 'subject', 'id');
    }
}
