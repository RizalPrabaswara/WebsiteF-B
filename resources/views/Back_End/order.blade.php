@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail Pesanan</h1>
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
    {{-- Dashboard --}}
    <div class="container">
        <div class="row text-white">
            <!-- Jumlah Produk -->    
            <div class="card  ml-3" style="width: 15rem; background-color:#EAA110">
                <div class="card-body">
                    <h5 class="card-title">Pesanan Masuk</h5>
                    <div class="card-body-icon">
                        <img src="{{asset('/style/images/pesanan.png')}}" >    
                    </div>
                    <br><br>
                    @foreach ($pesanan as $item)
                    <div><h2>{{$item->pesanan}}</h2></div>
                    @endforeach
                </div>
            </div>
            <!-- Jumlah Produk -->
            
            <!-- Jumlah Customer -->
            <div class="card bg-success ml-3" style="width: 15rem;">
                   
                <div class="card-body">
                    <h4 class="card-title">Konfirmasi Pembayaran</h4>
                    <div class="card-body-icon">
                        <img src="{{asset('/style/images/money-tag.png')}}" >
                    </div>
                    <br><br>
                    @foreach($pembayaran as $item)
                    <div ><h2>{{$item->pembayaran}}</h2></div>
                    @endforeach
                </div>
            </div>
            <!-- Jumlah Customer -->
    
            <!-- Jumlah Supplier -->
            <div class="card bg-danger ml-3" style="width: 15rem;">
                <div class="card-body">
                    @php  
                        $biaya=0;
                    @endphp
                    @foreach($produksi as $item)
                    @endforeach
                    <h5 class="card-title">Produksi</h5>
                    <div class="ml-auto">
                        <div class="card-body-icon">
                            <img src="{{asset('/style/images/produksi.png')}}" >
                        </div>
                    </div>
                    <br><br>
                    @foreach ($produksi as $item)
                    <div><h2> {{$item->produksi}}</h2></div>
                    @endforeach
                </div>
            </div>
            <!-- Jumlah Supplier -->
            <div class="card bg-primary ml-3" style="width: 15rem;">
                <div class="card-body">
                   
                    <h5 class="card-title">Pesanan Selesai</h5>
                    <div class="ml-auto">
                        <div class="card-body-icon">
                            <img src="{{asset('/style/images/selesai.png')}}" >
                        </div>
                    </div>
                    <br><br>
                    @foreach($selesai as $item)
                    <div><h2> {{$item->selesai}}</h2></div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    
    </div>
    </div>
    {{-- Dashboard --}}
    <div class="container">
        <h3>Order</h3><hr>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Pesanan</th>
                    <th scope="col">Konfirmasi Bayar</th>
                    <th scope="col">Produksi Pesanan</th>
                    <th scope="col">Pesanan Selesai</th>
                    <th scope="col">Pesanan Diterima</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($produk as $item)
                <tr>
                <td>{{$item->nama_pelanggan}} <br> {{$item->Nama_produk}} </td>
                
                <td>Status : <br>
                    @if($item->id_status < 2)
                    <font style="color: red">Belum Melakukan Pembayaran</font> <br>
                    <a class="btn btn-success" href="/bayar/{{$item->Id_penjualan}}">Konfirmasi</a>
                    @else
                    <font style="color: green">Sudah Melakukan Pembayaran</font>
                    @endif
                </td>
                <td>Status : <br>
                    @if($item->id_status == 2 )
                    <form action="/produksi/selesai" method="post">
                        @csrf
                        <input type="hidden" name="produk" value="{{$item->id_produk}}">
                        <input type="hidden" name="id_jual" value="{{$item->Id_penjualan}}">
                        <input type="hidden" name="deskripsi" value="{{$item->Nama_produk}}">
                        <input type="hidden" name="jumlah" value="{{$item->jumlah}}">
                        <font style="color: red">Pesanan Belum Diproduksi</font> <br>
                        <button type="submit" class="btn btn-success btn-sm">
                            Produksi
                          </button>
                    </form>
                    @elseif($item->id_status == 3 || $item->id_status >3)
                    <font style="color: green">Pesanan Sudah Diproduksi</font>
                    @endif</td>
                <td>Status : <br>
                    
                    @if($item->id_status == 3)
                    <font style="color: red">Pesanan Belum Selesai</font> <br>
                    <a class="btn btn-success" href="/selesai/{{$item->Id_penjualan}}">Selesai</a>
                    @elseif($item->id_status == 4 || $item->id_status > 4)
                    <font style="color: green">Pesanan Sudah Selesai</font>
                    @endif</td>
                <td>Status : <br>
                
                    @if($item->id_status == 4)
                    <font style="color: red">Pesanan Belum Diterima Pembeli</font> <br>
                    <a class="btn btn-success" href="/terima/{{$item->Id_penjualan}}">Konfirmasi Penerimaan</a>
                    @elseif($item->id_status == 5)
                    <font style="color: green">Pesanan Sudah Diterima Pembeli</font>
                    @endif</td>
                </tr>
                @endforeach 
                </tbody>
        </table>
        
    <!-- Table -->
</div>
{{$produk->links()}}
    </div>

@endsection