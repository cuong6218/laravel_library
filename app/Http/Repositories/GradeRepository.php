<?php


namespace App\Http\Repositories;


use App\Grade;

class GradeRepository
{
    protected $grade;
    public function __construct(Grade $grade)
    {
        $this->grade = $grade;
    }
    public function getAll()
    {
        return $this->grade->all();
    }
    public function getDesc()
    {
        return $this->grade->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($grade)
    {
        $grade->save();
    }
    public function show($id)
    {
        return $this->grade->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->grade->destroy($id);
    }
}
