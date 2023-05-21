<?php

namespace App\Providers;

use App\MoonShine\Resources\DoctorResource;
use App\MoonShine\Resources\Schedule_templateResource;
use App\MoonShine\Resources\ScheduleResource;
use App\MoonShine\Resources\ServiceCategoryResource;
use App\MoonShine\Resources\ServiceResource;
use App\MoonShine\Resources\SubscribeResource;
use App\MoonShine\Resources\UserDoctorResource;
use App\MoonShine\Resources\UserResource;
use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;

class MoonShineServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuGroup::make('Пользователи',[
                MenuItem::make('Пациенты',new UserResource())->icon('heroicons.user'),
                MenuItem::make('Доктора',new UserDoctorResource())->icon('heroicons.heart'),
            ])->icon('users'),
            MenuGroup::make('Услуги',[
                MenuItem::make('Категории',new ServiceCategoryResource())->icon('heroicons.clipboard-document-list'),
                MenuItem::make('Услуги',new ServiceResource())->icon('heroicons.clipboard')
            ])->icon('heroicons.briefcase'),
            MenuItem::make('Врачи',new DoctorResource())->icon('heroicons.academic-cap'),
            MenuItem::make('График врачей',new ScheduleResource())->icon('heroicons.academic-cap'),
            MenuItem::make('Записи',new SubscribeResource())->icon('heroicons.pencil-square'),
            MenuItem::make('Вернуться на сайт','http://clinic.stranica.online/')->icon('heroicons.arrow-uturn-left'),
        ]);
    }
}
