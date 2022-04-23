<?php
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BlogController;
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



Route::prefix('admin')->group(function () {
    Route::get('/',[DefaultController::class,'index'])
        ->name('admin.index');


    Route::get('/settings',[SettingsController::class,'index'])
        ->name('settings.index');

    Route::post('/sortable',[SettingsController::class,'sortable'])
        ->name('settings.Sortable');

    Route::get('/settings/delete/{id}',[SettingsController::class,'Destroy']);

    Route::get('/settings/edit/{id}',[SettingsController::class,'edit'])
        ->name('settings.edit');

    Route::post('/update/{id}',[SettingsController::class,'update'])
        ->name('settings.update');
});



Route::prefix('admin')->group(function (){
    Route::resource('blog',BlogController::class);
});






