<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserSignupRequest;
use App\Models\User;

use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function  __construct( public UserServices $userServices){

    }
    public function login(Request $request)
    {
        $data=$request->all();
       return $this->userServices->handleLogin($data);

    }
    public function signup(UserSignupRequest $request)
    {
        $data=$request->all();
       return $this->userServices->HandleSignUp($data);
    }
    public function logout(){
        return $this->userServices->handleLogout();
    }
}
