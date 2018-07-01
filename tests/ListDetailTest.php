<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ListDetailTest extends TestCase
{
    public function testList()
    {
        $response = $this->call('GET', '/list');

        $this->assertEquals(200, $response->status());
    }

    public function testDetail()
    {
        $response = $this->call('GET', '/detail/1');

        $this->assertEquals(200, $response->status());
    }

    public function testDetailAutoId()
    {
        $response = $this->call('GET', '/detail');

        $this->assertEquals(200, $response->status());
    }

    public function testAuthLogin()
    {
        $response = $this->call('POST', '/auth/login');

        $this->assertEquals(422, $response->status());
    }

    public function testAuthUsers()
    {
        $response = $this->call('POST', '/users');

        $this->assertEquals(405, $response->status());
    }

    public function testAuthList()
    {
        $response = $this->call('POST', '/auth/list');

        $this->assertEquals(405, $response->status());
    }

    public function testAuthDetail()
    {
        $response = $this->call('POST', '/auth/detail/1');

        $this->assertEquals(405, $response->status());
    }
}
