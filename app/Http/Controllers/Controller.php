<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Settings\GlobalSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $pages = Page::get();
        $settings = new GlobalSettings();

        View::share('pages', $pages);
        View::share('settings', $settings);
    }
}
