<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GebruikerController extends Controller
{
    public function index()
    {
        $gebruikers = User::all();
        return view('gebruikers.index', compact('gebruikers'));
    }

    public function create()
    {
        return view('gebruikers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker aangemaakt!');
    }

    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->route('gebruikers.index')->with('success', 'Gebruiker is nu admin!');
    }

    public function removeAdmin(User $user)
    {
        $user->update(['is_admin' => false]);
        return redirect()->route('gebruikers.index')->with('success', 'Admin rechten verwijderd!');
    }
}
