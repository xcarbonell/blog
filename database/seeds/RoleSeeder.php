<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->role = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->role = 'user';
        $role->description = 'User';
        $role->save();
    }
}
