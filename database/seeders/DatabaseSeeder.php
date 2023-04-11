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
             'url_name'=>'oftalmologia'
         ]);
        \DB::table('service_categories')->insert([
            'name'=>'Онкология',
            'description'=>'По данным статистики, сегодня около 90% злокачественных образований поддаются лечению.',
            'url_name'=>'onkologia'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Лабораторная диагностика',
            'description'=>'Обширный спектр лабораторных услуг...',
            'url_name'=>'laboratornaya_diagnostica'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Узи',
            'description'=>'УЗИ является одним из самых результативных методов диагностики в современной медицине на сегодняшний...',
            'url_name'=>'uzi'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Урология',
            'description'=>'В медицинском центре Вам окажут профессиональную помощь лучшие специалисты в области урологи.',
            'url_name'=>'urologia'
        ]);
        \DB::table('service_categories')->insert([
            'name'=>'Гинекология',
            'description'=>'Заботе о женщине и ее здоровью в нашем центре уделяется большое внимание.',
            'url_name'=>'ginekologia'
        ]);

        //Services
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
