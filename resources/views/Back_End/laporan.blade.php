@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan</h1>
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
    

        <h3>Laporan</h3><hr>
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline" method="POST" action="/pilih/laporan">
              @csrf
              <input class="form-control mr-sm-2" type="date" >
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Submit</button>
              
            </form>
          </nav>

            <table id="dataBahan" class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Total Pendapatan</th>
                    <th scope="col">Total Pengeluaran</th>
                    <th scope="col">Laba-Rugi</th>
                    <th scope="col">Periode Laporan</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($pendapatan as $item => $value)
                        
                        <tr>
                        <td>Rp. {{$value->pendapatan}}</td>
                        <td>Rp. {{$value->ttl_keluar}}</td>
                        <td>Rp. @php
                            echo $value->pendapatan-$value->ttl_keluar
                        @endphp</td>
                        <td>{{$value->tanggal_pesanan}}</td>
                         <td>  <a href="/Laporan/Detail/{{$value->tanggal_pesanan}}" style="border-radius: 12px" class="btn btn-primary mb-3">Detail Laporan</a></td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    <!-- Table -->
</div>
@endsection

