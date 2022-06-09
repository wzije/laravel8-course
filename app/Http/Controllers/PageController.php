<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function portofolio()
    {
        return view('pages.portofolio');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
