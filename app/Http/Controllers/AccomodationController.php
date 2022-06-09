<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function get_menu() {
        return(view('accomodation.main', ['menu_name' => 'Accomodation']));
    }
}
