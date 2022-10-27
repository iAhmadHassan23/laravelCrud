<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'view']);
Route::get('/add-contact', [ContactController::class, 'add_contact_view']);
Route::post('/add-contact', [ContactController::class, 'add_contact']);
Route::post('/update-contact', [ContactController::class, 'update_contact']);
Route::post('/check-email', [ContactController::class, 'check_email']);
Route::post('/check-phone', [ContactController::class, 'check_phone']);
Route::get('/edit/{id}', [ContactController::class, 'edit_contact']);
Route::get('/delete/{id}', [ContactController::class, 'delete_contact']);

// Search Routes
// Route::