<?php

namespace App\Http\Controllers;

use App\Models\User;
use function view;

class DefaultController extends Controller
{
    public function index(){
        $role = User::get('role');
        return view('backend.default.index');
    }

}
