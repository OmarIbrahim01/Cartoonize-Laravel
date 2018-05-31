<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function whoWeAre()
    {
    	return view('about.who_we_are');
    }

    public function contactUs()
    {
    	return view('about.contact_us');
    }
}
