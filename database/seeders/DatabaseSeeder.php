<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Application;
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

        //User::factory(10)->create();
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




        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Земельные споры')->value('id'),
            'subject'=>'Земля спорит с воздухом',
            'question'=>'Помогите, что делать, от земельных споров деваться некуда, земля и воздух спорят, голова кругом идет',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client1')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
    }
}
