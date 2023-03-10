@extends('Front_End.layout')

@section('konten')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <h3 class="text-center" style="color: white;">Konfirmasi Pesanan</h3>
        <hr style="border-width: 5px; background-color:grey">
    </div>
</div>


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
                    @foreach ($produk as $item)
                        @php
                        $total=0;
                        $total=$item->total;

                        @endphp
                    @endforeach
                <td>Total Bayar :</td>
                <td></td>
                <td>Rp. <?= $total ?> </td>    
                    
                </tr>
            </table>
            </div>

            <div class="card-footer">
                <form action="/konfirmasi" method="post">
                    @csrf
                    @foreach ($users as $item)
                        @if ($item->id_pengguna == Auth::user()->id)
                        <input type="hidden" name="penjualan[]" value="{{$item->Id_penjualan}}">
                        <input type="hidden" name="user" value="{{$item->nama_pelanggan}}">
                        <input type="hidden" name="produk[]" value="{{$item->Nama_produk}}">
                        <input type="hidden" name="alamat" value="{{$item->alamat}}">
                        <input type="hidden" name="telp" value="{{$item->no_telp}}">
                        <input type="hidden" name="jumlah[]" value="{{$item->jumlah}}"> 
                        <input type="hidden" name="total[]" value="{{$item->bayar}}">
                        @endif
                        
                    @endforeach
                    <div class="row">
                        <button  type="submit" style="background: white" class="btn btn-sm">
                            <font style="color: red">Konfirmasi Pesanan</font>
                          </button>
                          
                      </div>
                </form>
            </div>

            <!-- Coloumn -->



@endsection