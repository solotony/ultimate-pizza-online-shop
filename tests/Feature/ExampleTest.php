<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends \Tests\TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRootOK()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testCategoryOK()
    {
        $response = $this->get('/1/');
        $response->assertStatus(200);
    }


    public function testProductOK()
    {
        $response = $this->get('/1/8/');
        $response->assertStatus(200);
    }
}
