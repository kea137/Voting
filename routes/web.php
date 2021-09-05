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

Route::get('/', function(){
    return redirect()->to(route('ideas'));
});

Route::get('/ideas/{category?}/{filter?}', [IdeaController::class, 'index'])->name('ideas');

Route::get('/considering/{category?}/{filter?}', [IdeaController::class, 'index_considering'])->name('considering');

Route::get('/closed/{category?}/{filter?}', [IdeaController::class, 'index_closed'])->name('closed');

Route::get('/inprogress/{category?}/{filter?}', [IdeaController::class, 'index_inprogress'])->name('inprogress');

Route::get('/implemented/{category?}/{filter?}', [IdeaController::class, 'index_implemented'])->name('implemented');

Route::put('/ideas/status_update', [IdeaController::class, 'update'])->name('update');

Route::get('/show/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea');

Route::post('/ideas/{idea}', [IdeaController::class, 'store'])->name('vote');

Route::put('/ideas/{idea}', [IdeaController::class, 'edit'])->name('edit');

Route::post('/ideas_create', [IdeaController::class, 'create'])->name('create');

Route::get('/index_ideas', [IdeaController::class, 'index_ideas'])->name('index.ideas');

// Route::middleware(['auth:sanctum', 'verified'])->get('/ideas', function () {
//     return Inertia::render('Ideas');
// })->name('dashboard');


