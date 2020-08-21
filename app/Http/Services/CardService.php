<?php


namespace App\Http\Services;


use App\Card;
use App\Http\Repositories\CardRepository;

class CardService
{
    protected $cardRepo;
    public function __construct(CardRepository $cardRepo)
    {
        $this->cardRepo = $cardRepo;
    }
    public function getAll()
    {
        return $this->cardRepo->getAll();
    }
    public function getDesc()
    {
        return $this->cardRepo->getDesc();
    }
    public function store($request)
    {
        $card = new Card();
        $card->student_id = $request->student_id;
        $card->fill($request->all());
        $this->cardRepo->save($card);
    }
    public function borrow($request)
    {
        $card = $this->cardRepo->getLast();
        $card->books()->sync($request->book_id);
    }
    public function show($id)
    {
        return $this->cardRepo->show($id);
    }
    public function update($request, $id)
    {
        $card = $this->cardRepo->show($id);
        $card->student_id = $request->student_id;
        $card->fill($request->all());
        $this->cardRepo->save($card);
    }
    public function destroy($id)
    {
        $this->cardRepo->destroy($id);
    }
    public function getReturn()
    {
        return $this->cardRepo->getReturn();
    }
    public function getBorrow()
    {
        return $this->cardRepo->getBorrow();
    }
    public function bookReturn($id)
    {
        $card = $this->cardRepo->show($id);
        $card->status = 'book return';
        $this->cardRepo->save($card);
    }
}
