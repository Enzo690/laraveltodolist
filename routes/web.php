<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('tasks', TaskController::class)->middleware('auth');
Route::get('generate-pdf', [PDFController::class, 'pdf'])->name('generate-pdf');


Route::resource('contacts', ContactController::class);
Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::delete('contacts/force/{id}', [ContactController::class, 'forceDestroy'])->name('contacts.force.destroy');
Route::put('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
