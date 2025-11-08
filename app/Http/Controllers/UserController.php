<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        // Hash pwd
        $formFields['password'] = bcrypt($formFields['password']);

        // create user
        $user = User::create($formFields);

        //log user in
        Auth::login($user);

        return redirect('/')->with('success', 'User create sucessfully');
    }


    public function destroy()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'User logout sucessfully');
    }
}
