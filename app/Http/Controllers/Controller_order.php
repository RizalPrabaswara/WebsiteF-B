<?php

namespace App\Http\Controllers;

use App\penjualan;
use App\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_order extends Controller
{
    function detail_order(){
        $pesanan =DB::select('select count(*) as pesanan from penjualan where id_status = 1');
        $pembayaran =DB::select('select count(*) as pembayaran from penjualan where id_status = 2');
        $produksi =DB::select('select count(*) as produksi from penjualan where id_status = 3');
        $selesai =DB::select('select count(*) as selesai from penjualan where id_status > 4');
        $produk=DB::table('produk')
                   ->join('penjualan','produk.Id_produk','penjualan.id_produk')
                   ->join('users','penjualan.id_pengguna','users.id')
                   ->select('produk.*','users.*','penjualan.*')
                   ->paginate(10);

        return view('Back_End.order',compact('produk','pesanan','pembayaran','produksi','selesai'));

    }

    function bayar($id){
        penjualan::where('Id_penjualan',$id)->update([
            'id_status' => 2
        ]);


        return redirect('/Order');
    }

    function produksi(Request $request){
        penjualan::where('Id_penjualan',$request->id_jual)->update([
            'id_status' => 3
        ]);
        $nasi = $request->jumlah *0.2;
        $ayam = $request->jumlah *0.1;
        DB::table('produksi')->where('id_produk',3,'and')->where('tgl_produksi',date('Y-m-d'))->decrement('stok_produksi',$nasi);
        DB::table('produksi')->where('id_produk',4,'and')->where('tgl_produksi',date('Y-m-d'))->decrement('stok_produksi',$ayam);

           if ($request->produk == '1') {
               $telor = $request->jumlah *0.065;
            DB::table('produksi')->where('id_produk',5,'and')->where('tgl_produksi',date('Y-m-d'))->decrement('stok_produksi',$telor);
           } elseif ($request->produk == '2') {
            $telor = $request->jumlah *0.13;
            DB::table('produksi')->where('id_produk',6,'and')->where('tgl_produksi',date('Y-m-d'))->decrement('stok_produksi',$telor);
           } else {
            $telor = $request->jumlah *0.2;
            DB::table('produksi')->where('id_produk',7,'and')->where('tgl_produksi',date('Y-m-d'))->decrement('stok_produksi',$telor);
           }
           
        return redirect('/Order');
    }

    function selesai($id){
        penjualan::where('Id_penjualan',$id)->update([
            'id_status' => 4
        ]);
        return redirect('/Order');
    }

    function terima($id){
        penjualan::where('Id_penjualan',$id)->update([
            'id_status' => 5
        ]);
        return redirect('/Order');
    }
}
