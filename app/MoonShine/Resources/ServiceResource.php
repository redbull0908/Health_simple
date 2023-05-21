<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Number;
use MoonShine\Fields\Textarea;
use MoonShine\Filters\BelongsToFilter;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ServiceResource extends Resource
{
    public static string $model = Service::class;

    public static string $title = 'Услуги';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Textarea::make('Название', 'name'),
            Number::make('Цена р.', 'price')->sortable()->step('0.01'),
            BelongsTo::make('Категория услуг', 'service_category', 'name')->searchable(),
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
            BelongsToFilter::make('Категория', 'service_category', 'name')
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
