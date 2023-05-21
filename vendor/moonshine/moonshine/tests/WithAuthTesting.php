<?php

declare(strict_types=1);

namespace MoonShine\Tests;

trait WithAuthTesting
{
    public function authorized(): TestCase
    {
        return $this->actingAs($this->adminUser(), 'moonshine');
    }
}
