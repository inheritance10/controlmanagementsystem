<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('admin',[DefaultController::class,'index'])
    ->name('admin.index');


Route::get('admin/settings',[SettingsController::class,'index'])
    ->name('settings.index');





