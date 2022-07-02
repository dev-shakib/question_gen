<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
class QuestionAnswer extends Model
{
    use HasApiTokens,HasFactory;
    protected $fillable =['name','qus_id'];
    protected $hidden = [
        'qus_id',
        'created_at',
        'updated_at',
    ];  
    public function questions(){
        return $this->hasMany(App\Models\Question::class, 'qus_id','id');
    }
}
