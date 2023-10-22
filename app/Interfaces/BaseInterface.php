<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface BaseInterface
{
    public function create(array $data);
    public function getAll(Request $request);
}
