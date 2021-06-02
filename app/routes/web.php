<?php

use App\Http\Controllers\BiodataController;
use App\Http\Controllers\InventoryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/contact')
    ->middleware('guest')
    ->name('contact');

// Home

Route::get('/index', [InventoryController::class, 'index'])
    ->middleware(['auth'])
    ->name('index');

// Laporan
Route::get('/laporan', [InventoryController::class, 'show'])
    ->middleware(['auth'])
    ->name('laporan');

// Route::post('/laporan', function () {
//     return view('cores.laporan');
// })->middleware(['auth'])->name('laporan');

// Transpage
Route::get('/transpage', [InventoryController::class, 'transpage'])
    ->middleware(['auth'])
    ->name('transpage');

Route::post('/transpage', function () {
    return view('cores.transpage');
})->middleware(['auth'])->name('transpage');


// Add Item
Route::get('/addItem', [InventoryController::class, 'create'])
    ->middleware(['auth'])
    ->name('addItem');

Route::post('/addItem', [InventoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('addItem');

// backup
Route::get('/backup', function () {
    return view('cores.backup');
})->middleware(['auth'])->name('backup');

Route::post('/backup', function () {
    return view('cores.backup');
})->middleware(['auth'])->name('backupandrestore');

Route::get('/download', [InventoryController::class, 'download']);

// Biodata
Route::get('/biodata', [BiodataController::class, 'show'])->middleware(['auth'])->name('biodata');

// edit biodata
Route::get('/editbiodata', [BiodataController::class, 'edit'])
    ->middleware(['auth'])
    ->name('editbiodata');
Route::post('/editbiodata', [BiodataController::class, 'update'])
    ->middleware(['auth'])
    ->name('editbiodata');

// Route::post('/biodata', function () {
//     return view('cores.biodata');
// })->middleware(['auth'])->name('biodata');

require __DIR__ . '/auth.php';
