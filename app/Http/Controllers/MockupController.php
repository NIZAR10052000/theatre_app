<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MockupController extends Controller
{
    public function login(Request $request)
    {
        if ($request->has('redirect')) {
            session(['url.intended' => $request->redirect]);
        }
        return view('mockups.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Priorité absolue aux tableaux de bord pour l'Admin et les Troupes
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            
            if ($user->isTroupe()) {
                return redirect()->route('mockups.troupe-dashboard');
            }

            // Seuls les "utilisateurs normaux" reviennent à la page où ils étaient (ex: l'Agenda)
            return redirect()->intended(route('home'));
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
        $user = auth()->user();
        
        // Statistiques réelles
        $upcomingShowsCount = \App\Models\Event::where('user_id', $user->id)
            ->where('status', 'published')
            ->where('event_date', '>=', now()->toDateString())
            ->count();
            
        $eventIds = \App\Models\Event::where('user_id', $user->id)->pluck('id');
        
        $ticketsSold = \App\Models\Ticket::whereIn('event_id', $eventIds)->count();
        
        $revenue = \App\Models\Ticket::whereIn('event_id', $eventIds)->sum('price');
        
        $myEvents = \App\Models\Event::where('user_id', $user->id)->latest()->take(5)->get();

        return view('mockups.troupe-dashboard', compact('upcomingShowsCount', 'ticketsSold', 'revenue', 'myEvents'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
