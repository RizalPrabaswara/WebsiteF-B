@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu</h1>
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
        <h3>Produk</h3><hr>

        <a href="/form/produk" class="btn btn-primary mb-3">Tambah Data</a>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                @foreach($produk as $item)
                <tr>
                <td>@php
                    echo $i;
                @endphp</td>
                <td>{{$item->Nama_produk}}</td>
                <td>{{$item->Harga_jual}}</td>
                @endif
                
                </tr>
                </tbody>
                @php
                    $i++;
                @endphp
                @endforeach    
        </table>
    <!-- Table -->
</div>




@endsection