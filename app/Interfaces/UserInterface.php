<?php

namespace App\Interfaces;

interface UserInterface
{
    public function login(array $data);
    public function signup(array $data);
    public function logout();
}
