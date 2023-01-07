<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function __invoke(?Guide $guide = null): View
    {
        abort_if($guide === null, 404);

        return view('guides.show', [
            'guide' => $guide,
        ]);
    }
}
