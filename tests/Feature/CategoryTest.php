<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_category_creation(): void
    {
        $response = $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $response->assertStatus(201);
    }
}
