<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';
    protected $fillable = [
        'borrow_date', 'return_date','status', 'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function books()
    {
        return $this->belongsToMany(Book::class, 'card_book', 'card_id', 'book_id');
    }
}
