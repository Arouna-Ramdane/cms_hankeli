<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => 'ramdanearouna9@gmail.com',
            'username' => 'ramjr',
            'password' => Hash::make('1234'),
            'personne_id' => 1,
            
        ]);

        DB::table('clients')->insert([
            'personne_id' => $user->personne_id,
        ]);

        $user->assignRole('admin');
    }
    
}
