@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Pengguna</h4>
                </div>
                <div class="card-body">
                    10
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-th-large"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jenis Aset</h4>
                </div>
                <div class="card-body">
                    42
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Ruangan</h4>
                </div>
                <div class="card-body">
                    1,201
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-boxes"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Jumlah Aset</h4>
                </div>
                <div class="card-body">
                    47
                </div>
            </div>
        </div>
    </div>
</div>
@endsection