<?php

declare(strict_types=1);

namespace MoonShine\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MoonShine\Commands\InstallCommand;
use MoonShine\Commands\ResourceCommand;
use MoonShine\Commands\UserCommand;
use MoonShine\Dashboard\Dashboard;
use MoonShine\Http\Middleware\Authenticate;
use MoonShine\Http\Middleware\ChangeLocale;
use MoonShine\Http\Middleware\Session;
use MoonShine\Menu\Menu;
use MoonShine\MoonShine;
use MoonShine\Utilities\AssetManager;

class MoonShineServiceProvider extends ServiceProvider
{
    protected array $commands = [
        InstallCommand::class,
        ResourceCommand::class,
        UserCommand::class,
    ];

    protected array $routeMiddleware = [
        'moonshine.auth' => Authenticate::class,
        'moonshine.session' => Session::class,
    ];

    protected array $middlewareGroups = [
        'moonshine' => [
            'moonshine.auth',
            ChangeLocale::class,
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->loadAuthConfig();

        $this->registerRouteMiddleware();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        if (config('moonshine.auth.enable', true)) {
            $this->loadMigrationsFrom(MoonShine::path('/database/migrations'));
        }

        $this->loadTranslationsFrom(MoonShine::path('/lang'), 'moonshine');
        $this->loadViewsFrom(MoonShine::path('/resources/views'), 'moonshine');
        $this->loadRoutesFrom(MoonShine::path('/routes/moonshine.php'));

        $this->publishes([
            MoonShine::path('/config/moonshine.php') => config_path('moonshine.php'),
        ]);

        $this->mergeConfigFrom(
            MoonShine::path('/config/moonshine.php'),
            'moonshine'
        );

        $this->publishes([
            MoonShine::path('/public') => public_path('vendor/moonshine'),
        ], ['moonshine-assets', 'laravel-assets']);

        $this->publishes([
            MoonShine::path('/lang') => $this->app->langPath('vendor/moonshine'),
        ]);

        $this->publishes([
            MoonShine::path('/stubs/MoonShineServiceProvider.stub') => app_path(
                'Providers/MoonShineServiceProvider.php'
            ),
        ], 'moonshine-provider');

        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }

        Blade::withoutDoubleEncoding();
        Blade::componentNamespace('MoonShine\Components', 'moonshine');

        $this->app->singleton(MoonShine::class);
        $this->app->singleton(Menu::class);
        $this->app->singleton(Dashboard::class);
        $this->app->singleton(AssetManager::class);
    }

    /**
     * Setup auth configuration.
     *
     * @return void
     */
    protected function loadAuthConfig(): void
    {
        config(Arr::dot(config('moonshine.auth', []), 'auth.'));
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware(): void
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        $this->middlewareGroups['moonshine'] = array_merge(
            $this->middlewareGroups['moonshine'],
            config('moonshine.middlewares', [])
        );

        foreach ($this->middlewareGroups as $key => $middleware) {
            app('router')->middlewareGroup($key, $middleware);
        }
    }
}
