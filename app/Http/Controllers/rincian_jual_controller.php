<?php

namespace App\Http\Controllers;

use App\penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class rincian_jual_controller extends Controller
{
    function konfirmasi(){
        $users = DB::select('select p.Id_penjualan,u.alamat,u.no_telp, p.id_pengguna, u.nama_pelanggan, pr.Nama_produk, p.jumlah, pr.Harga_jual,p.jumlah ,pr.Harga_jual*p.jumlah as bayar
        from users u join penjualan p on u.id = p.id_pengguna
        join produk pr on p.id_produk = pr.Id_produk
        where id_status = 1 and p.total_bayar = 0
        group by p.id_pengguna, p.id_produk,p.created_at');

        $produk = DB::select('select sum(pr.Harga_jual*p.jumlah) as total
        from users u join penjualan p on u.id = p.id_pengguna
        join produk pr on p.id_produk = pr.Id_produk
        where id_status = 1
        group by p.id_pengguna');

        return view('Front_End.konfirmasi_pesanan',compact('users','produk'));

    
    }

    function fixBayar(Request $request){
        $input = $request->all();
        $link ='';
        if (count ($input['penjualan']) > 1 && count ($input['penjualan']) < 3) {
            foreach ($input['penjualan'] as $key => $value) {
                penjualan::where('Id_penjualan',$input['penjualan'][$key])->update([
                    'total_bayar' => $input['total'][$key],
                ]);
                
            }
            $link = 'https://api.whatsapp.com/send?phone=6289630387377&text=Hi!%20Kak%20bisa%20langsung%20isi%20form%20order%20yaa%20%F0%9F%8D%B3%0A%0ANama%20%3A'.$request->user.'%0AOrderan%20%3A'.$input['produk'][0].'%0AJumlah%20%3A'.$input['jumlah'][0].',%20'.$input['produk'][1].'%20('.$input['jumlah'][1].')%0AAlamat%20%26%20No.%20HP%20%3A'.$request->alamat.'%20%26%20'.$request->telp.'';
        } elseif (count ($input['penjualan']) > 2 && count ($input['penjualan']) < 4) {
            $link = 'https://api.whatsapp.com/send?phone=6289630387377&text=Hi!%20Kak%20bisa%20langsung%20isi%20form%20order%20yaa%20%F0%9F%8D%B3%0A%0ANama%20%3A'.$request->user.'%0AOrderan%20%3A'.$input['produk'][0].'%0AJumlah%20%3A'.$input['jumlah'][0].',%20'.$input['produk'][1].'%20('.$input['jumlah'][1].',%20'.$input['produk'][2].'%20('.$input['jumlah'][2].')%0AAlamat%20%26%20No.%20HP%20%3A'.$request->alamat.'%20%26%20'.$request->telp.'';
        } else {
            $link='https://api.whatsapp.com/send?phone=6289630387377&text=Hi!%20Kak%20bisa%20langsung%20isi%20form%20order%20yaa%20%F0%9F%8D%B3%0A%0ANama%20%3A'.$request->user.'%0AOrderan%20%3A'.$input['produk'][0].'%0AJumlah%20%3A'.$input['jumlah'][0].'%0AAlamat%20%26%20No.%20HP%20%3A'.$request->alamat.'%20%26%20'.$request->telp.'';
        }
        
        
        
        return redirect()->away($link);
    }

  
}
