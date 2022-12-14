<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Riwayat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use RiwayatPesanan;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menu = DB::table('menu')->where('tersedia',1)->get(); 
        return view('menu', compact('menu'));
    }

    public function tambah(Request $request)
    {
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->tersedia = $request->tersedia;
        $menu->save();

        return redirect('/');
    }
    
    public function buat_pesanan(Request $request)
    {
        $kembalian = 0;
        $nama_menu = DB::table('menu')->where('tersedia',1)->get(); 
        foreach($nama_menu as $key => $value)
        {
            $data_riwayat = DB::table('riwayat_pesanan')->orderBy('id', 'DESC')->first();
            // dd($data_riwayat);
            $string = (string)$value->id;
            $ambil_jumlah = $request->$string;
            $string_nama_menu = (string)$value->nama_menu;
            $string_harga = (string)$value->harga;
            $ambil_harga = $request->$string_harga;
            $harga = (string)$ambil_jumlah * $ambil_harga;
            $pesanan = new Riwayat();
            $pesanan->jumlah_menu = $request->$string;
            $pesanan->nama_menu = $request->$string_nama_menu;
            $pesanan->nama_pemesan = $request->nama;
            $pesanan->uang_dibayar = $request->uang_dibayar;
            $pesanan->harga = $harga;
            $pesanan->save();
            $kembalian += $harga;
        }
        $total = $kembalian;
        $mytime = Carbon::now();
        $waktupesan = $mytime->toDateTimeString();
        $riwayat = DB::table('riwayat_pesanan')->where('created_at',$waktupesan)->get();
        $nama = $request->nama;
        $uang_dibayar = $request->uang_dibayar;
        $uang_kembalian = $request->uang_dibayar-$kembalian;
        

        return view('struk', compact('total','waktupesan','riwayat','nama','uang_dibayar','uang_kembalian'));
    }

    public function pendapatan(Request $request)
    {
        $pesanan = Riwayat::all();
        $pendapatan = DB::table('riwayat_pesanan')->sum('harga');
        // dd($pendapatan);

        return view('pendapatan', compact('pesanan','pendapatan'));
    }
}