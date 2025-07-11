<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\AdminAuthController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/events/propose', [EventRequestController::class, 'proposeEvent'])->name('events.propose');
Route::post('/events/propose', [EventRequestController::class, 'storeProposedEvent'])->name('events.propose');

// User Auth
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register']);
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login']);
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Admin Auth
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

//Route::get('/admin/Events',[AdminAuthController::class, 'event-card'])->name('admin.event-card');

Route::get('/test', function () {
    return view('test.test');
});
//Admin web
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard/events/requests/{id}/edit', [AdminController::class, 'editProposeEvent'])->name('admin.dashboard.events.requests.edit');
    //Events view route
    Route::get('/events', [AdminController::class, 'events'])->name('admin.events');

    Route::put('/dashboard/events/requests/{id}/edit', [EventRequestController::class, 'updateProposedEvent'])->name('admin.dashboard.events.requests.edit');

    Route::patch('/dashboard/events/requests/{id}/approve', [EventRequestController::class, 'approve'])->name('admin.dashboard.events.requests.approve');
    Route::patch('/dashboard/events/requests/{id}/reject', [EventRequestController::class, 'reject'])->name('admin.dashboard.events.requests.reject');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get('/events/saved', [HomeController::class, 'savedEvents'])->name('events.saved');
    Route::post('/events/{id}/save', [EventRequestController::class, 'saveEvent'])->name('events.save');
    
});
