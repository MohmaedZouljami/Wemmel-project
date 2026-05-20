<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::get();

        return view('index.blade.php.index', compact('newsItems'));
    }
}
