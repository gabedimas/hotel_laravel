<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\Klasifikasi;
use App\Models\Booking;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\List_;

class BookingController extends Controller
{
    public static function get_menu() {
        return(view('kamar.main_menu'));
    }

    public static function get_list_kamar(Request $request) {
        $list_kamar_by_klasifikasi_id = Kamar::where('klasifikasi_id', $request->klasifikasi_id)->get();

        $list_kamar_tersedia = [];
        foreach($list_kamar_by_klasifikasi_id as $kamar){
            $list_kamar_tersedia[] = $kamar['id'];
        }

        $list_kamar = Booking::whereDate('tanggal_awal', '<=' , date('Y-m-d', strtotime($request->tanggal_awal)))
            ->whereDate('tanggal_akhir', '<=' ,date('Y-m-d', strtotime($request->tanggal_awal)))
            ->whereDate('tanggal_awal', '>=' , date('Y-m-d', strtotime($request->tanggal_akhir)))
            ->whereDate('tanggal_akhir', '>=' , date('Y-m-d', strtotime($request->tanggal_akhir)))
            ->whereIn('kamar_id', $list_kamar_tersedia)
            ->get();

        return $list_kamar_tersedia;
        return(view('kamar.list_component', ['list_kamar' => $list_kamar]));
    }

    public static function get_detail_kamar($kamar_id) {
        $detail_kamar = Kamar::where('id', $kamar_id)->first();
        return(view('kamar.detail_kamar', ['detail_kamar' => $detail_kamar]));
    }

    public function booking_kamar(Request $request) {
        // $request->validate([
        //     'user_id' => 'required|string|max:255',
        //     'kamar_id' => 'required|string|min:1',
        //     // 'tanggal_awal' => 'required|string|min:1'
        //     // 'tanggal_akhir' => 'required|string|min:1'
        // ]);

        $booking = new Booking;
        $booking->user_id = $request->user_id;
        $booking->kamar_id = $request->kamar_id;
        $booking->status = 'APPROVAL';
        $booking->tanggal_awal = $request->tanggal_awal;
        $booking->tanggal_akhir = $request->tanggal_akhir;
        $booking->save();

        return redirect('/accomodation');
    }

}
