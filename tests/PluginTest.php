<?php

namespace Renatio\Todos\Tests;

use Illuminate\Support\Facades\App;
use PluginTestCase;
use Renatio\Todos\Plugin;

/**
 * Class PluginTest
 * @package Renatio\Todos\Tests
 */
class PluginTest extends PluginTestCase
{

    /**
     * @var
     */
    protected $plugin;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->plugin = new Plugin(new App);
    }

    /** @test */
    public function it_provides_plugin_details()
    {
        $this->assertArrayHasKey('name', $this->plugin->pluginDetails());
        $this->assertArrayHasKey('description', $this->plugin->pluginDetails());
    }

    /** @test */
    public function it_registers_navigation()
    {
        $this->assertArrayHasKey('todos', $this->plugin->registerNavigation());
    }

    /** @test */
    public function it_registers_permissions()
    {
        $this->assertArrayHasKey('renatio.todos.access_todos', $this->plugin->registerPermissions());
    }

    /** @test */
    public function it_registers_mail_templates()
    {
        $this->assertArrayHasKey('renatio.todos::mail.new_reminder', $this->plugin->registerMailTemplates());
    }

}