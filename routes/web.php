<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
Route::get('/show', function () {
    return Inertia::render('Show');
});

Route::get('/', [IdeaController::class, 'index'])->name('ideas');

Route::get('/ideas', [IdeaController::class, 'indexing_ideas'])->name('index.ideas');

Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea');

// Route::middleware(['auth:sanctum', 'verified'])->get('/ideas', function () {
//     return Inertia::render('Ideas');
// })->name('dashboard');


