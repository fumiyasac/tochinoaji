<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array('email' => 'foo@bar.com', 'nickname' => 'abc', 'password' => Hash::make('123456')));
    }

}
