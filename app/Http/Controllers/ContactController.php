<?php

namespace App\Http\Controllers;

use App\Models\ContactBericht;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'onderwerp' => 'required',
            'bericht' => 'required',
        ]);

        ContactBericht::create([
            'naam' => $request->input('naam'),
            'email' => $request->input('email'),
            'onderwerp' => $request->input('onderwerp'),
            'bericht' => $request->input('bericht'),
        ]);

        return redirect()->route('contact.index')->with('success', 'Uw bericht is verzonden!');
    }
}
