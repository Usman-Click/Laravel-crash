<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ListingController extends Controller
{
    // show all 
    public function index()
    {
        return view("listings.listings", [
            'listings' => Listing::get(),
        ]);
    }

    // show single 
    public function show($id)
    {
        $listing = Listing::find($id);
        if ($listing) {
            return View("listings.listing", [
                "listing" => $listing,
            ]);
        } else {
            abort("404");
        }
    }
}
