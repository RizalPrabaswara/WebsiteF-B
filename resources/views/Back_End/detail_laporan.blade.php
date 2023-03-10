@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail Laporan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('konten')
<div class="col md-10 p-5 pt-2">
        <h3>Laporan</h3><hr>

            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Nama Bahan</th>
                    <th scope="col">Total Penggunaan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Biaya Produksi</th>
                    <th scope="col">Total Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_laporan as $item)
                    <tr>
                       <td>{{$item->Nama_bahan}}</td>
                       <td>{{$item->total_penggunaan}} Kg</td>
                       <td>Rp. {{$item->harga_beli}}</td>
                       <td>Rp. {{$item->biaya_produksi}}</td>
                       <td align="left">Rp. {{$item->pengeluaran}}</td>
                    </tr>
                    @endforeach

                
                    <tr> 
                        <td colspan="4" align="right"> Total Pendapatan :</td>
                        @php
                            $biaya = 0;
                        @endphp
                         @foreach ($pengeluaran as $key)
                         
                        <td align="left">Rp. {{$key->ttl_keluar}}</td>
                        @endforeach
                            
                        </tr>
                </tbody>
        </table>
<br><br><hr style="border-width: 10px"><br><br>
        <table id="dataBahan" class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga Produk</th>
                <th scope="col">Jumlah Jual</th>
                <th scope="col">Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($detail_produk as $dp)
                    <tr>
                    <td>{{$dp->Nama_produk}}</td>
                    <td>Rp {{$dp->Harga_jual}}</td>
                    <td>{{$dp->jumlah}}</td>
                    <td>Rp {{$dp->pendapatan}}</td>                        
                    </tr>
                    @endforeach

                <tr> 
                    <td colspan="3" align="right"> Total Pendapatan :</td>
                    @foreach ($pendapatan as $item)
                    <td>Rp. {{$item->pendapatan}}</td>    
                    @endforeach
                        
                    </tr>
            </tbody>
    </table>
    <!-- Table -->

    <div class="col-sm-6">
        @php
        $biaya = 0;
    @endphp
     @foreach ($pengeluaran as $key)
    
     @endforeach
    @foreach ($pendapatan as $item)
    <td>Laba Rugi : Rp. @php
      echo   $item->pendapatan-$key->ttl_keluar ;
    @endphp
    @endforeach
        </td>
        
        <br>
        @foreach ($laris as $l)
            Produks Terlaris : {{$l->Nama_produk}} ({{$l->laris}} Porsi)
        @endforeach

    </div>
</div>
@endsection

