<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public static function get_list_approval() {
        $list_approval = Booking::all();
        return(view('management.list_component', ['list_approval' => $list_approval]));
    }

    public static function get_detail_approval($booking_id) {
        $detail_approval = Booking::where('id', $booking_id)->get();
        return(view('management.approval_booking', ['detail_approval' => $detail_approval]));
    }

    public function approve_booking(Request $request){
        $request->validate([
            'user_id' => 'required|string|max:255',
            'kamar_id' => 'required|string|min:1',
            'status' => 'required',
            // 'tanggal_awal' => 'required|date|min:1',
            // 'tanggal_akhir' => 'required|string|min:1'
        ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $booking->user_id = $request->user_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->status = $request->status;
        $booking->tanggal_awal = $request->tanggal_awal;
        $booking->tanggal_akhir = $request->tanggal_akhir;
        $booking->save();

        return redirect('/management/get_list_approval');
    }
}
