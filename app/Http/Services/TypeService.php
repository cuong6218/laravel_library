<?php


namespace App\Http\Services;


use App\Http\Repositories\TypeRepository;
use App\Type;
use Illuminate\Http\Request;

class TypeService
{
    protected $typeRepo;
    public function __construct(TypeRepository $typeRepo)
    {
        $this->typeRepo = $typeRepo;
    }
    public function getAll()
    {
        return $this->typeRepo->getAll();
    }
    public function getDesc()
    {
        return $this->typeRepo->getDesc();
    }
    public function store($request)
    {
        $type = new Type();
        $type->name = $request->name;
        $this->typeRepo->save($type);
    }
    public function show($id)
    {
        return $this->typeRepo->show($id);
    }
    public function update($request, $id)
    {
        $type = $this->typeRepo->show($id);
        $type->name = $request->name;
        $this->typeRepo->save($type);
    }
    public function destroy($id)
    {
        $this->typeRepo->destroy($id);
    }
}
