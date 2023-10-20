<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{

    public function create(array $data)
    {
    }

    public function getAll()
    {
        return "hello from repository";
    }

    public function update($id, array $data)
    {
    }

    public function delete($id)
    {
    }
}
