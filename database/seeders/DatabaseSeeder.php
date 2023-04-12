<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Service_category
         \DB::table('service_categories')->insert([
             'name'=>'Офтальмология',
             'description'=>'Лечение и профилактика болезней глаз...',
             'url_name'=>'oftalmologia',
             'img'=>'../image/bg/category/oftalmolog.jpg'
         ]);
        \DB::table('service_categories')->insert([
            'name'=>'Онкология',
            'description'=>'По данным статистики, сегодня около 90% злокачественных образований поддаются лечению.',
            'url_name'=>'onkologia',
            'img'=>'../image/bg/category/onlologia.jpg'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Лабораторная диагностика',
            'description'=>'Обширный спектр лабораторных услуг...',
            'url_name'=>'laboratornaya_diagnostica',
            'img'=>'../image/bg/category/diagnostika.jpg'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Узи',
            'description'=>'УЗИ является одним из самых результативных методов диагностики в современной медицине на сегодняшний...',
            'url_name'=>'uzi',
            'img'=>'../image/bg/category/uzi.jpg'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Урология',
            'description'=>'В медицинском центре Вам окажут профессиональную помощь лучшие специалисты в области урологи.',
            'url_name'=>'urologia',
            'img'=>'../image/bg/category/urologia.jpg'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Гинекология',
            'description'=>'Заботе о женщине и ее здоровью в нашем центре уделяется большое внимание.',
            'url_name'=>'ginekologia',
            'img'=>'../image/bg/category/ginekologia.jpg'
        ]);

        //Services
        //Laboratoria
        \DB::table('services')->insert([
            'name'=>'Общий анализ мочи',
            'price'=>3.7,
            'id_service_category'=>3,
        ]);
        \DB::table('services')->insert([
            'name'=>'Забор крови из вены для всего спектра гемотологических исследований (Общий анализ крови)',
            'price'=>3.39,
            'id_service_category'=>3,
        ]);
        \DB::table('services')->insert([
            'name'=>'Взятие крови из пальца для определения глюкозы',
            'price'=>1.28,
            'id_service_category'=>3,
        ]);
        \DB::table('services')->insert([
            'name'=>'Исследование соскобов и отделяемого с поверхности опухолевидных или пигментных образований кожи',
            'price'=>5.26,
            'id_service_category'=>3,
        ]);
        \DB::table('services')->insert([
            'name'=>'Трехстаканная проба',
            'price'=>2.59,
            'id_service_category'=>3,
        ]);
        \DB::table('services')->insert([
            'name'=>'Забор крови из вены "Гликированный гемоглобин"',
            'price'=>4.76,
            'id_service_category'=>3,
        ]);
        //Uzi
        \DB::table('services')->insert([
            'name'=>'Мочевой пузырь',
            'price'=>6.24,
            'id_service_category'=>4,
        ]);
        \DB::table('services')->insert([
            'name'=>'Селезенка',
            'price'=>6.24,
            'id_service_category'=>4,
        ]);
        \DB::table('services')->insert([
            'name'=>'Щитовидная железа с лимфатическими поверхностными узлами',
            'price'=>12.17,
            'id_service_category'=>4,
        ]);
        \DB::table('services')->insert([
            'name'=>'Почки и надпочечники',
            'price'=>12.17,
            'id_service_category'=>4,
        ]);
        \DB::table('services')->insert([
            'name'=>'Печень, желчный пузырь с определением функции',
            'price'=>15.00,
            'id_service_category'=>4,
        ]);
        \DB::table('services')->insert([
            'name'=>'УЗИ суставов с окружающими их мягкими тканями (парные) и дуплексным сканированием сосудов одного анатомического региона',
            'price'=>28.57,
            'id_service_category'=>4,
        ]);
        //Oftalmologia
        \DB::table('services')->insert([
            'name'=>'Первичный прием врача - офтальмолога',
            'price'=>29.38,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Повторный прием врача - офтальмолога',
            'price'=>23.29,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Промывание слезных путей',
            'price'=>22.66,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Снятие конъюнктивального шва',
            'price'=>22.66,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Подбор очковых линз',
            'price'=>22.00,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Удаление инородных тел из конъюнктивальной полости и\или роговицы',
            'price'=>22.66,
            'id_service_category'=>1,
        ]);

        //Onkologia
        \DB::table('services')->insert([
            'name'=>'Первичный прием врача - онколога',
            'price'=>29.38,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Повторный прием врача - онколога',
            'price'=>23.29,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Электрорадиокоагуляция невусов за 1 мм',
            'price'=>13.12,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Электрокоагуляция доброкачественных сосудистых новообразований кожи и красной каймы губ от 0,5 см до 1 см',
            'price'=>17.12,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Электрорадиокоагуляция гипертрофических рубцов после переносимых воспалительных заболеваний кожи за 1 см',
            'price'=>17.12 ,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Электрорадиокоагуляция доброкачественных новообразований кожи до 0,5 см',
            'price'=>17.12,
            'id_service_category'=>2,
        ]);

        //Urologia
        \DB::table('services')->insert([
            'name'=>'Первичный прием врача - уролога',
            'price'=>30.43,
            'id_service_category'=>5,
        ]);
        \DB::table('services')->insert([
            'name'=>'Повторный прием врача - уролога',
            'price'=>24.43,
            'id_service_category'=>5,
        ]);
        \DB::table('services')->insert([
            'name'=>'Взятие мазка из уретры',
            'price'=>12.04,
            'id_service_category'=>5,
        ]);
        \DB::table('services')->insert([
            'name'=>'Инстилляция мочевого пузыря',
            'price'=>44.32,
            'id_service_category'=>5,
        ]);
        \DB::table('services')->insert([
            'name'=>'Блокада по Клепичу',
            'price'=>16.70 ,
            'id_service_category'=>5,
        ]);
        \DB::table('services')->insert([
            'name'=>'Уретроскопия',
            'price'=>34.22,
            'id_service_category'=>5,
        ]);

        //Ginekologia
        \DB::table('services')->insert([
            'name'=>'Первичный прием врача-акушера-гинеколога',
            'price'=>28.28,
            'id_service_category'=>6,
        ]);
        \DB::table('services')->insert([
            'name'=>'Повторный прием врача-акушера-гинеколога',
            'price'=>19.10,
            'id_service_category'=>6,
        ]);
        \DB::table('services')->insert([
            'name'=>'Аспирационная биопсия из полости матки',
            'price'=>24.24,
            'id_service_category'=>6,
        ]);
        \DB::table('services')->insert([
            'name'=>'Внутриматочная инфузия обогащенной тромбоцитами плазмы',
            'price'=>137.64,
            'id_service_category'=>6,
        ]);
        \DB::table('services')->insert([
            'name'=>'Забор мазка на исследование',
            'price'=>3.80 ,
            'id_service_category'=>6,
        ]);
        \DB::table('services')->insert([
            'name'=>'Коагуляция эрозии шейки матки радиоволновым методом',
            'price'=>31.74,
            'id_service_category'=>6,
        ]);

        //Doctors
        \DB::table('doctors')->insert([
            'full_name'=>'Иванов Иван',
            'experience'=>'22 года',
            'id_service_category'=>5,
            'category'=>'высшая',
            'specialization'=>'Врач-уролог',
            'img'=>'uploads/image/doctors/ivanov.png'
        ]);
        \DB::table('doctors')->insert([
            'full_name'=>'Игнатьева Тамара',
            'experience'=>'10 лет',
            'id_service_category'=>6,
            'specialization'=>'Врач-акушер-гинеколог',
            'category'=>'первая',
            'img'=>'uploads/image/doctors/ignateva.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Волковская Тамара',
            'experience'=>'12 лет',
            'id_service_category'=>3,
            'specialization'=>'Врач клинической лабораторной диагностики',
            'category'=>'высшая',
            'img'=>'uploads/image/doctors/volkovskaa_tamara.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Александров Алексей',
            'experience'=>'15 лет',
            'id_service_category'=>5,
            'category'=>'первая',
            'specialization'=>'Врач-уролог',
            'img'=>'uploads/image/doctors/alexandrov.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Кубарева Анна',
            'experience'=>'7 лет',
            'id_service_category'=>6,
            'specialization'=>'Врач-акушер-гинеколог',
            'category'=>'первая',
            'img'=>'uploads/image/doctors/kubareva.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Кравец Ольга',
            'experience'=>'15 лет',
            'id_service_category'=>3,
            'specialization'=>'Врач клинической лабораторной диагностики',
            'category'=>'первая',
            'img'=>'uploads/image/doctors/kravec_olga.jpg'
        ]);


        \DB::table('doctors')->insert([
            'full_name'=>'Долматова Анна',
            'experience'=>'18 лет',
            'id_service_category'=>2,
            'specialization'=>'Врач-онколог-хирург',
            'category'=>'высшая',
            'img'=>'uploads/image/doctors/dolmatova_anna.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Дегтярев Андрей',
            'experience'=>'30 лет',
            'id_service_category'=>2,
            'specialization'=>'врач-онколог-гинеколог',
            'category'=>'высшая, профессор, доктор медицинских наук',
            'img'=>'uploads/image/doctors/degterev_andrey.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Протасев Вячеслав',
            'experience'=>'20 лет',
            'id_service_category'=>2,
            'specialization'=>'Врач-онколог-хирург',
            'category'=>'высшая',
            'img'=>'uploads/image/doctors/protasev_slava.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Федорова Юлия',
            'experience'=>'24 года',
            'id_service_category'=>1,
            'specialization'=>'Врач-офтальмолог',
            'category'=>'первая',
            'img'=>'uploads/image/doctors/fedorova_yulia.jpg'
        ]);

        \DB::table('doctors')->insert([
            'full_name'=>'Дроздова Екатерина',
            'experience'=>'27 лет',
            'id_service_category'=>1,
            'specialization'=>'Врач-офтальмолог',
            'category'=>'высшая',
            'img'=>'uploads/image/doctors/drozdova_ekaterina.jpg'
        ]);

        //Roles

        Role::create([
            'name'=>'user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Role::create([
            'name'=>'doctor',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Role::create([
            'name'=>'manage',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Role::create([
            'name'=>'super-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        //Permissions

        $view_profile = Permission::create([
            'name'=>'view_profile',
        ]);

        //Users

        User::create([
            'login' => 'user123',
            'full_name' => 'Иваньков Алексей Федорович',
            'sex' => 'Мужской',
            'password' => \Hash::make('&Aa1234'),
            'birthday' => \Date::make('17-02-2010'),
            'tel_number' => '446752384',
            'img'=>null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('user')->givePermissionTo($view_profile);

        User::create([
            'login' => 'super_user',
            'full_name' => 'admin',
            'password' => \Hash::make('&Aa1234'),
        ]);
    }
}
