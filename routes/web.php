<?php

use App\Http\Controllers\Plan\AcceptPlanController;
use App\Http\Controllers\Plan\CancelPlanController;
use App\Http\Controllers\Plan\RecallPlanController;
use App\Http\Controllers\Plan\RejectPlanController;
use App\Http\Controllers\Plan\SubmitPlanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::put('/submit/{plan}', SubmitPlanController::class)->name('submit');
Route::put('/cancel/{plan}', CancelPlanController::class)->name('cancel');
Route::put('/recall/{plan}', RecallPlanController::class)->name('recall');
Route::put('/reject/{plan}', RejectPlanController::class)->name('reject');
Route::put('/accept/{plan}', AcceptPlanController::class)->name('accept');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
