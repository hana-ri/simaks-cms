<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     /**
     * menangani halaman masuk.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('login/index', [
    		'page' => 'Login', 
    	]);
    }

     /**
     * menangani autentifikasi masuk.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
    	$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials['is_actived'] = 1;

        If(Auth::attempt($credentials)) {
        	$request->session()->regenerate();

        	return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

	/**
     * menangani autentifikasi keluar dengan mengacak sesi.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
    	Auth::logout();
 
	    $request->session()->invalidate();
	 
	    $request->session()->regenerateToken();
	 
	    return redirect('/');
    }
}
