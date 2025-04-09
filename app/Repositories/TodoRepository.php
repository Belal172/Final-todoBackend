<?php

namespace App\Repositories;

use App\Interfaces\TodoInterface;
use App\Models\Todo;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class TodoRepository implements TodoInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(public Todo $todomodel, public User $usermodel)
    {
        //
    }

    public function index($id)
    {
        try {
            // $user = $this->usermodel->findOrFail($id);
            // dd($user);
            $list = $this->usermodel->findOrFail($id)->todos;
            return response()->json($list);
        } catch (Exception $e) {
            Log::error("Error retrieving todos: " . $e->getMessage());
            return response()->json(['error' => 'Failed to retrieve todos'], 500);
        }
    }

    public function store(array $data)
    {
        try {
            $created= $this->todomodel->create($data);
       return response()->json(['success' => true, 'data' => $created, 'message' => 'Task created successfully']);
    
        } catch (Exception $e) {
            Log::error("Error creating todo: " . $e->getMessage());
            return response()->json(['error' => 'Failed to create todo'], 500);
        }
    }

    public function update(array $data, $id)
    {
        try {
            $todo = $this->todomodel->findOrFail($id);
            $todo->update($data);
            return response()->json(['success' => true, 'data' => $todo, 'message' => 'Task updated successfully']);
        } catch (Exception $e) {
            Log::error("Error updating todo: " . $e->getMessage());
            return response()->json(['error' => 'Failed to update todo'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $todo = $this->todomodel->findOrFail($id);
            $todo->delete();
            return response()->json(['success' => true, 'data' => $todo, 'message' => 'Task deleted successfully']);
        } catch (Exception $e) {
            Log::error("Error deleting todo: " . $e->getMessage());
            return response()->json(['error' => 'Failed to delete todo'], 500);
        }
    }
}