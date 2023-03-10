@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Supplier</h1>
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
        <h3>Supplier</h3><hr>

        <a href="/supplier/input" style="border-radius: 12px" class="btn btn-primary mb-3">Tambah Data</a>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">ID Supplier</th>
                    <th scope="col">Nama Supplier</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Nama Bahan Baku</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($supplier as $item)
                <tr>
                <td>{{$item->id_supplier}}</td>
                <td>{{$item->nama_supplier}}</td>
                <td>{{$item->tempat}}</td>
                <td>{{$item->Nama_bahan}}</td>
        
                </tr>
                @endforeach 
                </tbody>
        </table>
    <!-- Table -->
</div>

@endsection