@extends('layouts.app', ['title' => 'Halaman Ruangan', 'section_header' => 'Ruangan'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCommodityLocationModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commodity_locations as $key => $commodity_location)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $commodity_location->name }}</td>
                        <td>{{ $commodity_location->description }}</td>
                        <td>
                            <div class="btn-group btn-group-justified">
                                <button type="button" data-toggle="modal" data-id="{{ $commodity_location->id }}" data-target="#editCommodityLocationModal" class="btn btn-success btn-sm commodity-location-edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.ruangan.destroy', $commodity_location->id) }}" method="POST">
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
@include('administrator.commodity_locations.modal.create')
@include('administrator.commodity_locations.modal.edit')
@endpush

@push('js')
@include('administrator.commodity_locations._script')
@endpush