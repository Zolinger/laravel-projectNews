<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_category_example()
    {
        $response = $this->get('/category');

        $response->assertStatus(200);
    }

    public function test_admin_example()
    {
        $response = $this->get('/admin');

        $response->assertStatus(200);
    }
}
