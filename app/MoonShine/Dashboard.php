<?php

namespace App\MoonShine;

use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;

class Dashboard extends DashboardScreen
{
	public function blocks(): array
	{
		return [
            DashboardBlock::make([
            ])->setLabel('Добро пожаловать в Admin panel Moonshine !')
        ];
	}
}
