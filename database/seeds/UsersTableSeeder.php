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
        \App\Models\User::create([
            'name'         => 'shultz',
            'password'     => '$2y$10$xMNV3Pt3/jOFmjHDLF1vxePA2dW/b3dQNmN2uQQLh3n3UCAgLJA7O',
            'email'        => 'skorohods@mail.ru',
        ]);
    }
}
