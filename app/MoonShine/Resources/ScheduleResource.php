<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;

use MoonShine\Decorations\Block;
use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Date;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Filters\DateRangeFilter;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ScheduleResource extends Resource
{
	public static string $model = Schedule::class;

	public static string $title = 'График работы врачей';

    public static array $activeActions = ['show','create','delete'];

    public static string $orderField = 'date';

	public function fields(): array
	{
		return [
            Block::make([
                ID::make()->sortable(),
                Date::make('Дата работы','date')->format('d-m-Y')->sortable(),
                BelongsTo::make('Врач','doctor','full_name')->searchable(),
                BelongsTo::make('Смена','template','name'),
                BelongsTo::make('Время начала работы','template','time_from')->hideOnForm()->hideOnIndex(),
                BelongsTo::make('Время конца работы','template','time_to')->hideOnForm()->hideOnIndex(),
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
            BelongsToFilter::make('Врач','doctor','full_name')->searchable()->nullable(),
            DateRangeFilter::make('Диапазон дат','date'),
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
