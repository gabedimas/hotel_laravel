<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Kamar;
use App\Models\User;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public static function get_list_approval() {
        $list_approval = Booking::where('status', 'APPROVAL')->get();

        foreach($list_approval as $approval){
            $kamar = Kamar::where('id', $approval['kamar_id'])->first();
            $approval->nama_kamar = $kamar->nama;

            $klasifikasi = Klasifikasi::where('id', $kamar->klasifikasi_id)->first();
            $approval->nama_klasifikasi = $klasifikasi->nama;
        }
        return(view('management.list_component', ['list_approval' => $list_approval]));
    }

    public static function get_detail_approval($booking_id) {
            $detail_approval = Booking::where('id', $booking_id)->get();

            foreach($detail_approval as $approval) {
                $user = User::where('id', $approval['user_id'])->first();
                $approval['nama_user'] = $user->nama;
                $approval['email'] = $user->email;

                $kamar = Kamar::where('id', $approval['kamar_id'])->first();
                $approval['nama_kamar'] = $kamar->nama;

                $klasifikasi = Klasifikasi::where('id', $kamar->klasifikasi_id)->first();
                $approval['nama_klasifikasi'] = $klasifikasi->nama;
            }

        return(view('management.approval_booking', ['detail_approval' => $detail_approval]));
    }

    public function approve_booking(Request $request){
        // $request->validate([
        //     'user_id' => 'required|string|max:255',
        //     'kamar_id' => 'required|string|min:1',
        //     'status' => 'required',
        //     'tanggal_awal' => 'required|date|min:1',
        //     'tanggal_akhir' => 'required|string|min:1'
        // ]);

        $booking = Booking::where('id', $request->booking_id)->first();
        $booking->status = $request->status;
        $booking->save();

        return redirect('/management/list');
    }
}
