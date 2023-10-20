<?php

namespace App\Interfaces;

interface BaseInterface
{
    public function create(array $data);
    public function getAll();
    public function update($id, array $data);
    public function delete($id);
}
