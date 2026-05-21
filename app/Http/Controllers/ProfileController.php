<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('profile.show', compact('user'));
    }

    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'verjaardag' => 'nullable|date',
            'over_mij' => 'nullable|string',
            'profielfoto' => 'nullable|image',
        ]);

        $user->name = $request->input('name');
        $user->verjaardag = $request->input('verjaardag');
        $user->over_mij = $request->input('over_mij');

        if ($request->hasFile('profielfoto')) {
            $user->profielfoto = $request->file('profielfoto')->store('profielfoto', 'public');
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profiel bijgewerkt!');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        Auth::logout();
        $user->delete();
        return redirect('/');
    }
}
