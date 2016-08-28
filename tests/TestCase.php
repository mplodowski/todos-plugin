<?php

namespace Renatio\Todos\Tests;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factory;
use PluginTestCase;

/**
 * Class TestCase
 * @package Renatio\Todos\Tests
 */
class TestCase extends PluginTestCase
{

    /**
     * @var string
     */
    protected $baseUrl = 'http://oc-todos-plugin.app';

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->changeDefaultFactoriesPath();
    }

    /**
     * @return void
     */
    protected function changeDefaultFactoriesPath()
    {
        $this->app->singleton(Factory::class, function () {
            $faker = $this->app->make(Generator::class);

            return Factory::construct($faker, base_path('plugins/renatio/todos/tests/factories'));
        });
    }

}