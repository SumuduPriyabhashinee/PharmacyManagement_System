<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class owner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'owner',
            'email'=>'owner@gmail.com',
            'password' => Hash::make('123456')
        ]);
        
        $user->attachRole('owner');
    }
}
