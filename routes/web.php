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
Route::post('/residents/insert_residents_data', [HomeController::class, 'insert_residents_data'])->name('insert_residents_data');
Route::get('/residents/delete_residents_data', [HomeController::class, 'delete_residents_data'])->name('delete_residents_data');
Route::get('/residents/search_residents_data', [HomeController::class, 'search_residents_data'])->name('search_residents_data');



//取得person頁面
Route::get('/person', [HomeController::class, 'person_data'])->name('person_data');
Route::get('/person/get_date_data', [HomeController::class, 'get_date_data'])->name('get_date_data');
Route::post('/person/edit_person_data', [HomeController::class, 'edit_person_data'])->name('edit_person_data');
Route::post('/person/insert_person_data', [HomeController::class, 'insert_person_data'])->name('insert_person_data');
//person_ordinary
Route::get('/person_ordinary_data', [HomeController::class, 'person_ordinary_data'])->name('person_ordinary_data');
Route::get('/person_ordinary/get_ordinary_date_data', [HomeController::class, 'get_ordinary_date_data'])->name('get_ordinary_date_data');



