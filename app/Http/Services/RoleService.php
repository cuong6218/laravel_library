<?php


namespace App\Http\Services;


use App\Http\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepo;
    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    public function getAll()
    {
        return $this->roleRepo->getAll();
    }
}
