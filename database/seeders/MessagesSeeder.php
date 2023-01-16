<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory()->create([
            'message'=>'А сколько предложили?',
            'image'=>null,
            'id_application'=>3,
            'id_user'=>2
        ]);
        Message::factory()->create([
            'message'=>'Предложил сигами, которые в бардачке завялились',
            'image'=>null,
            'id_application'=>3,
            'id_user'=>1
        ]);

        Message::factory()->create([
            'message'=>'А кем работаете?',
            'image'=>null,
            'id_application'=>4,
            'id_user'=>2
        ]);
        Message::factory()->create([
            'message'=>'Примерно, здесь',
            'image'=>'269ad3fd54ae03fe2b42780acc549099.jpg',
            'id_application'=>4,
            'id_user'=>3
        ]);

        Message::factory()->create([
            'message'=>'Не волнуйтесь, другая жена отожмёт',
            'image'=>null,
            'id_application'=>5,
            'id_user'=>4
        ]);
        Message::factory()->create([
            'message'=>'Действительно, спасибо, успокоили',
            'image'=>null,
            'id_application'=>5,
            'id_user'=>3
        ]);

        Message::factory()->create([
            'message'=>'Во-первых, у нас не Америка, а во-вторых, свобода одного заканчивается там, где начинается свобода другого',
            'image'=>null,
            'id_application'=>9,
            'id_user'=>2
        ]);

        Message::factory()->create([
            'message'=>'Очень жаль, но в законодательстве нет такой статьи. Я напишу знакомому депутату, дабы он выступил с соответствующей инициативой на ближайшем заседании Госдумы.',
            'image'=>null,
            'id_application'=>10,
            'id_user'=>4
        ]);
        Message::factory()->create([
            'message'=>'Спасибо за понимание.',
            'image'=>null,
            'id_application'=>10,
            'id_user'=>5
        ]);

        Message::factory()->create([
            'message'=>'Согласен, выглядит круто. Сотрудники ГИБДД наверняка просто позавидовали.',
            'image'=>null,
            'id_application'=>13,
            'id_user'=>4
        ]);

        Message::factory()->create([
            'message'=>'Вы главное выздоравливайте. А вообще, продемонстрируйте маме последние исследования в области биологии в которых указано, что болезни вызывают бактерии, а не холод.
            Хотя она все равно проигнорирует',
            'image'=>null,
            'id_application'=>14,
            'id_user'=>2
        ]);
        Message::factory()->create([
            'message'=>'Действительно, проигнорировала. По крайней мере знаю, что правда на моей стороне.',
            'image'=>null,
            'id_application'=>14,
            'id_user'=>6
        ]);
    }
}
