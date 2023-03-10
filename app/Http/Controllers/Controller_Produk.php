<?php

namespace App\Http\Controllers;

use App\Bahan_Baku;
use App\detail_bahan_baku;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller_Produk extends Controller
{
    function master(){
        $produk = DB::select('SELECT p.Id_produk, p.Nama_produk,pr.jumlah_produksi,pr.stok_produksi
        from produk p left outer join produksi pr on p.Id_produk=pr.id_produksi
        where p.status = "Bukan Menu"');
        return view('Back_End.produk',compact('produk'));
    }
    function menu(){
        $produk = Produk::all()->where('status','Menu');
        return view('Back_End.menu',['produk'=>$produk]);
    }

    
 function form_input(){
     $bahanbaku = Bahan_Baku::all();
    return view('Form.input_produk',['bahanbaku'=>$bahanbaku]);
}

function simpan(Request $request) {
   $data=$request->all();
   $produk = new Produk();
   
   if ($data['harga'] == null) {
    $produk->Nama_produk = $data['nama'];
    $produk->Harga_jual = 0;
    $produk->status = $data['status'];    
    $produk->Deskripsi_produk = '';   
    $produk->foto_produk = '';
    $produk->save();

        $produk=Produk::all()->last();
        if ($produk) {
        if (count($data['bahan']) > 0) {
            foreach ($data['bahan'] as $item => $value) {
                $data2 = array(
                    'produk_ID' => $produk->Id_produk,
                    'bahan_baku_ID' => $data['bahan'][$item],
                    'jumlah_pakai' =>1
                    
                );
                Detail_Bahan_Baku::create($data2);
            }
            }       
        }

   } else {
    $produk->Nama_produk = $data['nama'];
    $produk->Harga_jual = $data['harga'];
    $produk->status = $data['status'];    
    $produk->Deskripsi_produk = $data['deskripsi'];    
    // Foto
    $file       = $request->file('foto');
    $fileName   = $file->getClientOriginalName();
    $request->file('foto')->move("foto_produk", $fileName);

    $produk->foto_produk = $fileName;
    // Foto
    $produk->save();
   }
   
   

  
   return redirect('/Master/Produk');

}

function ambil($id) {
    $produk = DB::table('produk')->where('Id_produk',$id)->get();
    return view('Form.update_produk',['bahanbaku'=>$produk]);

}

function update(Request $request) {
   Produk::where('Id_produk',$request->id)->update([
       'Nama_produk' => $request->nama,
       'Harga_jual'       => $request->harga,
       'Deskripsi_produk'   => $request->deskripsi
   ]);
   return redirect('/Master/Produk');
}

function delete($id) {
   Produk::where('Id_produk',$id)->delete();
   return redirect('/Master/Produk');
}
}
