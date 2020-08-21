<?php


namespace App\Http\Repositories;


use App\Role;

class RoleRepository
{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function getAll()
    {
        return $this->role->all();
    }
}
