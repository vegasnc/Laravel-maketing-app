 @extends('layouts.app')
 @section('title','Dashboard')
 @section('judul','Dashboard')
 @section('content')
 <div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="iconly-boldShow"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Jumlah Member</h6>
                        <h6 class="font-extrabold mb-0">{{ $member }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                        <h6 class="font-extrabold mb-0">{{ $barang }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon green">
                            <i class="iconly-boldAdd-User"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Jumlah Transaksi</h6>
                        <h6 class="font-extrabold mb-0">{{ $transaksi }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Selamat Datang : </h6>
                        <h6 class="font-extrabold mb-0">{{ Auth::user()->name }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection