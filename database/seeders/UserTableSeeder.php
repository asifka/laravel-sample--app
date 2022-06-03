<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' =>'Binu',
        //     'email' =>'binu@gmail.com',
        //     'date_of_birth' =>'1985-05-07',
        // ]);

        // User::create([
        //     'name' =>'Raj',
        //     'email' =>'raj@gmail.com',
        //     'date_of_birth' =>'1985-05-07',
        // ]);

        // User::create([
        //     'name' =>'Salma',
        //     'email' =>'salma@gmail.com',
        //     'date_of_birth' =>'1985-05-07',
        // ]);
        User::factory(10000)->create();
    }
}
