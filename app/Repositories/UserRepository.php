<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\User;
use Hash;

class UserRepository implements UserInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct( public User $model)
    {
        //
    }
   public function login(array $data){
    $user = User::where('email', $data['email'])->first();
    if (!$user || !Hash::check($data['password'], $user->password)) {
        return ['result' => "user not found", "success" => false];
    }
    
    $success['token'] = $user->createToken('myapp')->plainTextToken;
    $user['name'] = $user->name;
    return ['success' => true, 'result' => $success, "message" => "User Logged in Successfully"];

    }
    public function signup(array $data){
        $user = $this->model->create($data);
        $success['token']=$user->createToken('myapp')->plainTextToken;
        return response()->json(['success' => true, 'data' => $success, 'message' => 'User registered successfully']);

    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response(['message' => 'Logged out successfully']);
    }

}
