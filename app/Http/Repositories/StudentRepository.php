<?php


namespace App\Http\Repositories;


use App\Student;
use Illuminate\Http\Request;

class StudentRepository
{
    protected $student;
    protected $gradeRepo;
    public function __construct(Student $student,
                                GradeRepository $gradeRepo)
    {
        $this->student = $student;
        $this->gradeRepo = $gradeRepo;
    }
    public function getAll()
    {
        return $this->student->all();
    }
    public function getDesc()
    {
        return $this->student->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($student)
    {
        $student->save();
    }
    public function show($id)
    {
        return $this->student->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->student->destroy($id);
    }
    public function detailGrade($id)
    {
        return Student::where('grade_id', $id)->paginate(5);
    }
    public function count($id)
    {
        return Student::where('grade_id', $id)->get();
    }
}
