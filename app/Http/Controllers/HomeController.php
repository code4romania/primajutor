<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Point;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'guides' => Guide::limit(6)->get(),
            'points' => Point::all(['title', 'lat', 'lng']),
        ]);
    }
}
