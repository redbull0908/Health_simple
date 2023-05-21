<?php

declare(strict_types=1);

namespace MoonShine\Resources;

use Closure;
use MoonShine\Traits\Makeable;
use MoonShine\Traits\WithLabel;

final class CustomPage
{
    use Makeable;
    use WithLabel;

    public function __construct(
        string $label,
        protected string $alias,
        protected string|Closure $view,
        protected ?Closure $viewData = null,
    ) {
        $this->setLabel($label);
    }

    public function alias(): string
    {
        return $this->alias;
    }

    public function getView(): string
    {
        if (is_callable($this->view)) {
            return call_user_func($this->view);
        }

        return $this->view;
    }

    public function getViewData(): array
    {
        return is_callable($this->viewData) ? call_user_func($this->viewData) : [];
    }

    public function url(): string
    {
        return route((string) str('moonshine')
            ->append('.')
            ->append('custom_page'), $this->alias);
    }
}
