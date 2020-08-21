<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->name = 'admin';
        $role->save();
        $role = new \App\Role();
        $role->name = 'staff';
        $role->save();
        $role = new \App\Role();
        $role->name = 'manager';
        $role->save();
    }
}
