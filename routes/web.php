<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Listtings
Route::get(
    "/",
    [ListingController::class, "index"]
);

// show create form
Route::get(
    "/listings/create",
    [ListingController::class, "create"]
)->middleware('auth');


// store listing
Route::post(
    "/listings",
    [ListingController::class, "store"]
)->middleware('auth');

// Manage authenticated user listings
Route::get(
    "/listings/manage",
    [ListingController::class, "manage"]
)->middleware('auth');

// show a listings
Route::get(
    "/listings/{id}",
    [ListingController::class, "show"]
);


// User

// Show create user form
Route::get(
    "/users/create",
    [UserController::class, "create"]
)->middleware('guest');

// Store user data
Route::post(
    '/users',
    [UserController::class, 'store']
)->middleware('guest');

// Log user out
Route::post(
    '/users/logout',
    [UserController::class, 'destroy']
);


// Show login form  
Route::get(
    '/users/login',
    [UserController::class, 'login']
)->name('login')->middleware('guest');

// auth user
Route::post(
    '/users/auth',
    [UserController::class, 'auth']
)->middleware('guest');
