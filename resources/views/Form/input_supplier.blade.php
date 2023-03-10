@extends('template')

@section('konten')

<div class="col md-10 p-5 pt-2">
        <h3>Form Produk</h3><hr>

        <div class="col-lg-8">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body card-block">
                        <form action="/supplier/tambah" method="post"  class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Nama Supplier</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="nama" name="nama" placeholder="Nama Supplier" class="form-control"></div>
                          </div>
                          <div class="form-group">
                            <label class="col col-md-3" for="produk">Produksi</label>
                            <select class="custom-select col-md-5 col-12 col-lg-5" id="bahanbaku" name="bahan">
                                <option selected>Bahan Baku</option>
                                @foreach($bahanbaku as $item)
                                <option value="{{$item->Id_bahan_baku}}">{{$item->Nama_bahan}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Tempat/Alamat</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="jumlah" name="tempat" placeholder="Tempat Supplier" class="form-control"></div>
                          </div>
                         
                          </div>
                          </div>
                         
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
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