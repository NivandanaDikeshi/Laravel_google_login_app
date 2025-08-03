<?php
namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User; // Add this line to import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Find existing user by Google ID
            $user = User::where('google_id', $google_user->id)->first();

            // If user not found, create a new one
            if (!$user) {
                $user = User::create([
                    'name'       => $google_user->name,
                    'email'      => $google_user->email,
                    'google_id'  => $google_user->id,
                    'password'   => bcrypt(Str::random(16)), // Default password
                ]);
            }

            // Log in the user
            Auth::login($user);

            return redirect('/home'); // Or wherever your dashboard is

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }
}

