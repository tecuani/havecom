<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function policy()
    {
        return view('pages.policy');
    }

    public function consultancy()
    {
        return view('pages.consultancy');
    }

    public function aboutUs()
    {
        return view('pages.about_us');
    }
}
