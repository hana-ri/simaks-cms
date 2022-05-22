<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
    	return view('/register/index',[
    		'page' => 'register',
    	]);
    }

    public function store(Request $request)
    {
		
    	$validateData = $request->validate([
    		'name' => ['required', 'max:100'],
    		'username' => ['required', 'min:5', 'max:50', 'unique:users' ],
    		'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed']
    	]);

		// dd($validateData);

    	$validateData['password'] = bcrypt($validateData['password']);

		

    	User::create($validateData);

    	return redirect('/login')->with('success', 'Registration Successfully!');
    }
}
