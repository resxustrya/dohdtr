<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->username = "admin";
        $user->password = Hash::make("admin");
        $user->usertype = 1;
        $user->save();
    }
}
