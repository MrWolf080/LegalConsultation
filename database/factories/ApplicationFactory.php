<?php

namespace Database\Factories;

use App\Models\ApplicationCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_category' => DB::table('application_categories')
                ->whereIn('category',
                    ['Земельные споры','Семейные споры','Трудовые споры','Споры с ГИБДД'])
                ->inRandomOrder()->value('id'),
            'subject' => $this->faker->title(),
            'question' => $this->faker->paragraph(),
            'image'=>$this->faker->image(),
            'id_client'=>DB::table('users')
                ->join('roles', 'users.id_role', '=', 'roles.id')
                ->where('roles.role', 'Клиент')
                ->inRandomOrder()->value('users.id'),
            'id_lawyer'=>DB::table('users')
                ->join('roles', 'users.id_role', '=', 'roles.id')
                ->where('roles.role', 'Юрист')
                ->inRandomOrder()->value('users.id'),
            'status'=>'Новая'
        ];
    }
}
