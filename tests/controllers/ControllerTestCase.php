<?php

namespace Renatio\Todos\Tests\Controllers;

use Backend\Facades\BackendAuth;
use Backend\Models\User;
use Renatio\Todos\Tests\TestCase;

/**
 * Class ControllerTestCase
 * @package Renatio\Todos\Tests\Controllers
 */
class ControllerTestCase extends TestCase
{

    /**
     * @var
     */
    protected $user;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->loginUser();
    }

    /**
     * @return void
     */
    protected function loginUser()
    {
        $this->user = factory(User::class)->create();

        $this->user->setPermissionsAttribute(json_encode([
            'renatio.todos.access_todos' => 1,
        ]));

        BackendAuth::login($this->user);
    }

}