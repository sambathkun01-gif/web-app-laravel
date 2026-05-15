<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\autocomplete;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/user/{id}',function ($id){
    return ("user id is .$id");
});
Route::get('/post/{slug}',function ($slug='defualt-post'){
    return ("post slug is .$slug");
});

Route::get('/dashboard', function () {
    return ('dashboard');
})->name('dashboard');

Route::get('/test',function (){
    $route = route('dashboard');
    return  "The URL for the dashboard route is: . $route"; 
});

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Admin Users';
    });

    Route::get('/posts', function () {
        return 'Admin Posts';
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return 'User Profile';
    });
});
Route::get('/login',function (){
    return 'Login Page';
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/user/{id}', [UserController::class, 'show']);


Route::fallback(function () {
return response()->view('errors.404', [], 404);
});





