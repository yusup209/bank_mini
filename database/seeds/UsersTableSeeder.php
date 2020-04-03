<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nama = "Super Admin";
        $user->email = "superadmin@gmail.com";
        $user->password = bcrypt("superadmin");
        $user->status = "superadmin";
        $user->save();
    }
}
