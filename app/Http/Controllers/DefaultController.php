<?php

namespace App\Http\Controllers;

use App\Models\User;
use function view;

class DefaultController extends Controller
{
    public function index(){
        return view('backend.default.index');
    }

    public function login(){
        return view('backend.default.login');
    }

}
