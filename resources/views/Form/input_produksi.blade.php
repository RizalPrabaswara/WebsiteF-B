@extends('template')

@section('konten')

<div class="col md-10 p-5 pt-2">
        <h3>Form Produksi</h3><hr>

        <div class="col-lg-8">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body card-block">
                        <form action="/input/produksi" method="post"  class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @foreach ($produk as $item)
                        
                        <input type="hidden" name="produk" value="{{$item->Id_produk}}">
                        <div class="row form-group">
                          <div class="col col-md-3"><label for="harga" class=" form-control-label">Produksi</label></div>
                          <div class="col-12 col-md-5"><input type="text" id="nama" name="nama" value="{{$item->Nama_produk}}" class="form-control"></div>
                        </div>
                        @endforeach
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Jumlah Produksi</label></div>
                            <div class="col-12 col-md-5"><input type="number" id="jumlah" name="jumlah" placeholder="Jumlah Produksi" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Biaya Produksi</label></div>
                            <div class="col-12 col-md-5"><input type="number" id="jumlah" name="biaya" placeholder="Biaya Produksi" class="form-control"></div>
                          </div>
                          @foreach ($detail_bahan_baku as $key)
                          <input type="hidden" name="bahan[]" value="{{$key->bahan_baku_ID}}">
                          <input type="hidden" name="pakai[]" value="{{$key->jumlah_pakai}}">
                          @endforeach
                          </div>
                          </div>

                        
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
                      </div>
</div>


<!-- Form Tambahan -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



@endsection