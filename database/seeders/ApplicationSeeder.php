<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Земельные споры')->value('id'),
            'subject'=>'Земля спорит со мной',
            'question'=>'Вчера шел по дороге, ехала машина и меня земелью обдало. Как на нее в суд подать?',
            'image'=>'nature-sand-wood-field-texture-floor-asphalt-bark-mud-broken-soil-material-earth-cracks-drought-quartered-640797.jpg',
            'id_client'=>DB::table('users')->where('name','client1')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Семейные споры')->value('id'),
            'subject'=>'Ушла жена, грозится что наколдует и я навсегда останусь один',
            'question'=>'Посоветуйте хорошего экстрасенса',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client1')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Споры с ГИБДД')->value('id'),
            'subject'=>'Гаишник остановил на дороге и угнал машину',
            'question'=>'Попытался дать взятку, все как положено, а он все равно угнал. Где его теперь искать?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client1')->value('id'),
            'id_lawyer'=>2,
            'status'=>'В работе',
        ]);

        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Трудовые споры')->value('id'),
            'subject'=>'Самозанятый',
            'question'=>'Деньги просто приходят на карту в недерминированные отрезки времени, могут ли ее заблокировать?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client2')->value('id'),
            'id_lawyer'=>2,
            'status'=>'В работе'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Семейные споры')->value('id'),
            'subject'=>'Отец развелся и не хочет оставлять квартиру',
            'question'=>'Да не очень то и нужна, просто из принципа хочу отжать',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client2')->value('id'),
            'id_lawyer'=>4,
            'status'=>'Закрыта',
            'comment'=>'Прекрасная организация, применяют индивидуальный подход к проблемам'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Земельные споры')->value('id'),
            'subject'=>'Спор с кротом о постройке дачи',
            'question'=>'Просто ужас, собирался построить домик на даче, подготовил инструменты, все привез но не тут то было.
            Обнаруживаю крота который против, все инструменты к себе в нору утащил, подговорил термитов и они доски сгрызли',
            'image'=>'ahmad-kanbar-clxomutgi0k-unsplash-1-scaled.jpg__0_0x0.jpg',
            'id_client'=>DB::table('users')->where('name','client2')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Споры с ГИБДД')->value('id'),
            'subject'=>'Отогнали машину на штраф стоянку',
            'question'=>'Я немножко перебрал, денег на такси не было. Сел в машину и немножко разбил машины, стоящие на парковке.
             Тут подскочил хозяин одной из машин, меня выволокли, вызвали ментов и те долго ржали и видосы снимали, потом эвакуировли машину.
             Как ее вернуть?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client2')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);

        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Семейные споры')->value('id'),
            'subject'=>'Семья пытается запретить общаться с другими людьми',
            'question'=>'Меня закрывают в доме, не дают ходить общаться с друзьями. Говорят в секту попал. Ну да ходим
            в балахонах на вечеринках, ну пентаграммы рисуем, ну с кем не бывает? Все ведь могут развлекаться как хотят',
            'image'=>'1647131805_20-krot-info-p-sekta-prikol-smeshnie-foto-24.jpg',
            'id_client'=>DB::table('users')->where('name','client3')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Споры с ГИБДД')->value('id'),
            'subject'=>'Выписали штраф за непристегнутый ремень',
            'question'=>'Остановил гаишник, говорит почему не пристегнуты? Я ответил, что мы живем в свободной стране,
            кто то пристегнут, кто-то нет. Он выписал штраф. Как его обжаловать?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client3')->value('id'),
            'id_lawyer'=>2,
            'status'=>'В работе'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Семейные споры')->value('id'),
            'subject'=>'Психологическое насилие',
            'question'=>'Вчера на меня наорала мать из-за того, что я не убрался в комнате. Как подать в суд
            на психологическое насилие с её стороны?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client3')->value('id'),
            'id_lawyer'=>4,
            'status'=>'Закрыта'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Трудовые споры')->value('id'),
            'subject'=>'Увольнение',
            'question'=>'Начальник уволил за распитие спиртных напитков на рабочем месте. Что самое обидное -
            я как порядочный человек угостил его, а он все равно уволил. Есть возможность хотя-бы присудить компенсацию в виде бутылки?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client3')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);

        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Трудовые споры')->value('id'),
            'subject'=>'Несчастный случай на работе',
            'question'=>'Я работаю на стройке и случайно упал с высоты 250м. Компенсацию выплачивать отказались, с формулировкой:
            "Я же тебе говорил не ходи по балкам без страховки". Поскольку произошедшее все равно можно классифицировать как несчатный случай,
            хотелось бы все же рассчитывать на компенсацию.',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client4')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Новая'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Споры с ГИБДД')->value('id'),
            'subject'=>'Мигалки на машине',
            'question'=>'Поставил на машину мигалки, потому что круто выглядят, так меня оштрафовали, сказав что
            нельзя гражданским разъезжать в машине со спец сигналами. Разве это не отменяет того, что круто выглядит?',
            'image'=>'1634845909_50-krot-info-p-probleskovie-mayachki-na-avto-mashini-kras-59.jpg',
            'id_client'=>DB::table('users')->where('name','client4')->value('id'),
            'id_lawyer'=>4,
            'status'=>'В работе'
        ]);
        Application::factory()->create([
            'id_category'=>DB::table('application_categories')->where('category','Семейные споры')->value('id'),
            'subject'=>'Брат обил ледяной водой',
            'question'=>'Брат разбудил облив водой и у меня теперь температура. Мама сказала, что это потому что без шапки ходил.
            Как её переубедить?',
            'image'=>null,
            'id_client'=>DB::table('users')->where('name','client4')->value('id'),
            'id_lawyer'=>null,
            'status'=>'Закрыта',
            'comment'=>'Превосходный сервис. Рассчитывал на юридическую консультацию, а получил психологическую + биологическую'
        ]);

    }
}
