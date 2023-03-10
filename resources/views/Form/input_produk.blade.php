@extends('template')

@section('konten')

<div class="col md-10 p-5 pt-2">
        <h3>Form Produk</h3><hr>

        <div class="col-lg-8">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body card-block">
                        <form action="/input/produk" method="post"  class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                          <div class="row form-group" id="nama">
                            <div class="col col-md-3"><label for="id" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-6"><input type="text" id="nama" name="nama" placeholder="Nama Produk" class="form-control"></div>
                          </div>
                          <div class="row form-group" id="formStatus">
                            <div class="col col-md-3 form-control-label"><label for="deskripsi" class=" form-control-label">Status</label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" onChange="getValue(this)" type="radio" name="status" id="statusMenu" value="Menu">
                                <label class="form-check-label" for="status">Menu</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" onChange="getValue(this)" type="radio" name="status" id="statusBukan" value="Bukan Menu">
                                <label class="form-check-label"   for="status">Bukan Menu</label>
                                </div>
                            </div>
                          <div class="row form-group" id="formHarga">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Harga</label></div>
                            <div class="col-12 col-md-6"><input type="number" id="harga" name="harga" placeholder="800000" class="form-control"></div>
                          </div>
                          <div class="row form-group" id="formDesk">
                            <div class="col col-md-3"><label for="deskripsi" class=" form-control-label">Deskripsi Produk</label></div>
                            <div class="col-12 col-md-6"> <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea></div>
                          </div>
                         
                          <div class="row form-group" id="formFoto">
                            <div class="custom-file">
                              <div class="col col-md-3"><label for="deskripsi" class=" form-control-label">Foto Produk</label></div>
                              <div class="col-12 col-md-6"> 
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="customFile">Pilih Foto Produk</label>
                              </div>
                          </div>
                          </div>
                          <div class="row form-group after-add" id="formBahan">
                            <label class="col col-md-3" for="produk">Bahan Baku</label>
                            <select class="custom-select col-lg-5" id="bahanbaku" name="bahan[]">
                                <option selected>Pilih Bahan Baku</option>
                                @foreach($bahanbaku as $item)
                                <option value="{{$item->Id_bahan_baku}}">{{$item->Nama_bahan}}</option>
                                @endforeach
                            </select>
                            <div class="col-sm-1">
                              <button type="button" class="btn btn-success add" ><i class="fa fa-plus-circle"></i></button>
                            </div>
                          </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
                      </div>
</div>


<!-- Form Tambahan -->
<div class="copy" id="copy">

  <div class="row form-group">
    <label class="col col-md-2" for="produk">Bahan Baku</label>
    <select class="custom-select col-md-5 " id="bahanbaku" name="bahan[]">
        <option selected>Pilih Bahan Baku</option>
        @foreach($bahanbaku as $item)
        <option value="{{$item->Id_bahan_baku}}">{{$item->Nama_bahan}}</option>
        @endforeach
    </select>
    <div class="col-md-2">
    <button type="button" class="btn btn-danger remove"><i class="fa fa-minus-circle"></i></button>
    </div>
  </div>
  </div>
<!-- Form Tambahan -->
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
    function getValue(x){
      if (x.value == 'Bukan Menu') {
        document.getElementById("formHarga").style.visibility="hidden";
        document.getElementById("formDesk").style.visibility="hidden";
        document.getElementById("formFoto").style.visibility="hidden";
      }
      else{
        document.getElementById("formHarga").style.visibility="visible";
        document.getElementById("formDesk").style.visibility="visible";
        document.getElementById("formFoto").style.visibility="visible";
      }
    }
</script>
<script>
  $('#foto').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
</script>

@endsection