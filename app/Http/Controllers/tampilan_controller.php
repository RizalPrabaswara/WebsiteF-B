<?php

namespace App\Http\Controllers;

use App\penjualan;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class tampilan_controller extends Controller
{
    function index(){
     $produk = Produk::all()->where('status','Menu');
        return view('Front_End.home',compact('produk'));
    }

    function produk(){
        $produk = Produk::all()->where('status','Menu');
        return view('Front_End.produk',compact('produk'));
    }

    function about(){
        return view('Front_End.about');
    }

    function lokasi(){
        return view('Front_End.location');
    }

    function ambil($id){
        $produk = DB::table('produk')->where('Id_produk',$id)->get();
        return view('Front_End.detail_produk',compact('produk'));
    }

    function cart(){
     
        $penjualan = DB::table('penjualan')
                     ->join('produk','penjualan.id_produk','produk.Id_produk')
                     ->select('produk.*','penjualan.*')
                     ->where('tanggal_pesanan',date('Y-m-d'))
                     ->get();

        $users = DB::select('select p.Id_penjualan, p.id_pengguna, p.created_at, u.nama_pelanggan, pr.Nama_produk, p.jumlah, pr.Harga_jual,p.jumlah ,pr.Harga_jual*p.jumlah as bayar
        from users u join penjualan p on u.id = p.id_pengguna
        join produk pr on p.id_produk = pr.Id_produk
        where tanggal_pesanan = "'.date('Y-m-d').'"
        group by p.created_at,p.id_pengguna, p.id_produk');

        $produk = DB::select('select sum(pr.Harga_jual*p.jumlah) as total
        from users u join penjualan p on u.id = p.id_pengguna
        join produk pr on p.id_produk = pr.Id_produk
        where tanggal_pesanan = "'.date('Y-m-d').'"
        group by p.id_pengguna');
                     
        return view('Front_End.cart',compact('penjualan','users','produk'));
    }

    function dashboard(){
        $penjualan = DB::select('SELECT sum(jumlah) as penjualan from penjualan');

        $pengeluaran = DB::select('SELECT SUM(ttl.pengeluaran) as ttl_keluar
        from (select pr.tgl_produksi,sum(pr.jumlah_produksi*db.jumlah_pakai)*beli.harga_beli+pr.biaya_produksi as pengeluaran
                from produksi pr join produk p on pr.id_produk = p.Id_produk 
                join detail_bahan_baku db on p.Id_produk = db.produk_ID
                join rincian_pembelian beli on db.bahan_baku_ID = beli.Id_bahan_baku
                join bahanbaku bb on beli.Id_bahan_baku = bb.Id_bahan_baku group by pr.id_produk, pr.tgl_produksi) ttl
                GROUP by ttl.tgl_produksi');

        $pendapatan =DB::select('select sum(jual.jumlah*p.Harga_jual) as pendapatan
        from penjualan jual join produk p on jual.id_produk = p.Id_produk');

        return view('Back_End.dashboard',compact('pengeluaran','pendapatan','penjualan'));
    }
}
