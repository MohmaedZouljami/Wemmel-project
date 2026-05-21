<?php

namespace App\Http\Controllers;

use App\Models\Nieuws;
use Illuminate\Http\Request;

class NieuwsController extends Controller
{
    public function index()
    {
        $newsItems = Nieuws::latest()->get();
        return view('news.index', compact('newsItems'));
    }

    public function show(Nieuws $nieuws)
    {
        return view('news.show', compact('nieuws'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit(Nieuws $nieuws)
    {
        return view('news.edit', compact('nieuws'));
    }
}
