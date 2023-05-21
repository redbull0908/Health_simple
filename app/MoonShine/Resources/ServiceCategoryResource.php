<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceCategory;

use MoonShine\Decorations\Block;
use MoonShine\Fields\Image;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ServiceCategoryResource extends Resource
{
	public static string $model = ServiceCategory::class;

	public static string $title = 'Категория';

    public string $name = 'name';

    public static array $activeActions = ['show','edit'];


	public function fields(): array
	{
		return [
		    Block::make([
                ID::make()->sortable(),
                Text::make('Название','name')->sortable()->hideOnUpdate(),
                Text::make('url_name','url_name')->hideOnUpdate(),
                Textarea::make('Описание','description'),
                Image::make('Фото','img')->dir('uploads\image\category')->disk('server')->allowedExtensions(['jpg','png','jpeg'])
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
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
