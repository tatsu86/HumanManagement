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
        //TODO: パスワードはHashにする必要がある
        // DB::table('users')->truncate();

        // $users = [
        //     [
        //         'name' => 'たつき',
        //         'email' => 'tatuki.hh@gmail.com',
        //         'password' => '11111111',
        //     ],
        // ];

        // foreach($users as $user) {
        //     \App\User::create($user);
        // }
    }
}
