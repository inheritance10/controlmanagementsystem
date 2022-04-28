<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {

    Route::get('/dashboard',[DefaultController::class,'index'])
        ->name('admin.index')->middleware('admin');

    Route::get('/',[DefaultController::class,'login'])
        ->name('admin.login');

    Route::get('/logout',[DefaultController::class,'logout'])
        ->name('admin.logout');

    Route::post('/login',[DefaultController::class,'authenticate'])
        ->name('admin.authenticate');

});

Route::middleware(['admin'])->group(function (){
    Route::prefix('admin/settings')->group(function () {

        Route::get('/', [SettingsController::class, 'index'])
            ->name('settings.index');
        Route::post('/sortable', [SettingsController::class, 'sortable'])
            ->name('settings.Sortable');
        Route::get('/settings/delete/{id}', [SettingsController::class, 'Destroy']);
        Route::get('/settings/edit/{id}', [SettingsController::class, 'edit'])
            ->name('settings.edit');
        Route::post('/update/{id}', [SettingsController::class, 'update'])
            ->name('settings.update');
    });
});



Route::middleware(['admin'])->group(function (){
    Route::prefix('admin')->group(function () {
        //blog modülü
        Route::resource('blog', BlogController::class);

        Route::post('blog/sortable', [BlogController::class, 'sortable'])
            ->name('blog.Sortable');


        //Page modülü

        Route::resource('page', PageController::class);

        Route::post('page/sortable', [PageController::class, 'sortable'])
            ->name('page.Sortable');

        //Slider modülü

        Route::resource('slider', SliderController::class);

        Route::post('slider/sortable', [SliderController::class, 'sortable'])
            ->name('slider.Sortable');

        //Admin modülü

        Route::resource('user', UserController::class);

        Route::post('user/sortable', [UserController::class, 'sortable'])
            ->name('user.Sortable');
    });
});








