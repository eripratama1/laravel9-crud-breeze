<?php

use App\Http\Controllers\BookController;
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

// Setup route middleware untuk route dashboard dan books yang mana untuk
// mengakses route tersebut harus melakukan autentifikasi terlebih dahulu
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

   Route::resource('books',(BookController::class));

    
});
require __DIR__.'/auth.php';
