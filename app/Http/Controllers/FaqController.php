<?php

namespace App\Http\Controllers;

use App\Models\FaqCategorie;
use App\Models\FaqVraag;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $categorieen = FaqCategorie::with('vragen')->get();
        return view('faq.index', compact('categorieen'));
    }

    public function create()
    {
        $categorieen = FaqCategorie::all();
        return view('faq.create', compact('categorieen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required',
            'antwoord' => 'required',
            'faq_categorie_id' => 'required',
        ]);

        FaqVraag::create([
            'vraag' => $request->input('vraag'),
            'antwoord' => $request->input('antwoord'),
            'faq_categorie_id' => $request->input('faq_categorie_id'),
        ]);

        return redirect()->route('faq.index')->with('success', 'Vraag toegevoegd!');
    }

    public function destroy(FaqVraag $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'Vraag verwijderd!');
    }

    public function storeCategorie(Request $request)
    {
        $request->validate(['naam' => 'required']);
        FaqCategorie::create(['naam' => $request->input('naam')]);
        return redirect()->route('faq.index')->with('success', 'Categorie toegevoegd!');
    }

    public function destroyCategorie(FaqCategorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('faq.index')->with('success', 'Categorie verwijderd!');
    }
}
