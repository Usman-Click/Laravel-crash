<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class ListingController extends Controller
{
    // show all 
    public function index()
    {
        return view("listings.index", [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get(),
        ]);
    }

    // show single 
    public function show($id)
    {
        $listing = Listing::find($id);
        if ($listing) {
            return View("listings.show", [
                "listing" => $listing,
            ]);
        } else {
            abort("404");
        }
    }

    // Create a listing
    public function create()
    {
        return View("listings.create");
    }

    // Store listing
    public  function store(Request $req)
    {
        $formFields = $req->validate([
            'title' => 'required',
            "mail" => ['required', 'email'],
            "website" => 'required',
            "company" => ['required', Rule::unique('listings', 'company')],
            "tags" => 'required',
            "description" => 'required',
        ]);

        Listing::create($formFields);

        return redirect('/');
    }
}
