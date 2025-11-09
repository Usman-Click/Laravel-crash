<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // show all 
    public function index()
    {
        return view("listings.index", [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->Paginate(6),
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

        if ($req->hasFile('logo')) {
            $formFields['logo'] = $req->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = Auth::user()->id;

        Listing::create($formFields);

        return redirect('/')->with('success', 'Listing created successfully');
    }


    public function manage()
    {
        return view('listings.manage', [
            'listings' => Auth::user()->listings,

        ]);
    }


    public function edit($id)
    {
        $listing = Listing::find($id);
        if ($listing) {
            return view('listings.edit', [
                'listing' => $listing,

            ]);
        } else {
            abort("404");
        }
    }

    public function update(Request $req, $id)
    {
        $formFields = $req->validate([
            'title' => 'required',
            "mail" => ['required', 'email'],
            "website" => 'required',
            "company" => 'required',
            "tags" => 'required',
            "description" => 'required',
        ]);

        if ($req->hasFile('logo')) {
            $formFields['logo'] = $req->file('logo')->store('logos', 'public');
        }

        $listing = Listing::find($id);

        $listing->update($formFields);

        return redirect('/')->with('success', 'Listing updated successfully');
    }
}
