<?php

namespace App\Http\Controllers;

use App\penjualan;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class penjualan_controller extends Controller
{
    function form_pesan($id){
        $produk =Produk::all()->where('Id_produk',$id);
        $list_produk = DB::select('select * from produk where status = "Menu"');
        return view('Form.form_pesanan',compact('produk','list_produk'));
    }
    

    function simpan(Request $request) {
        $input = $request->all();
        if(count($input['produk']) > 0) {
            foreach ($input['produk'] as $key => $value) {
                $data=array(
                    'id_pengguna' => $input['pelanggan'],
                    'id_status' => 1,
                    'id_produk' => $input['produk'][$key],
                    'jumlah' =>$input['jumlah'][$key],
                    'tanggal_pesanan'=> date('Y-m-d'),
                    'via' =>$input['via'],
                    'pengiriman' => '',
                    'total_bayar' => 0,
                );
                Penjualan::create($data);
            }
        }
        

        return redirect('/konfirmasi/pesanan');

    }
}
