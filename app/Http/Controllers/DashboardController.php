<?php

namespace App\Http\Controllers;

use App\Models\ContactBericht;

class DashboardController extends Controller
{
    public function index()
    {
        $berichten = ContactBericht::latest()->get();
        return view('dashboard.index', compact('berichten'));
    }
}
