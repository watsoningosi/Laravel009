<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
           
      \App\Models\User::factory()->create([
        'name' => 'Super Admin',
        'email' => 'superuser@gmail.com',
        'is_admin' => '1',
        'password' => bcrypt('password'),
    ]);
     //  \App\Models\Post::factory(10)->create();
        // \App\Models\User::factory(10)->create();

      //   \App\Models\User::factory()->create([
         //    'name' => 'Local User',
          //  'email' => 'test@gmail.com',
          //  'password' => bcrypt('password')
        // ]);
    }
}
