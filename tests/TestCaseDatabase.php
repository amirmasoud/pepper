<?php

declare(strict_types=1);

namespace Tests;

use Tests\Support\Traits\SqlAssertionTrait;

abstract class TestCaseDatabase extends TestCase
{
    use SqlAssertionTrait;

    protected function setUp(): void
    {
        parent::setUp();


        $this->loadMigrationsFrom(__DIR__ . '/Support/database/migrations');
        $this->withFactories(__DIR__ . '/Support/database/factories');

        // This takes care of refreshing the database between tests
        // as we are using the in-memory SQLite db we do not need RefreshDatabase
        $this->artisan('migrate');

        $this->artisan('pepper:grind', [
            '--all' => true
        ]);

        dd(config('graphql'));
    }

    protected function setUpTraits()
    {
        $uses = parent::setUpTraits();

        if (isset($uses[SqlAssertionTrait::class])) {
            $this->setupSqlAssertionTrait();
        }

        return $uses;
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('pepper.namespace', 'Pepper\Tests\Support\Models');
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
