<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Listtings
Route::get(
    "/",
    [ListingController::class, "index"]
);

Route::get(
    "/listings/create",
    [ListingController::class, "create"]
);


Route::post(
    "/listings",
    [ListingController::class, "store"]
);

// Manage authenticated user listings
Route::get(
    "/listings/manage",
    [ListingController::class, "manage"]
);


Route::get(
    "/listings/{id}",
    [ListingController::class, "show"]
);


// User

// Show create user form
Route::get(
    "/users/create",
    [UserController::class, "create"]
);

// Store user data
Route::post(
    '/users',
    [UserController::class, 'store']
);

// Log user out
Route::post(
    '/users/logout',
    [UserController::class, 'destroy']
);


// Show login form  
Route::get(
    '/users/login',
    [UserController::class, 'login']
);

// auth user
Route::post(
    '/users/auth',
    [UserController::class, 'auth']
);
