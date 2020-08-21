<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'name', 'author', 'price', 'amount', 'image', 'description'
    ];
    public function types()
    {
        return $this->belongsToMany(Type::class, 'book_type', 'book_id', 'type_id');
    }
    public function cards()
    {
        return $this->belongsToMany(Card::class, 'card_book', 'book_id', 'card_id');
    }
}
