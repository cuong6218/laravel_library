<?php


namespace App\Http\Repositories;


use App\Card;
use Illuminate\Support\Facades\DB;

class CardRepository
{
    protected $card;
    public function __construct(Card $card)
    {
        $this->card = $card;
    }
    public function getAll()
    {
        return $this->card->all();
    }
    public function getDesc()
    {
        return $this->card->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($card)
    {
        $card->save();
    }
    public function show($id)
    {
        return $this->card->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->card->destroy($id);
    }
    public function getReturn()
    {
        return Card::where('status', 'book return')->orderBy('id', 'desc')->paginate(5);
    }
    public function getBorrow()
    {
        return Card::where('status', 'book borrow')->orderBy('id', 'desc')->paginate(5);
    }
    public function getLast()
    {
        return DB::table('cards')->orderBy('id', 'desc')->first();
    }
}
