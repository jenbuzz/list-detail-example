<?php

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
}
