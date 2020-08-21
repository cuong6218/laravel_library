<?php


namespace App\Http\Services;

use App\Grade;
use App\Http\Repositories\GradeRepository;
use Illuminate\Http\Request;

class GradeService
{
    protected $gradeRepo;
    public function __construct(GradeRepository $gradeRepo)
    {
        $this->gradeRepo = $gradeRepo;
    }
    public function getAll()
    {
        return $this->gradeRepo->getAll();
    }
    public function getDesc()
    {
        return $this->gradeRepo->getDesc();
    }
    public function store($request)
    {
        $grade = new Grade();
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $this->gradeRepo->save($grade);
    }
    public function show($id)
    {
        return $this->gradeRepo->show($id);
    }
    public function update($request, $id)
    {
        $grade = $this->gradeRepo->show($id);
        $grade->name = $request->name;
        $grade->teacher = $request->teacher;
        $this->gradeRepo->save($grade);
    }
    public function destroy($id)
    {
        $this->gradeRepo->destroy($id);
    }
}
