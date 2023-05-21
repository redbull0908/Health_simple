<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Validation\Rule;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Heading;
use MoonShine\Fields\BelongsToMany;
use MoonShine\Fields\Date;
use MoonShine\Fields\Password;
use MoonShine\Fields\Phone;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Fields\Image;

class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Пользователи';

    public static array $activeActions = ['create','show','delete'];

    public function query(): Builder
    {
       return parent::query()->where('doc_id','=',null,'and')
           ->where('full_name','!=','admin','and')->where('full_name','!=','Регистратура');
    }

    public function fields(): array
	{
		return [
		    Block::make([

                ID::make()->sortable(),
                Text::make('Создан','created_at')
                    ->showOnIndex()
                    ->hideOnForm(),

                Heading::make('Основное'),
                Flex::make([

                    Text::make('Логин','login')->hint('user456')->required(),

                    Phone::make('Номер телефона','tel_number')->hint('445672375')->required(),

                    Password::make('Пароль','password')
                        ->eye()
                        ->hint('Pa4!ds')
                        ->hideOnIndex()
                        ->required(),

                ]),
                Flex::make([
                    BelongsToMany::make('Роль','roles',new RolesResource())
                        ->select()
                        ->hideOnIndex()
                        ->required()
                    ->valuesQuery(
                        fn(Builder $builder)=>$builder->where('roles.name','=','user')),

                    BelongsToMany::make('Права доступа','permissions','name')
                        ->select()
                        ->hideOnIndex()
                        ->valuesQuery(fn(Builder $builder)=>$builder->where('permissions.name','!=','manage')
                            ->where('permissions.name','!=','change_profile')
                            ->where('permissions.name','!=','doctor_subscribe')
                            ->where('permissions.name','!=','admin_panel')
                    )->required()
                ]),

                Divider::make(),

                Heading::make('Дополнительно'),

                Flex::make([
                    Text::make('ФИО','full_name')->required(),
                    Date::make('Дата рождения','birthday')
                        ->hideOnIndex()
                        ->required()
                        ->format('d-m-Y'),

                    Select::make('Пол','sex')->options([
                        'Мужской'=>'Мужской',
                        'Женский'=>'Женский'
                    ])
                        ->hideOnIndex()
                        ->required(),
                ]),

                Image::make('Фото','img')
                    ->dir('uploads\image\users')
                    ->disk('server')
                    ->allowedExtensions(['jpg','png','jpeg'])
                    ->nullable()->hideOnIndex(),

            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'password' => 'required',
            'login' => [Rule::unique('users', 'login'),'required'],
            'tel_number' => ['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/',Rule::unique('users','tel_number')],
            'full_name'=>'required',
            'birthday'=>'required',
            'sex'=>'required'
        ];
    }

    public function search(): array
    {
        return ['id','tel_number','full_name'];
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
