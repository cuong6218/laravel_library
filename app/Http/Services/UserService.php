<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function getAll()
    {
        return $this->userRepo->getAll();
    }
    public function getDesc()
    {
        return $this->userRepo->getDesc();
    }
    public function store($request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $this->userRepo->save($user);
        $user->roles()->sync($request->role);
    }
    public function show($id)
    {
        return $this->userRepo->show($id);
    }
    public function update( $request, $id)
    {
        $user = $this->userRepo->show($id);
        $user->fill($request->all());
        $this->userRepo->save($user);
        $user->roles()->sync($request->role);
    }
    public function destroy($id)
    {
        $user = $this->userRepo->show($id);
        $user->roles()->detach();
        $this->userRepo->destroy($id);
    }
    public function getUser($name)
    {
        return $this->getUser($name);
    }
}
