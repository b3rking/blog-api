<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use HttpResponses;

    public function login() {
        return 'this is my login endpoint';
    }
    
    public function register() {
        return response(['this is my register method']);
    }

    public function logout() {
        return response(['logged of succesfully']);
    }
}
