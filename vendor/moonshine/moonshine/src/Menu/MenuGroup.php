<?php

declare(strict_types=1);

namespace MoonShine\Menu;

use MoonShine\Exceptions\MenuException;
use MoonShine\Resources\CustomPage;
use MoonShine\Resources\Resource;
use MoonShine\Traits\Makeable;

class MenuGroup extends MenuSection
{
    use Makeable;

    final public function __construct(string $label, array $items, string $icon = null)
    {
        $this->setLabel($label);

        $this->items = collect($items)->map(function ($item) {
            $item = is_string($item) ? new $item() : $item;

            throw_if(
                ! $item instanceof MenuItem && ! $item instanceof Resource && ! $item instanceof CustomPage,
                new MenuException('An object of the MenuItem|Resource|CustomPage class is required')
            );

            if ($item instanceof Resource) {
                return new MenuItem($item->title(), $item);
            }

            if ($item instanceof CustomPage) {
                return new MenuItem($item->label(), $item);
            }

            return $item;
        });

        if ($icon) {
            $this->icon($icon);
        }
    }
}
