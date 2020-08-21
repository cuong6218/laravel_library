<?php


namespace App\Http\Repositories;


use App\User;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAll()
    {
        return $this->user->all();
    }
    public function getDesc()
    {
        return $this->user->select('*')->orderBy('id', 'desc')->paginate(5);
    }
    public function save($user)
    {
        $user->save();
    }
    public function show($id)
    {
        return $this->user->findOrFail($id);
    }
    public function destroy($id)
    {
        $this->user->destroy($id);
    }
    public function getUser($name)
    {
        return User::where('name' , '=', $name)->first();
    }
}
