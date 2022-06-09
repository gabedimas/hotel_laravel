<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public static function get_menu() {
        return(view('kamar.main_menu'));
    }

    public static function get_list_kamar() {
        $list_kamar = Kamar::all();
        return(view('kamar.list_component', ['list_kamar' => $list_kamar]));
    }

    public static function get_booking_menu() {
        return(view('kamar.detail_kamar'));
    }

    public function booking_kamar(Request $request) {
        $request->validate([
            'user_id' => 'required|string|max:255',
            'kamar_id' => 'required|string|min:1',
            // 'tanggal_awal' => 'required|string|min:1'
            // 'tanggal_akhir' => 'required|string|min:1'
        ]);

        $booking = new Booking;
        $booking->user_id = $request->user_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->status = 'APPROVAL';
        $booking->tanggal_awal = $request->tanggal_awal;
        $booking->tanggal_akhir = $request->tanggal_akhir;
        $booking->save();

        return redirect('/booking/get_list_klasifikasi');
    }

}
