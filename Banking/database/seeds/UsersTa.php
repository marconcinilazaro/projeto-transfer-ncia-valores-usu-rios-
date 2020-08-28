<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'    => 'lazaro marconcini',
            'email'   => 'lazaromarconcini@gmail.com',
            'password'=> bcrypt('1234'),
            'cpf'     => '13622183756',
        ]);
    }
}
