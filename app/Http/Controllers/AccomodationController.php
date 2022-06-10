<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class AccomodationController extends Controller
{
    public function get_menu() {
        $list_klasifikasi = Klasifikasi::all();
        return(view('accomodation.main', ['menu_name' => 'Accomodation', 'list_klasifikasi' => $list_klasifikasi]));
    }
}
