<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\services\TodoServices;
use Auth;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(public TodoServices $todoServices)
    {

    }
    public function index()
    {
        return $this->todoServices->ShowTodo(Auth::id());

    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();
        return $this->todoServices->addTodo($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->todoServices->update($request->all(),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->todoServices->destroy($id);
    }
}
