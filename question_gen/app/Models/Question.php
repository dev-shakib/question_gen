<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class Question extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = ['ques_type','question','subject','status','class','institute','board','ques_year'];
    public function answer(){
        return $this->hasMany('App\Models\QuestionAnswer', 'qus_id', 'id');
    }
    public function options(){
        return $this->hasMany('App\Models\QuestionOption', 'qus_id', 'id');
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
