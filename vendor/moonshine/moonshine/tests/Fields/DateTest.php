<?php

declare(strict_types=1);

namespace MoonShine\Tests\Fields;

use Illuminate\Foundation\Testing\RefreshDatabase;
use MoonShine\Fields\Date;
use MoonShine\Models\MoonshineUser;
use MoonShine\Tests\TestCase;

class DateTest extends TestCase
{
    use RefreshDatabase;

    public function test_values()
    {
        $user = MoonshineUser::factory()->make([
            'created_at' => '2022-01-01 00:00:00',
        ]);

        $field = Date::make('Created at')
            ->format('d.m.Y');

        $this->assertEquals('2022-01-01', $field->formViewValue($user));
        $this->assertEquals('01.01.2022', $field->indexViewValue($user));
    }

    public function test_nullable()
    {
        $user = new MoonshineUser();

        $field = Date::make('Created at')
            ->nullable();

        $this->assertEquals('', $field->formViewValue($user));
        $this->assertEquals('', $field->indexViewValue($user));
    }

    public function test_default()
    {
        $user = new MoonshineUser();

        $field = Date::make('Created at')
            ->default('2022-01-02');

        $this->assertEquals('2022-01-02', $field->formViewValue($user));

        $field = Date::make('Created at')
            ->nullable()
            ->default('2022-01-02');

        $this->assertEquals('2022-01-02', $field->formViewValue($user));
    }

    public function test_save()
    {
        $user = new MoonshineUser();

        $field = Date::make('Created at')
            ->default('2022-01-02');

        $item = $field->save($user);

        $this->assertEquals('2022-01-02', $item->created_at->format('Y-m-d'));

        $field = Date::make('Created at')
            ->nullable();

        $item = $field->save($user);

        $this->assertNull($item->created_at);
    }
}
