<?php

namespace App\Http\Controllers;

use App\Bahan_Baku;
use App\pembelian;
use App\rincian_pembelian;
use App\supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pembelian_controller extends Controller
{

    function view_pembelian(){
        $pembelian = DB::table('pembelian')
                     ->join('supplier','pembelian.id_supplier','supplier.id_supplier')
                     ->join('rincian_pembelian','supplier.id_supplier','rincian_pembelian.id_supplier')
                     ->join('bahanbaku','rincian_pembelian.Id_bahan_baku','=','bahanbaku.Id_bahan_baku')
                     ->select('bahanbaku.Nama_bahan','supplier.nama_supplier','supplier.tempat','bahanbaku.stok','bahanbaku.satuan','rincian_pembelian.total_pengeluaran','rincian_pembelian.jumlah_beli','rincian_pembelian.harga_beli','pembelian.tanggal_pembelian')
                     ->get();  
                     
        return view('Back_End.pembelian',compact('pembelian'));
    }

    function form_pembelian(){
        $supplier = DB::select('select * from supplier s join bahanbaku b on s.id_bahanbaku = b.Id_bahan_baku');
        return view('Form.input_pembelian',compact('supplier'));
    }

    function simpan(Request $request) {

        
            $pembelian = new pembelian();
            $pembelian->id_supplier = $request->supplier;
            $pembelian->tanggal_pembelian = $request->tgl;
            $pembelian->save();
    
            DB::table('bahanbaku')->where('Id_bahan_baku',$request->bahanbaku)->update([
                'kadaluarsa' => date('Y-m-d', strtotime('+6 days', strtotime($request->tgl)))
            ]);


        $pembelian=pembelian::all()->last();
        if ($pembelian) {
            $rincian_pembelian = new rincian_pembelian();
                $rincian_pembelian->Id_bahan_baku = $request->bahanbaku;
                $rincian_pembelian->id_supplier = $request->supplier;
                $rincian_pembelian->Id_pembelian = $pembelian->Id_pembelian;
                $rincian_pembelian->jumlah_beli = $request->jumlah;
                $rincian_pembelian->harga_beli = $request->harga;
                $rincian_pembelian->total_pengeluaran =$request->total;
            
            
            DB::table('bahanbaku')->where('Id_bahan_baku',$request->bahanbaku)->increment('stok',$request->jumlah);

            $rincian_pembelian->save();
        }

        return redirect('/Master/Bahan');
        
    }
}
