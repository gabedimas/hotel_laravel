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
            // $list_kamar_tersedia[] = $kamar['id'];

            // $cek_booking_kamar = Booking::whereDate('tanggal_awal', '>=' , date('Y-m-d', strtotime($request->tanggal_awal)))
            // ->whereDate('tanggal_akhir', '<=' ,date('Y-m-d', strtotime($request->tanggal_akhir)))
            // ->whereIn('kamar_id', $list_kamar_tersedia)
            // ->where('status', 'APPROVED')
            // ->get();

            $cek_booking_kamar = Booking::where('kamar_id', $kamar['id'])
            ->where('status', 'APPROVED')
            ->first();

            if($cek_booking_kamar != null){
                if($request->tanggal_awal <= date('Y-m-d', strtotime($cek_booking_kamar->tanggal_awal)) &&
                    $request->tanggal_akhir <= date('Y-m-d', strtotime($cek_booking_kamar->tanggal_awal))
                    ) {
                        $list_kamar_tersedia[] = $kamar['id'];
                        // echo 'BELUM DIBOOKING kamar' . $kamar;
                } elseif(
                    $request->tanggal_awal >= date('Y-m-d', strtotime($cek_booking_kamar->tanggal_akhir)) &&
                    $request->tanggal_akhir >= date('Y-m-d', strtotime($cek_booking_kamar->tanggal_akhir))
                ) {
                    $list_kamar_tersedia[] = $kamar['id'];
                    // echo 'BELUM DIBOOKING kamar' . $kamar;
                }
            } else {
                $list_kamar_tersedia[] = $kamar['id'];
                // echo 'BELUM DIBOOKING kamar' . $kamar ;
            }

        }

        $available_rooms = Kamar::whereIn('id', $list_kamar_tersedia)->get();


        // return $list_kamar_tersedia;

        return(view('kamar.list_component', ['list_kamar' => $available_rooms]));
    }

    public static function get_detail_kamar($kamar_id) {
        $list_klasifikasi = Klasifikasi::all();
        $detail_kamar = Kamar::where('id', $kamar_id)->get();
        return(view('kamar.detail_kamar', ['detail_booking' => $detail_kamar, 'list_klasifikasi' => $list_klasifikasi]));
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

        return(view('kamar.success'));
    }

}
