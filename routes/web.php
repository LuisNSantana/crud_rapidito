<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class,'index']);

//un controlador es el archivo o clase donde tenemos nuestra logica , lo que va hacer cuando llegue a esa ruta.
//le damos nombre  a esta ruta
Route::post('store', [UserController::class, 'store'])->name('users.store');
Route::delete('users/{user}', [UserController::class,'destroy'])->name('users.destroy');


//cada @ es un metodo 