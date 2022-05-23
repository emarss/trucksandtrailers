<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Guest User",
            'email' => 'guest@trucksandtrailers.co.zw',
            'password' => Hash::make('CaRtEr.4'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('profiles')->insert([
            'user_id' => 1,
            'role' => "admin",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('users')->insert([
            'name' => "Rufaro Sithole",
            'email' => 'rufarosithole4@gmail.com',
            'password' => Hash::make('CaRtEr.4'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('profiles')->insert([
            'user_id' => 2,
            'role' => "admin",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

     



    	//inserting Video categories
        DB::table('categories')->insert([
            [
	            'category' => "trucks",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
	            'category' => "trailers",
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
            [
	            'category' => "machinery",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
	            'category' => "farm equipment",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
	            'category' => "spares",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
	            'category' => "services",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
