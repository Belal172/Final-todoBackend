<?php

namespace App\services;

use App\Interfaces\TodoInterface;

class TodoServices
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected TodoInterface $todoInterface)
    {
        //
    }
    public function ShowTodo($id)
    {
        return $this->todoInterface->index($id);
    }
    public function addTodo(array $data)
    {
        return $this->todoInterface->store($data);
    }

    public function update(array $data, $id)
    {
        return $this->todoInterface->update($data, $id);
    }
    public function destroy($id)
    {
        return $this->todoInterface->destroy($id);
    }
}
