<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register (Request $request) {

        sleep(1);
        //validate
        $fields = $request->validate([
            'avatar' => ['file', 'nullable', 'max:900'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        //Upload file and store
        if ($request->hasFile('avatar')) {
            $fields['avatar'] = Storage::disk('public')->put('avatars', $request->avatar);
        }

        //register
        $user = User::create($fields);

        //login
        Auth::login($user);

        //redirect
        return redirect()->route('dashboard')->with('great' , 'Welcome to laravel Inertia Vue App!');
    }


    public function login(Request $request) {
        //Laravel Doc: https://laravel.com/docs/11.x/authentication#authenticating-users
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('great' , 'Welcome to laravel Inertia Vue App!');;
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request) {
        //Laravel Doc: https://laravel.com/docs/11.x/authentication#logging-out
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
