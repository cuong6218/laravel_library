<?php


namespace App\Http\Services;


use App\Book;
use App\Http\Repositories\BookRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookService
{
    protected $bookRepo;

    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function getAll()
    {
        return $this->bookRepo->getAll();
    }

    public function getDesc()
    {
        return $this->bookRepo->getDesc();
    }

    public function store($request)
    {
        $book = new Book();
        $data = $request->all();
//        $data = $request->all();
        //upload file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
            // fill data
            $book->fill($data);
            $this->bookRepo->save($book);
            $book->types()->sync($request->type);
        }
    }

    public function show($id)
    {
        return $this->bookRepo->show($id);
    }

    public function update($request, $id)
    {
        $book = $this->bookRepo->show($id);
        $data = $request->all();
        //update image
        if ($request->hasFile('image')) {
            // delete current image
            $currentImg = $book->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            //update new image
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $data['image'] = $path;
        }

        // fill data
        $book->fill($data);
        $this->bookRepo->save($book);
        $book->types()->sync($request->type);
    }

    public function destroy($id)
    {
        $book = $this->bookRepo->show($id);
        $book->types()->detach();
        $this->bookRepo->destroy($id);
    }

    public function bookReturn($id)
    {
        $book = $this->bookRepo->show($id);
        $book->status = 'book return';
        $this->bookRepo->save($book);
    }
}
