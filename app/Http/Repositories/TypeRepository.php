<?php


namespace App\Http\Repositories;


use App\Type;

class TypeRepository
{
    protected $type;
    public function __construct(Type $type)
    {
        $this->type = $type;
    }
    public function getAll()
    {
        return $this->type->all();
    }
    public function getDesc()
    {
        return $this->type->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($type)
    {
        $type->save();
    }
    public function show($id)
    {
        return $this->type->findOrFail($id);
    }
    public function destroy($id)
    {
        $type = Type::find($id);
        $type->delete();
//        Type::find($id)->delete();
//        $this->type->destroy($id);
    }
}
