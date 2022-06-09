<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\Klasifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AdminController extends Controller
{
    public static function get_list_klasifikasi() {
        $list_klasifikasi = Klasifikasi::all();
        return(view('klasifikasi.list_component', ['list_klasifikasi' => $list_klasifikasi]));
    }

    public static function get_detail_klasifikasi($klasifikasi_id) {
        $detail_klasifikasi = Klasifikasi::where('id', $klasifikasi_id)->get();
        return(view('klasifikasi.edit_klasifikasi', ['detail_klasifikasi' => $detail_klasifikasi]));
    }

    public static function get_add_klasifikasi_menu() {
        return(view('klasifikasi.add_klasifikasi'));
    }

    public function add_klasifikasi(Request $request) {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'jumlah_kapasitas' => 'required|string|min:1',
        //     'harga' => 'required|string|min:1'
        // ]);

        $klasifikasi = new Klasifikasi;
        $klasifikasi->nama = $request->nama;
        $klasifikasi->jumlah_kapasitas = $request->jumlah_kapasitas;
        $klasifikasi->harga = $request->harga;

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $klasifikasi->gambar_klasifikasi = $filename;
        //     $file->move(public_path('uploads\klasifikasi_image'), $filename);
        // }
        $klasifikasi->save();

        return redirect('/admin/klasifikasi/list');
    }

    public function edit_klasifikasi(Request $request){
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'jumlah_kapasitas' => 'required|string|min:1',
        //     'harga' => 'required|string|min:1'
        // ]);

        $klasifikasi = Klasifikasi::where('id', $request->klasifikasi_id)->first();
        $klasifikasi->nama = $request->nama;
        $klasifikasi->jumlah_kapasitas = $request->jumlah_kapasitas;
        $klasifikasi->harga = $request->harga;

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $klasifikasi->gambar_klasifikasi = $filename;
        //     $file->move(public_path('uploads\klasifikasi_image'), $filename);
        // }
        $klasifikasi->save();

        return redirect('/admin/klasifikasi/list');
    }

    public function delete_klasifikasi($klasifikasi_id) {
        Klasifikasi::where('id', $klasifikasi_id)->delete();
        return redirect('/admin/klasifikasi/list');
    }

    public static function get_list_kamar() {
        $list_kamar = Kamar::all();
        return(view('kamar.list_component', ['list_kamar' => $list_kamar]));
    }

    public static function get_detail_kamar($kamar_id) {
        $detail_kamar = Kamar::where('id', $kamar_id)->get();
        return(view('kamar.edit_kamar', ['detail_kamar' => $detail_kamar]));
    }

    public static function get_add_kamar_menu() {
        return(view('kamar.add_kamar'));
    }

    public function add_kamar(Request $request) {
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'klasifikasi_id' => 'required'
        // ]);

        $kamar = new Kamar;
        $kamar->nama = $request->nama;
        $kamar->klasifikasi_id = $request->klasifikasi_id;

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $kamar->gambar_kamar = $filename;
        //     $file->move(public_path('uploads\kamar_image'), $filename);
        // }
        $kamar->save();

        $klasifikasi = Klasifikasi::where('id', $request->klasifikasi_id)->first();
        $klasifikasi->jumlah_kapasitas = $klasifikasi->jumlah_kapasitas - 1;
        $klasifikasi->save();
        return redirect('/admin/kamar/list');
    }

    public function edit_kamar(Request $request){
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'klasifikasi_id' => 'required'
        // ]);

        $kamar = Kamar::where('id', $request->kamar_id)->first();
        $kamar->nama = $request->nama;

        $klasifikasi_lama = Klasifikasi::where('id', $kamar->klasifikasi_id)->first();
        $klasifikasi_lama->jumlah_kapasitas = $klasifikasi_lama->jumlah_kapasitas + 1;
        $klasifikasi_lama->save();

        $kamar->klasifikasi_id = $request->klasifikasi_id;

        $klasifikasi_baru = Klasifikasi::where('id', $request->klasifikasi_id)->first();
        $klasifikasi_baru->jumlah_kapasitas = $klasifikasi_baru->jumlah_kapasitas - 1;
        $klasifikasi_baru->save();

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $kamar->gambar_kamar = $filename;
        //     $file->move(public_path('uploads\kamar_image'), $filename);
        // }
        $kamar->save();

        return redirect('/admin/kamar/list');
    }

    public function delete_kamar($kamar_id) {
        $kamar = Kamar::where('id', $kamar_id)->first();

        $klasifikasi = Klasifikasi::where('id', $kamar->klasifikasi_id)->first();
        $klasifikasi->jumlah_kapasitas = $klasifikasi->jumlah_kapasitas + 1;
        $klasifikasi->save();

        Kamar::where('id', $kamar_id)->delete();
        return redirect('/admin/kamar/list');
    }

    public static function get_list_user() {
        $list_user = User::all();
        return(view('user_management.list_component', ['list_user' => $list_user]));
    }

    public static function get_detail_user($user_id) {
        $detail_user = User::where('id', $user_id)->get();
        return(view('user_management.edit_user', ['detail_user' => $detail_user]));
    }

    public static function get_add_user_menu() {
        return(view('user_management.add_user'));
    }

    public function add_user(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $klasifikasi->gambar_klasifikasi = $filename;
        //     $file->move(public_path('uploads\klasifikasi_image'), $filename);
        // }
        return redirect('/admin/user_management/list');
    }

    public function edit_user(Request $request){
        // $request->validate([
        //     'nama' => 'required|string|max:255',
        //     'jumlah_kapasitas' => 'required|string|min:1',
        //     'harga' => 'required|string|min:1'
        // ]);

        $user = User::where('id', $request->user_id)->first();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        // $file = $request->file('gambar');
        // if(file_exists($file)) {
        //     $filename = $file->getClientOriginalName();
        //     $klasifikasi->gambar_klasifikasi = $filename;
        //     $file->move(public_path('uploads\klasifikasi_image'), $filename);
        // }
        $user->save();

        return redirect('/admin/user_management/list');
    }

    public function delete_user($user_id) {
        User::where('id', $user_id)->delete();
        return redirect('/admin/user_management/list');
    }
}
