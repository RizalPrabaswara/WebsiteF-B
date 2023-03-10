@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Bahan Baku</h1>
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
        <h3>Bahan Baku</h3><hr>

        <a href="/form/bahan" style="border-radius: 12px" class="btn btn-primary mb-3">Tambah Data</a>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID Bahan Baku</th>
                    <th scope="col">Nama Bahan Baku</th>
                    <th scope="col">Kadaluarsa</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Status</th>
                    <th colspan="2" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bahanbaku as $item)
                <tr>
                <td>{{$item->Id_bahan_baku}}</td>
                <td>{{$item->Nama_bahan}}</td>
                <td>{{$item->kadaluarsa}}</td>
                <td>{{$item->stok}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{$item->status}}</td>
                <td><a class="btn btn-primary" style="border-radius: 12px"  data-toggle="modal" data-target="#updateModal-{{$item->Id_bahan_baku}}">Update</a></td>
                </tr>
                @endforeach 
                </tbody>
        </table>
    <!-- Table -->
</div>


<!-- Modal Update -->
@foreach ($bahanbaku as $item)
<div class="modal fade" id="updateModal-{{$item->Id_bahan_baku}}" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModal-{{$item->Id_bahan_baku}}">Update Bahan Baku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/update/bahan" method="post"  id="editForm" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" id="id" name="id" value="{{$item->Id_bahan_baku}}">
        <div class="row form-group">
        <div class="col col-md-3"><label for="id" class=" form-control-label">Nama</label></div>
        <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" value="{{$item -> Nama_bahan}}" class="form-control" readonly></div>
        </div>
        <div class="row form-group">
        <div class="col col-md-3"><label for="satuan" class="form-control-label">Satuan</label></div>
        <div class="col-12 col-md-9"><input type="text" id="satuan" name="satuan" class="form-control" value="{{$item -> satuan}}" ></div>
        </div>
        <div class="row form-group">
        <div class="col col-md-3"><label for="stock" class="form-control-label">Stock</label></div>
        <div class="col-12 col-md-9"><input type="number" id="stock" name="stock" class="form-control" value="{{$item ->stok}}" disabled></div>
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
        <button type="button" style="border-radius: 12px" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" style="border-radius: 12px" id="submit" class="btn btn-primary">Update Data</button>
        </form>
      </div>
    </div>
  </div>
</div>    
@endforeach

<!-- Modal Update -->

<!-- Modal Delete-->
@foreach ($bahanbaku as $item)
    <div class="modal fade" id="deleteModal-{{$item->Id_bahan_baku}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal">HAPUS DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/delete/bahan" method="post">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$item->Id_bahan_baku}}">
        <h5>Apakah anda yakin ingin menghapus bahan baku <strong style="color:red">{{$item -> Nama_bahan}}</strong> ?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endforeach

@endsection