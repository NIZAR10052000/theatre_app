<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MockupController extends Controller
{
    public function login()
    {
        return view('mockups.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('mockups.troupe-dashboard');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    public function register()
    {
        return view('mockups.register');
    }

    public function processRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                \Illuminate\Validation\Rules\Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role === 'troupe' ? 'troupe' : 'user',
            'is_verified' => ($request->role === 'troupe' ? false : true),
        ]);

        Auth::login($user);

        if ($user->isTroupe()) {
            return redirect()->route('mockups.troupe-dashboard');
        }

        return redirect()->route('home');
    }

    public function troupeDashboard()
    {
        return view('mockups.troupe-dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
