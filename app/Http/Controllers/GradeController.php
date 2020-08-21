<?php

namespace App\Http\Controllers;

use App\Http\Services\GradeService;
use App\Http\Services\StudentService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGradeRequest;
class GradeController extends Controller
{
    protected $gradeService;
    protected $studentService;
    public function __construct(GradeService $gradeService,
                                StudentService $studentService)
    {
        $this->gradeService = $gradeService;
        $this->studentService = $studentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = $this->gradeService->getDesc();
        return view('admin.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGradeRequest $request)
    {
        $this->gradeService->store($request);
        return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = $this->studentService->detailGrade($id);
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = $this->gradeService->show($id);
        return view('admin.grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateGradeRequest $request, $id)
    {
        $this->gradeService->update($request, $id);
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gradeService->destroy($id);
        return redirect()->route('grades.index');
    }
    public function back()
    {
        return redirect()->route('grades.index');
    }
}
