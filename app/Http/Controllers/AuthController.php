<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {

        // Validate the input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();


            $userType = Auth::user()->TypeUser;


            if ($userType === 'admin') {
                return view('Backoffice.Dashboard');
            } elseif ($userType === 'etudiant') {
                return view('Frontoffice.ProfilEtudiant');
            }


            return redirect()->intended('/');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }



    public function showRegistrationForm()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

      return view('Auth.login');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
