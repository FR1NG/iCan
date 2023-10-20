<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_category_creation(): void
    {
        $response = $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $response->assertStatus(201);
    }

    public function test_category_creation_duplicated_name(): void
    {
        $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $response = $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $response->assertStatus(422);
    }

    public function test_category_creation_with_parent(): void
    {
        $parent = $this->postJson('api/category', ['name' => 'newCategory']);
        $response = $this->postJson('api/category', ['name' => 'withParent', 'parent_id' => $parent->json()['data']['id']]);
        $response->assertStatus(201);
    }

    public function test_category_creation_unexisted_parent(): void
    {
        $response = $this->postJson('api/category', ['name' => 'newCategory', 'parent_id' => 100000000]);
        $response->assertStatus(422);
    }

    public function test_category_update(): void
    {
        $category = $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $result = $this->putJson('/api/category/'. $category->json()['data']['id'], ['name' => 'testCategoryUpdated']);
        $result->assertStatus(200);
    }

    public function test_category_delete(): void
    {
        $category = $this->postJson('api/category', ['name' => 'testCategoryOne']);
        $result = $this->delete('/api/category/'. $category->json()['data']['id']);
        $result->assertStatus(200);
    }
}
