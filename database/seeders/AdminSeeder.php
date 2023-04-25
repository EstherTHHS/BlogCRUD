<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'esther',
            'email' => 'esther@gmail.com',
            'password' => Hash::make('est12345')
        ]);

        $editor = User::create([
            'name' => 'htoo',
            'email' => 'htoo@gmail.com',
            'password' => Hash::make('htoo12345')
        ]);


        //3
        $admin->assignRole('SuperAdmin');
        $editor->assignRole('Editor');
    }
}
