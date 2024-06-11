<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/login');
});

//for test//////////////////////////////////
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashData', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified']);

Route::get('/get-users', [DashboardController::class, 'get_users']);

Route::delete('/destroy-user/{user}', [DashboardController::class, 'destroy_user']);
/////////////////////////////////////////////
///////////// Analytics ////////////////

Route::get('/analytics', function () {
    return view('analytics');
})->middleware(['auth', 'verified'])->name('analytics');

Route::get('/get-dates/{date?}', [AnalyticsController::class, 'getDays']);

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
