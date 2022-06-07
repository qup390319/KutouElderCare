<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

//取得登入介面
Route::get('/', [LoginController::class, 'get_login_page'])->name('get_login_page');
Route::post('/', [LoginController::class, 'post_login_page'])->name('post_login_page');

//取得搜尋頁面
//Route::get('/residents', [HomeController::class, 'residents_all'])->name('residents_all');
Route::get('/residents', [HomeController::class, 'all_people'])->name('all_people');

//取得person頁面
Route::get('/person', [HomeController::class, 'person_data'])->name('person_data');
