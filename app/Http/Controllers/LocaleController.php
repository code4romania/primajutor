<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function __invoke($locale): RedirectResponse
    {
        if (! \in_array($locale, ['en', 'ro'])) {
            $locale = 'ro';
        }

        app()->setLocale($locale);
        session()->put('locale', $locale);

        return back();
    }
}
