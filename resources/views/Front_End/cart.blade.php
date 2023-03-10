@extends('Front_End.layout')

@section('konten')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <h3 class="text-center" style="color: white;">Pesanan</h3>
        <hr style="border-width: 5px; background-color:grey">
    </div>
</div>

    <!-- Coloumn -->
    
    @foreach($penjualan as $jual)
    <div class="container card-body">
    <div class="row text-white">
        <div class="card bg-transparent ml-2" style="width: 28rem;">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td>Harga Jual</td>
                    <td>Jumlah</td>
                    <td>Total</td>
                </tr>
                <tr>
                @foreach($users as $item =>$key)
                @if ($key->id_pengguna == Auth::user()->id)
                <td>{{$key->Nama_produk}}</td>
                <td>{{$key->Harga_jual}}</td>
                <td>{{$key->jumlah}}</td>
                <td>{{$key->bayar}}</td>

            </tr>
            @endif
            @endforeach
            <tr> 
                <td>
                    <div class="card-body">

                    </div>
                </td>
            </tr>
            
            <tr>
                
                <td></td>
                @foreach ($produk as $p)
                    @php
                    $total=0;
                    $total=$p->total;

                    @endphp
                @endforeach
            <td>Total Bayar :</td>
            <td></td>
            <td>Rp. <?= $total ?> </td>    
                
            </tr>
        </table>
            </div>
            <!-- Coloumn -->
            <div class="card-body col-lg-1">

            </div>
           
            <div class="card-body col-lg-5">
                <div class="row form-group">
                    @if($jual->id_status < 2)
                    <div class="col col-md-2"><i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i></div>
                    @else
                    <div class="col col-md-2"><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i></div>
                    @endif
                    <div class="col-12 col-md-6"><label for="">Konfirmasi Pembayaran</label></div>
                </div>
                <div class="row form-group">
                    @if($jual->id_status < 3)
                    <div class="col col-md-2"><i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i></div>
                    @else
                    <div class="col col-md-2"><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i></div>
                    @endif
                    <div class="col-12 col-md-8 "><label for="">Pesanan Sedang Diproduksi</label></div>
                </div>
                <div class="row form-group">
                    @if($jual->id_status < 4)
                    <div class="col col-md-2"><i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i></div>
                    @else
                    <div class="col col-md-2"><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i></div>
                    @endif
                    <div class="col-12 col-md-6"><label for="">Pesanan Selesai</label></div>
                </div>
                <div class="row form-group">
                    @if($jual->id_status < 5)
                    <div class="col col-md-2"><i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i></div>
                    @else
                    <div class="col col-md-2"><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i></div>
                    @endif
                    <div class="col-12 col-md-6"><label for="">Pesanan Telah Diterima</label></div>
                </div>
            
            
        </div>
            @endforeach
@endsection