@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail Pembelian</h1>
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
        <h3>Pembelian</h3><hr>

        <a href="/pembelian" style="border-radius: 12px" class="btn btn-primary mb-3">Tambah Data</a>
    <!-- Table -->
            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Supplier</th>
                    <th scope="col">Nama Bahan Baku</th>
                    <th scope="col">Jumlah Beli</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">Total Pengeluaran</th>
                    <th scope="col">Tanggal Pembelian</th>
                    <th scope="col">Stok Terbaru</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pembelian as $item)
                <tr>
                <td>{{$item->nama_supplier}} &nbsp; ( {{$item->tempat}} ) </td>
                <td>{{$item->Nama_bahan}}</td>
                <td>{{$item->jumlah_beli}}</td>
                <td>{{$item->harga_beli}}</td>
                <td>{{$item->total_pengeluaran}}</td>
                <td>{{$item->tanggal_pembelian}}</td>
                <td>{{$item->stok}} &nbsp; {{$item->satuan}}</td>
                </tr>
                @endforeach 
                </tbody>
        </table>
    <!-- Table -->
</div>
@endsection