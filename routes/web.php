<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\SchooLevelController;
use App\Http\Controllers\StudentController;
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

Route::controller(AuthController::class)
->middleware('guest')
->group(function(){

    Route::get('/login','LoginForm')->name('login');

    Route::get('/registration','registerForm')->name('registerForm');
   
    Route::post('/register','register')->name('register');
    
    Route::post('/authenticate','authenticate')->name('authenticate');
    
});

Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/',function(){
        return inertia('Home');
    })->name('home');

    Route::post('/login',[AuthController::class,'logout'])->name('logout');
    
    // students
    Route::controller(StudentController::class)
    ->name('student.')
    ->prefix('students')
    ->group(function(){
    
        route::get('','index')->name('index');
        route::get('create','create')->name('create');
        route::get('edit/{id}','edit')->name('edit');
        route::put('update/{id}','update')->name('update');
        route::post('store','store')->name('store');
        route::put('update/{id}','update')->name('update');

        route::delete('delete/{id}','destroy')->name('destroy');
    });


    // school level
    Route::controller(SchooLevelController::class)
    ->name('schoolevel.')
    ->prefix('schoolevel')
    ->group(function(){
        route::get('','index')->name('index');
        route::get('create','create')->name('create');
        route::get('edit/{id}','edit')->name('edit');
        route::post('store','store')->name('store');
        route::put('update/{id}','update')->name('update');
        route::delete('delete/{id}','destroy')->name('destroy');
    });

});