@extends('template')

@section('konten')
<div class="col md-10 p-5 pt-2">
        <h3>Form Bahan Baku</h3><hr>

        <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                      </div>
                      <div class="card-body card-block">
                        <form action="/input/bahan" method="post"  class="form-horizontal">
                        {{csrf_field()}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="id" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Nama Bahan Baku" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="satuan" class="form-control-label">Satuan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="satuan" name="satuan" class="form-control" placeholder="Kg, Buah, Potong"></div>
                          </div>
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="stock" class="form-control-label">Status</label></div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Aktif">
                                <label class="form-check-label"  for="status">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Aktif">
                                <label class="form-check-label"  for="status">Tidak Aktif</label>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        </form>
                      </div>
</div>
@endsection