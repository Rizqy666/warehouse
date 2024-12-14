@extends('layouts.master')
@section('title', 'Dashboard')
@section('breadcrumb')
    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
@endsection
@push('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalIn }}</h3>

                    <p>Barang Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('barang.masuk.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalOut }}</h3>

                    <p>Barang Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('barang.keluar.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalStock }}</h3>

                    <p>Total Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>

                    <p>Daftar User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>

                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
