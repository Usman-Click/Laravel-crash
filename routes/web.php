<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get("/", function () {
    return view("listings", [
        'listings' => Listing::getAll(),
    ]);
});

Route::get("/listings/{id}", function ($id) {
    return View("listing", [
        "listing" => Listing::get($id),
    ]);
});
