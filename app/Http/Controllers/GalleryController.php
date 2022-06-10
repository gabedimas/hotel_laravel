<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function get_menu() {
        return(view('gallery.main', ['menu_name' => 'Gallery']));
    }
}
