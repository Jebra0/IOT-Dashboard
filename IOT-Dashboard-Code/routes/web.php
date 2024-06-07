<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\LogUserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/login');
});

//for test/////////////////////////////////
Route::get('/demo-request', function() {
    return response()->json(Auth::user());
});
Route::post('/demo-post', function (Request $request) {
    log::debug($request);
});
/////////////////////////////////////////////
///////////// Dashboard ////////////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', LogUserActivity::class])->name('dashboard');

Route::get('/dashData', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified']);
/////////////////////////////////////////////
///////////// Analytics ////////////////
Route::get('/analytics', function () {
    return view('analytics');
})->middleware(['auth', 'verified'])->name('analytics');
/////////////////////////////////////////////
///////////// Actions Log ////////////////
Route::get('/actions', function () {
    return view('actions');
})->middleware(['auth', 'verified'])->name('actions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
