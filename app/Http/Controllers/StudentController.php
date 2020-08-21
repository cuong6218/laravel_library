<?php

namespace App\Http\Controllers;

use App\Http\Services\GradeService;
use App\Http\Services\StudentService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateStudentRequest;
class StudentController extends Controller
{
    protected $studentService;
    protected $gradeService;
    public function __construct(StudentService $studentService,
                                GradeService $gradeService)
    {
        $this->studentService = $studentService;
        $this->gradeService = $gradeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentService->getDesc();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = $this->gradeService->getAll();
        return view('admin.students.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateStudentRequest $request)
    {
        $this->studentService->store($request);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->studentService->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->studentService->show($id);
        $grades = $this->gradeService->getAll();
        return view('admin.students.edit', compact('student','grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateStudentRequest $request, $id)
    {
        $this->studentService->update($request, $id);
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->studentService->destroy($id);
        return redirect()->route('students.index');
    }
    public function back()
    {
        return redirect()->route('students.index');
    }
}
