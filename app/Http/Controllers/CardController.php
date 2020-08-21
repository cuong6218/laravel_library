<?php

namespace App\Http\Controllers;
use App\Http\Services\BookService;
use App\Http\Services\CardService;
use App\Http\Services\StudentService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCardRequest;
class CardController extends Controller
{
    protected $cardService;
    protected $studentService;
    protected $bookService;
    public function __construct(CardService $cardService,
                                StudentService $studentService,
                                BookService $bookService)
    {
        $this->cardService = $cardService;
        $this->studentService = $studentService;
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = $this->cardService->getBorrow();
        return view('admin.cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = $this->bookService->getAll();
        $students = $this->studentService->getAll();
        return view('admin.cards.create', compact('students', 'books'));

//        $data = [
//            'books' => $books,
//            'students' => $students,
//        ];
//        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCardRequest $request)
    {
        $this->cardService->store($request);
        $books = $this->bookService->getAll();
        return view('admin.cards.borrow', compact('books'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = $this->cardService->show($id);
        return view('admin.cards.detail', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = $this->cardService->show($id);
        $students = $this->studentService->getAll();
        return view('admin.cards.edit', compact('card', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCardRequest $request, $id)
    {
        $this->cardService->update($request, $id);
        return redirect()->route('cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cardService->destroy($id);
        return redirect()->route('cards.index');
    }
    public function back()
    {
        return redirect()->route('cards.index');
    }
    public function bookReturn($id)
    {
        $this->cardService->bookReturn($id);
        return redirect()->route('cards.index');
    }
    public function getReturn()
    {
        $cards = $this->cardService->getReturn();
        return view('admin.cards.return', compact('cards'));
    }
    public function borrow(Request $request)
    {
        $this->cardService->borrow($request);
        return redirect()->route('cards.index');
    }
}
