<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function page($alias)
    {
        $page = Page::where('alias', $alias)->with('media')->firstOrFail();

        return view('text-page', compact('page'));
    }
}
