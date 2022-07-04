<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomQuestionOption extends Model
{
    use HasFactory;
    protected $table = 'custom_question_options';
    protected $fillable = ['name','qus_id'];
    protected $hidden = [
        'qus_id',
        'created_at',
        'updated_at',
    ];
    public function questions(){
        return $this->hasMany(App\Models\CustomQuestion::class, 'qus_id','id');
    }
}
