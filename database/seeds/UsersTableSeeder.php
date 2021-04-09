<?php

use Illuminate\Database\Seeder;

Use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $user = new User;
        $user->name = 'FiTo';
        $user->email = 'fito@gmail.com';
        $user->password = bcrypt('123123');
        $user->save();

    }
}
