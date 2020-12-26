@extends('layouts.app', ['title' => 'Halaman Dashboard', 'section_header' => 'Dashboard'])

@section('content')
@include('utilities.flash-messages')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{ route('admin.pengguna.index') }}">
                <div class="card-icon bg-primary pr-1">
                    <i class="far fa-user"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Pengguna</h4>
                </div>
                <div class="card-body count">
                    {{ count($users) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{ route('admin.jenis-aset.index') }}">
                <div class="card-icon bg-danger pr-1">
                    <i class="fas fa-th-large"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jenis Aset</h4>
                </div>
                <div class="card-body count">
                    {{ count($commodity_categories) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{ route('admin.ruangan.index') }}">
                <div class="card-icon bg-warning pr-1">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Ruangan</h4>
                </div>
                <div class="card-body count">
                    {{ count($commodity_locations) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <a href="{{ route('admin.aset.index') }}">
                <div class="card-icon bg-success pr-1">
                    <i class="fas fa-boxes"></i>
                </div>
            </a>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Aset</h4>
                </div>
                <div class="card-body count">
                    {{ count($commodities) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
@include('profile-modal')
@endpush