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
        \App\User::create([
            'fullName' => 'Amar-net System',
            'username' => 'amarnet',
            'email'=>'amarnetsystem@gmail.com',
            'phone_num'=>'00',
            'type'=>'A',
            'status'=>'A',
            'email_verified_at'=>now(),
            'password' => bcrypt('@merNet'),
        ]);
    }
}
