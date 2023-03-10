@extends('Front_End.layout')

@section('konten')
<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <h3 class="text-center" style="color: white;">RECOMENDED <br> PRODUK</h3>
        <hr style="border-width: 5px; background-color:grey">
    </div>
</div>
<div class="container">
    <!-- Coloumn -->
    @foreach($produk as $item)
    <div class="row text-white">
    <div class="card bg-transparent ml-4" style="width: 18rem;">
            <div class="card-body-icon">
          <center><a href="/detail/{{$item->Id_produk}}"><img src="{{ asset('foto_produk/'.$item->foto_produk)  }}" style="height:200px;width:200px;margin-top:10px;" ></a></center>  
            </div>
        <div class="card-body">
            <h5 class="card-title text-white">{{$item->Nama_produk}}</h5>
            <p class="card-text text-white">Rp {{$item->Harga_jual}}</p>
        </div>
    </div>
    <!-- Coloumn -->
    @endforeach              
       </div>
@endsection