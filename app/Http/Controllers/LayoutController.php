<?php

namespace App\Http\Controllers;

use App\Http\Services\BookService;
use App\Http\Services\CardService;
use App\Http\Services\GradeService;
use App\Http\Services\StudentService;
use App\Http\Services\TypeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LayoutController extends Controller
{
    protected $gradeService;
    protected $studentService;
    protected $cardService;
    protected $bookService;
    public function __construct(GradeService $gradeService,
                                StudentService $studentService,
                                CardService $cardService,
                                BookService $bookService)
    {
        $this->gradeService = $gradeService;
        $this->studentService = $studentService;
        $this->cardService = $cardService;
        $this->bookService = $bookService;
    }
    public function index()
    {
        $grades = $this->gradeService->getAll()->count();
        $students = $this->studentService->getAll()->count();
        $cards = $this->cardService->getAll()->count();
        $books = $this->bookService->getAll()->count();
        return view('admin.dashboard.index', compact('grades', 'students', 'cards', 'books'));
    }
    public function changeLanguage($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
