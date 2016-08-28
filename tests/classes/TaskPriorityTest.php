<?php

namespace Renatio\Todos\Tests\Classes;

use PluginTestCase;
use Renatio\Todos\Classes\TaskPriority;

/**
 * Class TaskPriorityTest
 * @package Renatio\Todos\Tests\Classes
 */
class TaskPriorityTest extends PluginTestCase
{

    /** @test */
    public function it_returns_priority_options()
    {
        $this->assertCount(5, TaskPriority::options());
    }

    /** @test */
    public function it_returns_icon_for_given_priority()
    {
        $this->assertEquals('oc-icon-angle-double-down', TaskPriority::icon(5));
    }

    /** @test */
    public function it_returns_green_color_for_low_priority_tasks()
    {
        $this->assertEquals('#006400', TaskPriority::color(4));
    }

    /** @test */
    public function it_returns_red_color_for_high_priority_tasks()
    {
        $this->assertEquals('#cc0000', TaskPriority::color(2));
    }

    /** @test */
    public function it_returns_priority_icons()
    {
        $this->assertCount(5, TaskPriority::icons());
    }

}