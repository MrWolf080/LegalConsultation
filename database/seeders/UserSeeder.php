<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Client1',
            'email' => 'client1@example.com',
            'password'=>bcrypt('12345'),
            'id_role' => DB::table('roles')->where('role','Клиент')->value('id'),
        ]);
        User::factory()->create([
            'name' => 'Lawyer1',
            'email' => 'lawyer1@example.com',
            'password'=>bcrypt('12345'),
            'id_role'=>DB::table('roles')->where('role','Юрист')->value('id'),
        ]);
        User::factory()->create([
            'name' => 'Client2',
            'email' => 'client2@example.com',
            'password'=>bcrypt('12345'),
            'id_role' => DB::table('roles')->where('role','Клиент')->value('id'),
        ]);
        User::factory()->create([
            'name' => 'Lawyer2',
            'email' => 'lawyer2@example.com',
            'password'=>bcrypt('12345'),
            'id_role'=>DB::table('roles')->where('role','Юрист')->value('id'),
        ]);
        User::factory()->create([
            'name' => 'Client3',
            'email' => 'client3@example.com',
            'password'=>bcrypt('12345'),
            'id_role' => DB::table('roles')->where('role','Клиент')->value('id'),
        ]);
        User::factory()->create([
            'name' => 'Client4',
            'email' => 'client4@example.com',
            'password'=>bcrypt('12345'),
            'id_role' => DB::table('roles')->where('role','Клиент')->value('id'),
        ]);
    }
}
