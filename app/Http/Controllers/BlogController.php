<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function get_menu() {
        return(view('blog.main'));
    }

    public function get_detail_menu() {
        return(view('blog.detail', ['menu_name' => "Blog Details"]));
    }
}
