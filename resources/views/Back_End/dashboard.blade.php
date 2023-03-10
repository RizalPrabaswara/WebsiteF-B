@extends('template')

@section('breadcumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
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
<div class="container">
    <div class="row text-white">
        <!-- Jumlah Produk -->    
        <div class="card bg-info ml-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Penjualan</h5>
                <div class="card-body-icon">
                    <img src="{{asset('/style/images/transaction.png')}}" >    
                </div>
                <br><br>
                @foreach ($penjualan as $item)
                <div><h2>{{$item->penjualan}}</h2></div>
                @endforeach
            </div>
        </div>
        <!-- Jumlah Produk -->
        
        <!-- Jumlah Customer -->
        <div class="card bg-success ml-3" style="width: 18rem;">
               
            <div class="card-body">
                <h5 class="card-title">Pemasukan</h5>
                <div class="card-body-icon">
                    <img src="{{asset('/style/images/money-tag.png')}}" >
                </div>
                <br><br>
                @foreach($pendapatan as $item)
                <div ><h2> Rp. {{$item->pendapatan}}</h2></div>
                @endforeach
            </div>
        </div>
        <!-- Jumlah Customer -->

        <!-- Jumlah Supplier -->
        <div class="card bg-danger ml-3" style="width: 18rem;">
            <div class="card-body">
                @php  
                    $biaya=0;
                @endphp
                @foreach($pengeluaran as $item)
                @php
                    $biaya += $item->ttl_keluar;
                @endphp
                @endforeach
                <h5 class="card-title">Pengeluaran</h5>
                <div class="ml-auto">
                    <div class="card-body-icon">
                        <img src="{{asset('/style/images/down.png')}}" >
                    </div>
                </div>
                <br><br>
                <div><h2> Rp. <?= $biaya ?></h2></div>
            </div>
        </div>
        <!-- Jumlah Supplier -->
    </div>

</div>
</div>

@endsection