<?php

namespace App\Interfaces;

interface TodoInterface
{
    public function index($id);
    
    public function store(array $data);
    public function update(array $data, $id);
    public function destroy($id);
}
