<?php

namespace App\Http\Controllers;

use App\Models\FaqCategorie;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categorieen = FaqCategorie::with('vragen')->get();
        return view('faq.index', compact('categorieen'));
    }
}
