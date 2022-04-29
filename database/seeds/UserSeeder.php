<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::select('id')->where('role', 'user')->first();
        $role_admin = Role::select('id')->where('role', 'admin')->first();

        $user = new User();
        $user->username = 'User';
        $user->email = 'user@example.com';
        $user->password = Hash::make('0000');
        $user->role_id = $role_user->id;
        $user->save();

        $user = new User();
        $user->username = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = Hash::make('0000');
        $user->role_id = $role_admin->id;
        $user->save();
    }
}
