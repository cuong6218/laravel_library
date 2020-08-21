<?php


namespace App\Http\Services;


use App\Http\Repositories\StudentRepository;
use App\Student;
use Illuminate\Http\Request;

class StudentService
{
    protected $studentRepo;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function getAll()
    {
        return $this->studentRepo->getAll();
    }

    public function getDesc()
    {
        return $this->studentRepo->getDesc();
    }

    public function store($request)
    {
        $student = new Student();
        $student->grade_id = $request->grade_id;
        $student->fill($request->all());
        $this->studentRepo->save($student);
    }

    public function show($id)
    {
        return $this->studentRepo->show($id);
    }

    public function update($request, $id)
    {
        $student = $this->studentRepo->show($id);
        $student->grade_id = $request->grade_id;
        $student->fill($request->all());
        $this->studentRepo->save($student);
    }

    public function destroy($id)
    {
        $this->studentRepo->destroy($id);
    }

    public function detailGrade($id)
    {
        return $this->studentRepo->detailGrade($id);
    }
    public function count($id)
    {
        return $this->studentRepo->count($id);
    }
}
