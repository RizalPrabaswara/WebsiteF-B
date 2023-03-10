@extends('Front_End.layout')

@section('konten')
<div class="container">
    <div class=" mt-5">
        
    </div>
</div>
<div class="container">
    <!-- Coloumn -->
    @foreach($produk as $item)
    <div class="row text-white">
    <div class="card bg-transparent ml-4" style="width: 18rem;">
        <h3 class="text-center" style="color: white;">Form Pesanan</h3>
        <hr style="border-width: 5px; background-color:grey">
            <div class="card-body-icon">
           <center> <h5 class="card-title text-white">{{$item->Nama_produk}}</h5></center>
          <center><img src="{{ asset('foto_produk/'.$item->foto_produk)  }}" style="height:200px;width:200px;margin-top:10px;" ></a></center>  
            </div>
    </div>
    @endforeach              
    <div class="card-body col-lg-1">

    </div>
    <div class="card-body ">
        <form action="/input/pesanan" method="post"  class="form-horizontal" >
            {{csrf_field()}}
            @foreach ($produk as $item)
            <input type="hidden" name="pelanggan" value="{{Auth::user()->id}}">
            <div class="row form-group after-add">
              <label class="col col-md-2" for="produk">Produk</label>
                  <select class="custom-select col-lg-5 bahanbaku" id="produk" name="produk[]">
                      <option value="{{$item->Id_produk}}" selected>{{$item->Nama_produk}}</option>
                      @endforeach
                      @foreach($list_produk as $pr)
                      <option id="produk-{{$pr->Id_produk}}" data-harga="{{$pr->Harga_jual}}" value="{{$pr->Id_produk}}">{{$pr->Nama_produk}}</option>
                      @endforeach
                  </select>
                   <div class="col-12 col-md-2"><input type="number" id="jumlah" name="jumlah[]" placeholder="Jumlah Pakai" class="form-control"></div>
              <div class="col-lg-1">
                <button type="button" class="btn btn-success add"><i class="fa fa-plus-circle"></i>&nbsp;Tambah Pesanan</button>
              </div>
            </div>
              <div class=" form-group">
                <label class="col col-md-2" for="produk">Via</label>
                <select class="custom-select col-lg-5" id="via" name="via">
                    <option selected>Pilih Pembayaran</option>
                    <option value="rekening">Rekening</option>
                    <option value="gopay">Gopay</option>
                    <option value="ovo">Ovo</option>
                </select>
              </div>
              <div class="row">
                <button  type="submit" style="background: white" class="btn btn-sm">
                    <font style="color: red">Pesan</font>
                  </button>
                  
              </div>
            </form>
    </div>
    <!-- Coloumn -->
       </div>

{{-- Form Tambahan --}}
<div class="copy" id="copy">

  <div class="row form-group">
    <label class="col col-md-2" for="produk">Tambahan</label>
    <select class="custom-select col-md-5 " id="produk" name="produk[]">
        <option selected>Pilih Produk</option>
        @foreach($list_produk as $item)
        <option value="{{$item->Id_produk}}">{{$item->Nama_produk}}</option>
        @endforeach
    </select>
    <div class="col-12 col-md-2"><input type="number" name="jumlah[]" placeholder="Jumlah Pakai" class="form-control"></div>
    <div class="col-md-2">
    <button type="button" class="btn btn-danger remove"><i class="fa fa-minus-circle"></i>&nbsp;Cancel</button>
    </div>
  </div>
  </div>
  {{-- Form Tambahan --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
      document.getElementById("copy").style.visibility="hidden";
    $(".add").click(function(){ 
        var html = $(".copy").html();
        $(".after-add").after(html);
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".form-group").remove();
    });

    
  });

    

</script>

@endsection