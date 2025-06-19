<?php

namespace Database\Seeders;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('1234'), // Password is 'password'
        ]);
        User::factory()->create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'role' => 'staff',
            'password' => bcrypt('12345'), // Password is 'password'
        ]);
        // $this->call([
        //     AlatCampingSeeder::class,
            
        // ]);
    }
}
