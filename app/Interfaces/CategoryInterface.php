<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryInterface extends BaseInterface
{
    public function update(Category $category, array $data);
    public function delete(Category $category);
}
