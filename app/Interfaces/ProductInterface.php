<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function create(array $data);
    public function getAll();
    public function update($id, array $data);
    public function delete($id);
}
