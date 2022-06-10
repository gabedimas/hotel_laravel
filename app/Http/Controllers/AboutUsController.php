<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function get_menu() {
        return(view('about_us.main', ['menu_name' => 'About Us']));
    }
}
