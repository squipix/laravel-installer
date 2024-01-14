<?php

namespace Squipix\LaravelInstaller\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Squipix\LaravelInstaller\Middleware\canInstall;
use Squipix\LaravelInstaller\Middleware\canUpdate;
use Squipix\LaravelInstaller\Middleware\SettingsMiddleware;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->publishFiles();
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
    }

    /**
     * Bootstrap the application events.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        $router->middlewareGroup('install', [CanInstall::class]);
        $router->middlewareGroup('update', [CanUpdate::class]);
        if (config('installer.core.check_settings_table')) {
            $router->middlewareGroup('', [SettingsMiddleware::class]);
        }
    }

    /**
     * Publish config file for the requirements.
     *
     * @return void
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../Config/installer.php' => base_path('config/installer.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../assets' => public_path('installer'),
            __DIR__ . '/../Lang' => base_path('resources/lang'),
        ], 'laravelinstaller');

        $this->loadViewsFrom(__DIR__ . '/../Views', 'installer');
        
        $this->mergeConfigFrom(
            __DIR__. '/../Config/installer.php',
            'installer'
        );
        
    }
}
