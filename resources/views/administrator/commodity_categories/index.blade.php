@extends('layouts.app', ['title' => 'Halaman Jenis Aset', 'section_header' => 'Jenis Aset'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCommodityCategoryModal">
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
                    @foreach($commodity_categories as $key => $commodity_category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $commodity_category->name }}</td>
                        <td>{{ $commodity_category->description }}</td>
                        <td>
                            <div class="btn-group btn-group-justified">
                                <button type="button" data-toggle="modal" data-id="{{ $commodity_category->id }}" data-target="#editCommodityCategoryModal" class="btn btn-success btn-sm commodity-edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('admin.jenis-aset.destroy', $commodity_category->id) }}" method="POST">
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
@include('administrator.commodity_categories.modal.create')
@include('administrator.commodity_categories.modal.edit')
@endpush

@push('js')
@include('administrator.commodity_categories._script')
@endpush