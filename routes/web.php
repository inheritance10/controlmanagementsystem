<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;





require __DIR__.'/auth.php';




Route::namespace('Frontend')->group(function (){
    /*Route::get('/',[\App\Http\Controllers\Frontend\DefaultController::class,'index'])
    ->name('home.index');*/

    Route::get('layout',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home.index');
    Route::get('/project/{slug}',[\App\Http\Controllers\Frontend\HomeController::class,'detail'])
        ->name('project.detail');
    //FrontEnd Blog Route
    Route::get('/blog',[\App\Http\Controllers\Frontend\BlogController::class,'index'])
        ->name('blogs.index');

    Route::get('/blog/{slug}',[\App\Http\Controllers\Frontend\BlogController::class,'detail'])
        ->name('blogs.detail');

    //Page Route
    Route::get('/page/{slug}',[\App\Http\Controllers\Frontend\PageController::class,'detail'])
    ->name('page.detail');

    //Contact Route

    Route::get('/contact',[\App\Http\Controllers\Frontend\DefaultController::class,'contact'])
        ->name('contact.detail');



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








