@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Produk</h1>
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
        <h3>Produksi</h3><hr>

        <a href="/form/produk" class="btn btn-primary mb-3">Tambah Data</a>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Produksi</th>
                    <th scope="col">Stok Saat ini</th>
                    <th scope="col"> Aksi</th>
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
                <td>{{$item->jumlah_produksi}}</td>
                @if ($item->stok_produksi <= 0)
                <td>0</td>
                @else
                <td>{{$item->stok_produksi}}</td>    
                @endif
                
                
                <td><a href="/produksi/produk/{{$item->Id_produk}}" class="btn btn-primary mb-3" style="border-radius: 12px">Produksi</a></td>
                
                
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