<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidw
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = "Bundit Nuntates";
        $user->username = "admin";
        $user->age = 32;
        $user->email = "silkyland@gmail.com";
        $user->password = bcrypt('1234');
        $user->save();
    }
}
