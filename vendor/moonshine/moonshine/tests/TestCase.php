<?php

declare(strict_types=1);

namespace MoonShine\Tests;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use MoonShine\Menu\MenuItem;
use MoonShine\Models\MoonshineUser;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\MoonShine;
use MoonShine\Providers\MoonShineServiceProvider;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\Resource;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use InteractsWithViews;
    use WithAuthTesting;

    protected Authenticatable|MoonshineUser $adminUser;

    protected Resource $testResource;

    protected function setUp(): void
    {
        parent::setUp();

        $this->performApplication()
            ->resolveFactories()
            ->resolveSuperUser()
            ->resolveTestResource()
            ->registerTestResource();
    }

    protected function performApplication(): static
    {
        $this->artisan('moonshine:install');
        $this->artisan('config:clear');
        $this->artisan('view:clear');
        $this->artisan('cache:clear');

        $this->refreshApplication();
        $this->loadLaravelMigrations();
        $this->loadMigrationsFrom(realpath('./database/migrations'));

        return $this;
    }

    protected function resolveFactories(): static
    {
        Factory::guessFactoryNamesUsing(static function ($factory) {
            $factoryBasename = class_basename($factory);

            return "MoonShine\Database\Factories\\$factoryBasename".'Factory';
        });

        return $this;
    }

    protected function superAdminAttributes(): array
    {
        return [
            'moonshine_user_role_id' => MoonshineUserRole::DEFAULT_ROLE_ID,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('test'),
        ];
    }

    protected function resolveSuperUser(): static
    {
        $this->adminUser = MoonshineUser::factory()
            ->create($this->superAdminAttributes())
            ->load('moonshineUserRole');

        return $this;
    }

    protected function adminUser(): Model|Builder|Authenticatable
    {
        return $this->adminUser;
    }

    protected function resolveTestResource(): static
    {
        $this->testResource = new MoonShineUserResource();

        return $this;
    }

    protected function testResource(): Resource
    {
        return $this->testResource;
    }

    protected function registerTestResource(): static
    {
        MoonShine::resources([
            $this->testResource(),
        ]);

        MoonShine::menu([
            MenuItem::make('Admins', $this->testResource()),
        ]);

        return $this;
    }

    protected function getPackageProviders($app): array
    {
        return [
            MoonShineServiceProvider::class,
        ];
    }
}
