<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'name',  'birth' , 'phone', 'email', 'address', 'grade_id'
    ];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function card()
    {
        return $this->hasOne(Card::class, 'student_id');
    }
}
