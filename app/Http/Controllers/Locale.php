<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Locale extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);
        return view('locale');
    }
}
