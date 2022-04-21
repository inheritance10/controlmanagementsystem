<?php

namespace App\Http\Controllers;

use function view;

class DefaultController extends Controller
{
    public function index(){
        return view('backend.default.index');
    }

}
