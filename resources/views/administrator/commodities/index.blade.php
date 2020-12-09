@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCommodityModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Aset</th>
                        <th>Nama</th>
                        <th>Jenis Aset</th>
                        <th>Ruangan</th>
                        <th>Jumlah</th>
                        <th>Tanggal Register</th>
                        <th>Kondisi</th>
                        <th>Tanggal Update</th>
                        <th>Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commodities as $key => $commodity)
                    <tr>
                        <td>{{ $commodity->unique_commodity_number }}</td>
                        <td>{{ $commodity->name }}</td>
                        <td>{{ $commodity->commodity_categories->name }}</td>
                        <td>{{ $commodity->commodity_locations->name }}</td>
                        <td>{{ $commodity->amount }}</td>
                        <td>{{ $commodity->register_date }}</td>
                        <td>{{ $commodity->condition }}</td>
                        <td>{{ $commodity->update_date }}</td>
                        <td>{{ $commodity->users->name }}</td>
                        <td>
                            <div class="btn-group btn-group-justified">
                                <a href="{{ route('admin.aset.edit', $commodity->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.aset.destroy', $commodity->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-notification">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modal')
@include('administrator.commodities.modal.create')
@endpush