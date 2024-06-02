<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PantryController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    $user->load('children');
    $user->load('family');
    $user->load('toyChests');

    return Inertia::render('Dashboard', [
        'user' => $user,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/child/{id}', function ($id) {
    $child = auth()->user()->children()->where('id', $id)->first();
    if ($child) {
        return Inertia::render('Child', [
            'child' => $child,
        ]);
    } else {
        return redirect()->route('dashboard')->with('error', 'Child not found');
    }
    
})->middleware(['auth', 'verified'])->name('child');

// Route for all pantries associated to a user's family
Route::get('/pantries', function () {
    $pantries = auth()->user()->pantries()->get();
    return Inertia::render('Pantries', [
        'pantries' => $pantries,
    ]);
})->middleware(['auth', 'verified'])->name('pantries');


// Route for specific pantry
Route::get('/pantries/{pantryId}', function (App\Models\Pantry $pantry) {
    
    if ($pantry) {
        return Inertia::render('Pantries', [
            'pantries' => $pantry,
        ]);
    } else {
        return redirect()->route('dashboard')->with('error', 'Pantry not found');
    }
    
})->middleware(['auth', 'verified'])->name('toyChest');

Route::get('/pantries/create', function () {
    return Inertia::render('CreatePantry');
})->middleware(['auth', 'verified'])->name('createPantry');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
