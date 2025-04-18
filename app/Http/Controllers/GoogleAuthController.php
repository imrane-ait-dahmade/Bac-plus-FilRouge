<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to Google’s OAuth page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            logger($e->getMessage());
            return redirect('/')->with('error', 'Google authentication failed.');
        }

        // Check if the user already exists in the database
        $user = User::where('email', $user->email)->first();

        if ($user) {
            // Log the user in if they already exist
            Auth::login($user);
        } else {
            // Otherwise, create a new user and log them in
            $user = User::create([
                'name' => $user->name,
                'password' => bcrypt(Str::random(16)), // Set a random password
                'email_verified_at' => now()
            ]);
            Auth::login($user);
        }

        // Redirect the user to the dashboard or any other secure page

        switch ($user->role) {
            case 'admin':
                return to_route('admin_dashboard');
                case 'etudiant':
                    return to_route('etudiant_dashboard');

        }
    }

}
