<?php

namespace App\Http\Controllers;

use function view;

class SettingsController extends Controller
{
    public function index(){
        return view('backend.settings.index');
    }


}
