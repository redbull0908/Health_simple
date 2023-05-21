<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Validation\Rule;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Heading;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Password;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Fields\Image;

class UserDoctorResource extends Resource
{
    public static string $model = User::class;

    public static string $title = 'Доктор';

    public static array $activeActions = ['create','show','delete'];


    public function query(): Builder
    {
        return parent::query()->where('doc_id', '!=', null);
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Heading::make('Основное'),

                Flex::make([

                    Text::make('Логин', 'login')
                        ->hideOnUpdate()
                        ->required(),
                    Text::make('ФИО', 'full_name')
                        ->required(),
                    Password::make('Пароль', 'password')
                        ->hideOnUpdate()
                        ->hideOnIndex()
                        ->eye()
                        ->required(),

                ]),

                BelongsTo::make('Доктор','doctor','full_name','id')
                    ->hideOnIndex()
                    ->nullable()
                    ->required()->searchable(),

                Divider::make(),

                Flex::make([

                    BelongsToMany::make('Роль', 'roles', new RolesResource())
                        ->select()
                        ->hideOnUpdate()
                        ->hideOnIndex()
                        ->required()
                        ->valuesQuery(
                            fn(Builder $builder)=>$builder->where('roles.name','=','doctor')),

                    BelongsToMany::make('Права доступа', 'permissions', 'name')
                        ->valuesQuery(fn(Builder $builder)=>$builder->where('permissions.name','!=','manage')
                            ->where('permissions.name','!=','change_profile')
                            ->where('permissions.name','!=','search_info')
                            ->where('permissions.name','!=','admin_panel')
                            ->where('permissions.name','!=','subscribe')
                        )
                        ->select()
                        ->hideOnUpdate()
                        ->hideOnIndex()
                        ->required(),
                ]),

                Image::make('Фото', 'img')->
                dir('uploads\image\users')->disk('server')->
                allowedExtensions(['jpg', 'png', 'jpeg'])->nullable()->removable()
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'password' => 'required',
            'login' => [Rule::unique('users', 'login'),'required'],
            'doc_id'=> Rule::unique('users','doc_id'),
            'full_name'=>'required',
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
