<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name="admin";
        $adminRole->display_name="Admin";
        $adminRole->save();

        $admin = new User();
        $admin->name="Admin Pindad";
        $admin->npp="123456789";
        $admin->password=bcrypt('rahasia');
        $admin->is_verified=1;
        $admin->save();
        $admin->attachRole($adminRole);

    }
}