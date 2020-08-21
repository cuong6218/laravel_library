<?php


namespace App\Http\Repositories;


use App\Book;

class BookRepository
{
    protected $book;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
    public function getAll()
    {
        return $this->book->all();
    }
    public function getDesc()
    {
        return $this->book->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($book)
    {
        $book->save();
    }
    public function show($id)
    {
        return $this->book->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->book->destroy($id);
    }
}
