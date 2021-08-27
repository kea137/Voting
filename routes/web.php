<?php

use App\Http\Controllers\IdeaController;
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

Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');

Route::get('/ideas/considering', [IdeaController::class, 'index_considering'])->name('considering');

Route::get('/ideas/inprogress', [IdeaController::class, 'index_inprogress'])->name('inprogress');

Route::get('/ideas/implemented', [IdeaController::class, 'index_implemented'])->name('implemented');

Route::get('/ideas/closed', [IdeaController::class, 'index_closed'])->name('closed');

Route::get('/index_ideas', [IdeaController::class, 'index_ideas'])->name('index.ideas');

Route::get('/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea');

Route::post('/ideas/{idea}', [IdeaController::class, 'store'])->name('vote');

Route::post('/ideas_create', [IdeaController::class, 'create'])->name('create');

// Route::middleware(['auth:sanctum', 'verified'])->get('/ideas', function () {
//     return Inertia::render('Ideas');
// })->name('dashboard');


