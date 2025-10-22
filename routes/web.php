<?php

namespace App\Models;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get("/", function () {
    return view("listings", [
        'listings' => Listing::get(),
    ]);
});

Route::get("/listings/{id}", function ($id) {
    $listing = Listing::find($id);
    if ($listing) {
        return View("listing", [
            "listing" => $listing,
        ]);
    } else {
        abort("404");
    }
});
