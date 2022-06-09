<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\Klasifikasi;
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
        return(view('klasifikasi.add_kamar'));
    }

    public function add_kamar(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'klasifikasi_id' => 'required'
        ]);

        $kamar = new Kamar;
        $kamar->nama = $request->nama;
        $kamar->klasifikasi_id = $request->klasifikasi_id;

        $file = $request->file('gambar');
        if(file_exists($file)) {
            $filename = $file->getClientOriginalName();
            $kamar->gambar_kamar = $filename;
            $file->move(public_path('uploads\kamar_image'), $filename);
        }
        $kamar->save();

        return redirect('/admin/kamar/get_list_kamar');
    }

    public function edit_kamar(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'klasifikasi_id' => 'required'
        ]);

        $kamar = Kamar::where('id', $request->kamar_id)->first();
        $kamar->nama = $request->nama;
        $kamar->klasifikasi_id = $request->klasifikasi_id;

        $file = $request->file('gambar');
        if(file_exists($file)) {
            $filename = $file->getClientOriginalName();
            $kamar->gambar_kamar = $filename;
            $file->move(public_path('uploads\kamar_image'), $filename);
        }
        $kamar->save();

        return redirect('/admin/kamar/get_list_kamar');
    }

    public function delete_kamar($kamar_id) {
        Kamar::where('id', $kamar_id)->delete();
        return redirect('/admin/kamar/get_list_kamar');
    }
}
