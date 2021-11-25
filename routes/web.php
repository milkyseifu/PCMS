<?php

use App\Http\Controllers\PersonTypeController;
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

// Route::get('/', function () {
//     return view('front.home');
// });

Route::get('/', [App\Http\Controllers\PcController::class, 'home'])->name('pc.home');

// Route::resource('pc', App\Http\Controllers\PcController::class);
Route::get('pc', [App\Http\Controllers\PcController::class, 'index'])->name('pc.index');
Route::get('pc/student', [App\Http\Controllers\PcController::class, 'student'])->name('student.index');
Route::get('pc/staff', [App\Http\Controllers\PcController::class, 'staff'])->name('staff.index');
Route::get('pc/other', [App\Http\Controllers\PcController::class, 'other'])->name('other.index');
Route::get('pc/create', [App\Http\Controllers\PcController::class, 'create'])->name('pc.create');
Route::post('pc', [App\Http\Controllers\PcController::class, 'store'])->name('pc.store');

Route::get('/searchpc', [App\Http\Controllers\PcController::class, 'searchpc']);
Route::get('pc/search', [App\Http\Controllers\PcController::class, 'search'])->name('pc.search');
Route::resource('person/type', PersonTypeController::class);