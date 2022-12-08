<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __invoke(Page $page): View
    {
        return view('text-page', [
            'page' => $page,
        ]);
    }
}
