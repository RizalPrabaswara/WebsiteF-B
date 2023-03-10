@extends('template')

@section('konten')


<div class="col md-10 p-5 pt-2">
        <h3>Form Pembelian</h3><hr>

        <div class="col-lg-8">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body card-block">
                        <form action="/input/pembelian" method="post"  class="form-horizontal" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row form-group">
                            <label class="col col-md-3" for="produk">Bahan Baku</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select col-lg-5 bahanbaku" id="bahanbaku" name="bahanbaku">
                                    <option selected>Pilih Bahan Baku</option>
                                    @foreach($supplier as $item)
                                    <option data-nama="{{$item->Nama_bahan}}" id="bahan-{{$item->Id_bahan_baku}}" data-stok="{{$item->stok}}" value="{{$item->Id_bahan_baku}}">
                                      {{$item->Nama_bahan}}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <label class="col col-md-3" for="produk">Supplier</label>
                            <div class="col-12 col-md-9">
                                <select class="custom-select col-lg-5 bahanbaku" id="bahanbaku" name="supplier">
                                    <option selected>Pilih supplier</option>
                                    @foreach($supplier as $item)
                                    <option value="{{$item->id_supplier}}">{{$item->nama_supplier}} ({{$item->tempat}})</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="date" class=" form-control-label">Tanggal Pembelian</label></div>
                                <div class="col-12 col-md-4"><input type="date" id="tgl" name="tgl" class="form-control" ></div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3"><label for="jumlah" class=" form-control-label">Harga Beli</label></div>
                              <div class="col-12 col-md-5"><input type="number" id="harga" name="harga" placeholder="Masukkan Harga Beli" class="form-control"></div>
                            </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="jumlah" class=" form-control-label">Jumlah Beli</label></div>
                                <div class="col-12 col-md-5"><input type="number" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah Pembelian" class="form-control"></div>
                              </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="harga" class=" form-control-label">Total Pengeluaran</label></div>
                            <div class="col-12 col-md-5"><input type="number" id="total" name="total" placeholder="Total Pengeluaran" class="form-control" readonly></div>
                            <input type="hidden" name="hb" id="hb">
                          </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
                      </div>
</div>


{{-- Table Bahan Baku --}}
  <!-- Table -->
  <div class="tabel_bahan" id="tabel_bahan">
    <table id="dataBahan" class="table">
      <thead class="thead-warning">
          <tr>
          <th scope="col">Nama Bahan Baku</th>
          <th scope="col">Stock Saat Ini</th>
          </tr>
      </thead>
      <tbody>
      <tr>
      <td><input type="text" style="background: none; border:none; outline:none;" name="nama_bahan" id="nama_bahan" disabled></td>
      <td><input type="text" style="background: none; border:none; outline:none;" name="stok_bahan" id="stok_bahan" disabled></td>
      </tr>
      </tbody>
  </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        document.getElementById("tabel_bahan").style.visibility="hidden";
      $(".bahanbaku").change(function(){ 
        document.getElementById("tabel_bahan").style.visibility="visible";
        var ambilnama = $("#bahan-"+this.value).data('nama');
        var ambilstok = $("#bahan-"+this.value).data('stok');
        $("#nama_bahan").val(ambilnama);
        $("#stok_bahan").val(ambilstok);
          $(".card").after(html);
      });
      
      $(document).ready(function(){
       $("#jumlah").keyup(function(){
           var total = parseInt($("#jumlah").val()) * parseInt($("#harga").val());
           $("#total").val(total);
       })
   })
  
    });
    
  </script>
<!-- Table -->
{{-- Table Bahan Baku --}}

@endsection