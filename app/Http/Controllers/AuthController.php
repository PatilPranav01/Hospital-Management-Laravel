<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle the registration of users
    public function register(Request $request)
{
    // Validate the request data, including the role
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:user,doctor,nurse', // Ensure role is validated
    ]);

    // Log the incoming role value (for debugging purposes)
    Log::info('Role from Request:', ['role' => $request->role]);

    // Create a new user with the selected role
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role, // Store the role from the form
    ]);

    // Log the user creation (for debugging purposes)
    Log::info('New User Created:', $user->toArray());

    // Log the user in
    Auth::login($user);

    // Redirect to login with success message
    return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
}


    

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login logic
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('profile');
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);
}


    // Show the profile page for the logged-in user
    public function showProfile()
    {
        return view('auth.profile');
    }

    // Handle the logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

