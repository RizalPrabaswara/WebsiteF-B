@extends('Front_End.layout')

@section('konten')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <h3 class="text-center" style="color: white;">Detail Produk</h3>
        <hr style="border-width: 5px; background-color:grey">
    </div>
</div>
<div class="container">
    <!-- Coloumn -->
    @foreach($produk as $item)
    <div class="row text-white">
    <div class="card bg-transparent ml-4" style="width: 18rem;">
            <div class="card-body-icon">
           <center> <h5 class="card-title text-white">{{$item->Nama_produk}}</h5></center>
          <center><img src="{{ asset('foto_produk/'.$item->foto_produk)  }}" style="height:200px;width:200px;margin-top:10px;" ></a></center>  
            </div>
    </div>
    <div class="card-body">
        <div>
            <label for="">Keterangan :</label>
            <br>
            <h5 class="card-title text-white">{{$item->Deskripsi_produk}}</h5>
        </div>
        <br>
        <h2 class="card-text text-white">Rp {{$item->Harga_jual}}</h2>
    </div>
    
    <div class="ml-auto col-3">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <button style="border-radius: 12px; background-color:white;" type="submit">
           <a href="/pesan/{{$item->Id_produk}}"> <h4 style="color: red">PESAN</h4></button></a>
    </div>
    <!-- Coloumn -->
    @endforeach              
       </div>
@endsection