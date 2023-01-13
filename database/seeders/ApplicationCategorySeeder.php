<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('application_categories')->insertOrIgnore([
            ['id'=>1,'category'=>'Земельные споры'],
            ['id'=>2,'category'=>'Семейные споры'],
            ['id'=>3,'category'=>'Трудовые споры'],
            ['id'=>4,'category'=>'Споры с ГИБДД']
        ]);
    }
}
