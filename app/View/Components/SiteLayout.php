<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SiteLayout extends Component
{
    public string $title;

    public function __construct(string $title = 'gemeente Wemmel')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.site-layout');
    }
}
