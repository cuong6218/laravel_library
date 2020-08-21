<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
