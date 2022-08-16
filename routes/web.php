<?php
use App\Http\Controllers\ContactController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('home','home')->middleware('auth');
Route::view('login','auth.login')->middleware('guest')->name('login');
Route::get('/contact-us',[ContactController::class,'contact']);
Route::post('/sent-message',[ContactController::class,'sendEmail'])->name('contact.send');

