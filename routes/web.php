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

Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas');

Route::get('/ideas/{category}', [IdeaController::class, 'index_category'])->name('ideas_category');

Route::get('/considering', [IdeaController::class, 'index_considering'])->name('considering');

Route::get('/considering/{category}', [IdeaController::class, 'index_considering_category'])->name('considering_category');

Route::get('/closed', [IdeaController::class, 'index_closed'])->name('closed');

Route::get('/closed/{category}', [IdeaController::class, 'index_closed_category'])->name('closed_category');

Route::get('/inprogress', [IdeaController::class, 'index_inprogress'])->name('inprogress');

Route::get('/inprogress/{category}', [IdeaController::class, 'index_inprogress_category'])->name('inprogress_category');

Route::get('/implemented', [IdeaController::class, 'index_implemented'])->name('implemented');

Route::get('/implemented/{category}', [IdeaController::class, 'index_implemented_category'])->name('implemented_category');

Route::get('/show/ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea');

Route::post('/ideas/{idea}', [IdeaController::class, 'store'])->name('vote');

Route::post('/ideas_create', [IdeaController::class, 'create'])->name('create');

Route::get('/index_ideas', [IdeaController::class, 'index_ideas'])->name('index.ideas');

// Route::middleware(['auth:sanctum', 'verified'])->get('/ideas', function () {
//     return Inertia::render('Ideas');
// })->name('dashboard');


