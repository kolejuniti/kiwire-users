<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserViewController;

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

Route::get('users','UserController@view_user');
Route::post('users','UserController@insert_user');
Route::get('users/{id}','UserController@delete_user');