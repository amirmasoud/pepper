<?php

namespace Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Pepper\PepperServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'VendorName\\Skeleton\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PepperServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_users_table.php.stub';
        $migration->up();
        */

        if (env('TESTS_ENABLE_LAZYLOAD_TYPES') === '1') {
            $app['config']->set('graphql.lazyload_types', true);
        }

        $app['config']->set('graphql.schemas.default', [
            'query' => [],
            'mutation' => [],
        ]);

        $app['config']->set('graphql.types', []);

        $app['config']->set('app.debug', true);
    }

    protected function clearCache()
    {
        $commands = ['clear-compiled', 'cache:clear', 'view:clear', 'config:clear', 'route:clear'];
        foreach ($commands as $command) {
            \Illuminate\Support\Facades\Artisan::call($command);
        }
    }
}
