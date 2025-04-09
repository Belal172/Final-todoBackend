<?php

namespace App\Services;

use App\Interfaces\UserInterface;

class UserServices
{
    /**
     * Create a new class instance.
     */
    public function __construct( protected UserInterface $userInterface)
    {
        //
    }
    public function handleLogin($data){
    return $this->userInterface->login($data);
    }
    public function HandleSignUp($data) {
       return $this->userInterface->signup($data); 
    }
    public function handleLogout(){
        return $this->userInterface->logout();
    }
}
