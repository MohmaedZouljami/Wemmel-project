<?php

namespace App\Http\Controllers;

use App\Models\Commentaar;
use Illuminate\Http\Request;

class CommentaarController extends Controller
{
    public function store(Request $request, $nieuws_id)
    {
        $request->validate([
            'inhoud' => 'required|min:2',
        ]);

        Commentaar::create([
            'inhoud' => $request->input('inhoud'),
            'user_id' => auth()->id(),
            'news_id' => $nieuws_id,
        ]);

        return redirect()->back()->with('success', 'Commentaar toegevoegd!');
    }

    public function destroy(Commentaar $commentaar)
    {
        $commentaar->delete();
        return redirect()->back()->with('success', 'Commentaar verwijderd!');
    }
}
