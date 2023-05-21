<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subscribe;

use Illuminate\Database\Eloquent\Builder;
use MoonShine\Decorations\Block;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Fields\Fields;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Filters\DateRangeFilter;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class SubscribeResource extends Resource
{
	public static string $model = Subscribe::class;

	public static string $title = 'Записи на прием';

    public static array $activeActions = ['show','delete'];


	public function fields(): array
	{
		return [
		    Block::make([
                ID::make()->sortable(),
                Date::make('Дата приема','date')->format('d-m-Y'),
                Text::make('Время приема','time'),
                BelongsTo::make('Категория услуг','category','name'),
                BelongsTo::make('Услуга','service','name')->hideOnIndex(),
                BelongsTo::make('Доктор','doctor','full_name'),
                BelongsTo::make('Номер телефона пациента','user','tel_number'),
                BelongsTo::make('ФИО пациента','user','full_name'),
            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [
            DateRangeFilter::make('Диапазон','date'),
            BelongsToFilter::make('Номер телефона пациента','user','tel_number')->searchable()
                ->valuesQuery(fn(Builder $builder)=>$builder->where('users.tel_number','!=',null,'and')
                    ->where('users.doc_id','=',null))->nullable()
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
