<?php

namespace App\Http\Controllers;

use App\Bahan_Baku;
use App\detail_bahan_baku;
use App\Produk;
use App\produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LengthException;

class produksi_controller extends Controller
{
    function formProduksi($id){
        $produk = Produk::all()->where('Id_produk',$id);
        $detail_bahan_baku = detail_bahan_baku::all()->where('produk_ID',$id);
        return view('Form.input_produksi',compact('produk','detail_bahan_baku'));
    }

    function simpan (Request $request) {
        $produksi = new produksi();

        $produksi->id_produk = $request->produk;
        $produksi->jumlah_produksi = $request->jumlah;
        $produksi->stok_produksi = $request->jumlah;
        $produksi->biaya_produksi = $request->biaya;
        $produksi->tgl_produksi = date('Y-m-d');

        $produksi->save();
   
        if (count($request->bahan) >0 ) {
            foreach ($request->bahan as $key => $value) {
                $totalPakai = $request->jumlah * $request->pakai[$key];
                DB::table('bahanbaku')->where('Id_bahan_baku',$request->bahan[$key])->decrement('stok',$totalPakai);
            }
        }

        return redirect('/Master/Produk');
    }

}
