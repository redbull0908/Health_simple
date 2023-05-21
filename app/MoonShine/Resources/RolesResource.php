<?php

namespace App\MoonShine\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use MoonShine\Decorations\Block;
use MoonShine\Fields\Text;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use Spatie\Permission\Models\Role;

class RolesResource extends Resource
{
	public static string $model = Role::class;

	public static string $title = 'Роли';

    public string $titleField = 'name';

    public function query(): Builder
    {
        return parent::query()->where('role.name','=','user');
    }

	public function fields(): array
	{
		return [
		    Block::make([
                ID::make()->sortable(),
                Text::make('Роль','name')
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
