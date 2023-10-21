<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_create_product(): void
    {
        $response = $this->postJson('/api/product', ['name' => 'productOne', 'price' => 10, 'description' => 'testing create product']);
        $response->assertStatus(201);
    }

    public function test_create_with_category(): void
    {
        $category = $this->postJson('/api/category', ['name' => 'testCategory']);
        $response = $this->postJson('/api/product', [
            'name' => 'productOne',
            'price' => 10,
            'description' => 'testing create product',
            'categories' => [$category->json()['data']['id']]
        ]);
        $response->assertStatus(201);
    }


    public function test_create_with_multiple_categories(): void
    {
        $category1 = $this->postJson('/api/category', ['name' => 'testCategory']);
        $category2 = $this->postJson('/api/category', ['name' => 'testCategoryTwo']);
        $response = $this->postJson('/api/product', [
            'name' => 'productOne',
            'price' => 10,
            'description' => 'testing create product',
            'categories' => [$category1->json()['data']['id'], $category1->json()['data']['id']]
        ]);
        $response->assertStatus(201);
    }

    public function test_create_with_invalid_categoy(): void
    {
        $response = $this->postJson('/api/product', [
            'name' => 'productOne',
            'price' => 10,
            'description' => 'testing create product',
            'categories' => [1337]
        ]);
        $response->assertStatus(422);
    }
    public function test_create_with_duplicate_name(): void
    {
        $this->postJson('/api/product', [
            'name' => 'productOne',
            'price' => 10,
            'description' => 'testing create product',
        ]);
        $response = $this->postJson('/api/product', [
            'name' => 'productOne',
            'price' => 10,
            'description' => 'testing create product',
        ]);
        $response->assertStatus(422);
    }
}
