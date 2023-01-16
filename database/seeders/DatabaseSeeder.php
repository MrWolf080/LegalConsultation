<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Application;
use App\Models\Message;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RolesSeeder::class,]);
        $this->call([ApplicationCategorySeeder::class,]);
        $this->call([UserSeeder::class,]);
        $this->call([ApplicationSeeder::class,]);
        $this->call([MessagesSeeder::class,]);
    }
}
