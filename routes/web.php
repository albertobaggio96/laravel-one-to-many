<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectsController as AdminProjectsController;
use App\Http\Controllers\Guest\ProjectsController as GuestProjectsController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});

Route::prefix("guest")->name("guest.")->group(function(){
    Route::post('/projects/search', [GuestProjectsController::class, "search"])->name("search");
    Route::resource('/projects', GuestProjectsController::class);
});

Route::middleware(['auth', 'verified'])->prefix("admin")->name('admin.')->group(function(){
    Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");
    Route::post('/projects/search', [AdminProjectsController::class, "search"])->name("search");
    Route::get("/project/trashed",  [AdminProjectsController::class, "trashed"] )->name("trashed");
    Route::get("/project/{slug}/restore", [AdminProjectsController::class, "restore"])->name("restore");
    Route::delete("/project/{slug}/force-delete", [AdminProjectsController::class, "forceDelete"])->name("force-delete");
    Route::resource("/project", AdminProjectsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
