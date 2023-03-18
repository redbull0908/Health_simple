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
             'name'=>'Лабораторная диагностика',
             'description'=>'Обширный спектр лабораторных услуг...',
             'img'=>'Лабораторная_диагностика.jpg'
         ]);
        \DB::table('service_categories')->insert([
            'name'=>'Узи',
            'description'=>'УЗИ является одним из самых результативных методов диагностики в современной медицине на сегодняшний...',
            'img'=>'Узи.jpg'
        ]);

        //Services
        \DB::table('services')->insert([
            'name'=>'Общий анализ мочи',
            'price'=>3.7,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Забор крови из вены для всего спектра гемотологических исследований (Общий анализ крови)',
            'price'=>3.39,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Взятие крови из пальца для определения глюкозы',
            'price'=>1.28,
            'id_service_category'=>1,
        ]);
        \DB::table('services')->insert([
            'name'=>'Мочевой пузырь',
            'price'=>6.24,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Селезенка',
            'price'=>6.24,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Щитовидная железа с лимфатическими поверхностными узлами',
            'price'=>12.17,
            'id_service_category'=>2,
        ]);
        \DB::table('services')->insert([
            'name'=>'Почки и надпочечники',
            'price'=>12.17,
            'id_service_category'=>2,
        ]);

        //Doctors
        \DB::table('doctors')->insert([
            'full_name'=>'Иванов Иван',
            'description'=>'22 года опыта',
            'id_service_category'=>1,
            'img'=>'ivanov.png'
        ]);
        \DB::table('doctors')->insert([
            'full_name'=>'Игнатьева Тамара',
            'description'=>'10 лет опыта',
            'id_service_category'=>1,
            'img'=>'ignateva.jpg'
        ]);
        \DB::table('doctors')->insert([
            'full_name'=>'Александров Алексей',
            'description'=>'15 лет опыта',
            'id_service_category'=>2,
            'img'=>'alexandrov.jpg'
        ]);
        \DB::table('doctors')->insert([
            'full_name'=>'Кубарева Анна',
            'description'=>'7 лет опыта',
            'id_service_category'=>2,
            'img'=>'kubareva.jpg'
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
            'birthday' => \Date::make('17-02-2014'),
            'tel_number' => '446752384',
            'img'=>'user123.jpg',
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
