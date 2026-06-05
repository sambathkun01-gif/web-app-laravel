<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\autocomplete;
use App\Http\Controllers\CategoryController;

//1. Basic Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

//2. Route Parameters
Route::get('/user/{id}',function ($id){
    return ("user id is .$id");
});

Route::get('/post/{slug}',function ($slug='defualt-post'){
    return ("post slug is .$slug");
});

//3. Named Routes
Route::get('/dashboard', function () {
    return ('dashboard');
})->name('dashboard');

// Generating URL for named route
Route::get('/test',function (){
    $route = route('dashboard');
    return  "The URL for the dashboard route is: . $route"; 
});

//4. Route Groups
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Admin Users';
    });

    Route::get('/posts', function () {
        return 'Admin Posts';
    });
});
//5. Middleware groups
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

//6. Controller Routes
Route::get('/user/{id}', [UserController::class, 'show']);

//7. Fallback Route
Route::fallback(function () {
return response()->view('errors.404', [], 404);
});
Route::get('/category', [CategoryController::class, 'index'])->name("category.list");
Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");
Route::post('/category', [CategoryController::class, 'store'])->name("category.store");
Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category. ');
Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');
Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");





