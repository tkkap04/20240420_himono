<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RegistLoginController extends Controller
{

    public function register(UserAdminRequest $request){
    User::create($request->all());
    return redirect('login');
    }


    public function login(UserAdminRequest $request){
    return redirect('/login');
    }

}
