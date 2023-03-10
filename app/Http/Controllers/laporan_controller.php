<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laporan_controller extends Controller
{
    function laporan () {
        
        $pendapatan =DB::select('select lp.ttl_keluar,sum(jual.jumlah*p.Harga_jual) as pendapatan, jual.tanggal_pesanan
        from lp join penjualan jual on lp.tgl_produksi=jual.tanggal_pesanan
        join produk p on jual.id_produk=p.Id_produk
        group by jual.tanggal_pesanan');

        return view('Back_End.laporan',compact('pendapatan'));
    }

    function detail_laporan($tgl) {
        $detail_laporan = DB::select('select bb.Nama_bahan, sum(db.jumlah_pakai*pr.jumlah_produksi) as total_penggunaan,pr.biaya_produksi, rp.harga_beli, sum(db.jumlah_pakai*pr.jumlah_produksi*rp.harga_beli+pr.biaya_produksi) as pengeluaran
        from bahanbaku bb join rincian_pembelian rp on bb.Id_bahan_baku = rp.Id_bahan_baku
        join detail_bahan_baku db on rp.Id_bahan_baku = db.bahan_baku_ID
        join produksi pr on db.produk_ID=pr.id_produk
        group by bb.Nama_bahan');
        $laris = DB::select('select jml.Nama_produk,max(jml.jj) as laris from (select sum(jumlah) as jj, p.Nama_produk from penjualan jual join produk p on jual.id_produk=p.Id_produk group by jual.id_produk) jml');

        $detail_produk = DB::select('select p.Nama_produk, p.Harga_jual, sum(jual.jumlah) as jumlah, sum(jual.jumlah*p.Harga_jual) as pendapatan
        from produk p join penjualan jual on p.Id_produk = jual.id_produk
        group by p.Nama_produk');

        $pengeluaran = DB::select('SELECT SUM(ttl.pengeluaran) as ttl_keluar
        from (select pr.tgl_produksi,sum(pr.jumlah_produksi*db.jumlah_pakai)*beli.harga_beli+pr.biaya_produksi as pengeluaran
                from produksi pr join produk p on pr.id_produk = p.Id_produk 
                join detail_bahan_baku db on p.Id_produk = db.produk_ID
                join rincian_pembelian beli on db.bahan_baku_ID = beli.Id_bahan_baku
                join bahanbaku bb on beli.Id_bahan_baku = bb.Id_bahan_baku group by pr.id_produk, pr.tgl_produksi) ttl
                where ttl.tgl_produksi ="'.$tgl.'"
        GROUP by ttl.tgl_produksi');

        $pendapatan =DB::select('select sum(jual.jumlah*p.Harga_jual) as pendapatan, jual.tanggal_pesanan   
        from penjualan jual join produk p on jual.id_produk = p.Id_produk where jual.tanggal_pesanan ="'.$tgl.'" group by jual.tanggal_pesanan ');
        
        return view('Back_End.detail_laporan',compact('detail_laporan','laris','detail_produk','pengeluaran','pendapatan'));
    }
}
