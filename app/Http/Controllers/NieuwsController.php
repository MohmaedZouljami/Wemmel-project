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
        $nieuws->load('commentaren.gebruiker');
        return view('news.show', ['news' => $nieuws]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $imagePad = null;
        if ($request->hasFile('image')) {
            $imagePad = $request->file('image')->store('news', 'public');
        }

        Nieuws::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'image' => $imagePad,
            'published_at' => now(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht aangemaakt!');
    }

    public function edit(Nieuws $nieuws)
    {
        return view('news.edit', ['news' => $nieuws]);
    }

    public function update(Request $request, Nieuws $nieuws)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $imagePad = $nieuws->image;
        if ($request->hasFile('image')) {
            $imagePad = $request->file('image')->store('news', 'public');
        }

        $nieuws->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'image' => $imagePad,
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht bijgewerkt!');
    }

    public function destroy(Nieuws $nieuws)
    {
        $nieuws->delete();
        return redirect()->route('news.index')->with('success', 'Nieuwsbericht verwijderd!');
    }
}
