<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get(
    "/listings/{id}",
    [ListingController::class, "show"]
);


Route::get(
    "/user/create",
    [UserController::class, "create"]
);

Route::post(
    '/users',
    [UserController::class, 'store']);

    
Route::post(
    '/users/logout',
    [UserController::class, 'destroy']);

