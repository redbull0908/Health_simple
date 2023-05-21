<?php

namespace App\MoonShine\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\ServiceCategory;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\MorphOne;
use MoonShine\Fields\Text;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Filters\TextFilter;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use MoonShine\Fields\Image;

class DoctorResource extends Resource
{
	public static string $model = Doctor::class;

	public static string $title = 'Врачи';

    public static array $activeActions = ['create','show','delete'];

    public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('ФИО','full_name')->sortable(),
            Text::make('Специализация','specialization')->sortable(),
            BelongsTo::make('Категория услуг','service_category','name','id')->searchable(),
            Text::make('Опыт работы','experience'),
            Text::make('Категория','category'),
            Image::make('Фото','img')->dir('uploads\image\doctors')->disk('server')->allowedExtensions(['jpg','png','jpeg'])
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
            BelongsToFilter::make('Категория','service_category','name')->nullable()
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
