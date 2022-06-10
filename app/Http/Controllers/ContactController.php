<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function get_menu() {
        return(view('contact.main', ['menu_name' => 'Contact']));
    }
}
