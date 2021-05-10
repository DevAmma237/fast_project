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


Route::middleware(['auth:sanctum', 'verified'])->get('/', 'DashbordController@index')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'DashbordController@index')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/changeTheme', 'AppController@changeTheme');
Route::prefix('profile')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/', 'AppController@getProfile');
    Route::middleware(['auth:sanctum', 'verified'])->get('/security', 'AppController@getProfilesecurity');
    Route::middleware(['auth:sanctum', 'verified'])->post('/updateName', 'AppController@setName');
    Route::middleware(['auth:sanctum', 'verified'])->post('/updateEmail', 'AppController@setEmail');
    Route::middleware(['auth:sanctum', 'verified'])->post('/updateTel', 'AppController@setPhone');
    Route::middleware(['auth:sanctum', 'verified'])->post('/updateDate', 'AppController@setDateNaissance');
    Route::middleware(['auth:sanctum', 'verified'])->post('/updateAdresse', 'AppController@setAdresse');
    Route::middleware(['auth:sanctum', 'verified'])->post('/changepassword', 'ProfileController@update');
});
Route::middleware(['auth:sanctum', 'verified'])->post('/createProject', 'AppController@createProject');
Route::middleware(['auth:sanctum', 'verified'])->get('/DetailProject/{id}', 'DetailController@actionProject')->WhereNumber('id');
Route::middleware(['auth:sanctum', 'verified'])->get('/allTaches/{id}', 'DetailController@allTaches')->WhereNumber('id');
Route::middleware(['auth:sanctum', 'verified'])->post('/createTache', 'DetailController@createTache')->WhereNumber('id');




Route::middleware(['auth:sanctum', 'verified'])->get('/detail', function () {
    return view('detail');
})->name('detail');
