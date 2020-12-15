@extends('layouts.app', ['title' => 'Halaman Ubah Aset', 'section_header' => 'Ubah Aset'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <a href="{{ route('admin.laporan.ubah-aset.print') }}" target="_blank" class="btn btn-primary"
                        data-toggle="tooltip" data-placement="top" title="Print">
                        <i class="fas fa-print"></i>
                    </a>

                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#commodityUpdateModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Aset</th>
                        <th>Aset Lama</th>
                        <th>Aset Baru</th>
                        <th>Jenis Aset</th>
                        <th>Ruangan</th>
                        <th>Jumlah</th>
                        <th>Tanggal Update</th>
                        <th>Pengguna</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commodity_updates as $key => $commodity_update)
                    <tr>
                        <td>{{ $commodity_update->commodities->unique_commodity_number }}</td>
                        <td>{{ $commodity_update->commodities->name }}</td>
                        <td>{{ $commodity_update->commodities->name }}</td>
                        <td>{{ $commodity_update->commodity_categories->name }}</td>
                        <td>{{ $commodity_update->commodity_locations->name }}</td>
                        <td>{{ $commodity_update->amount }}</td>
                        <td>{{ indonesian_date_format($commodity_update->update_date) }}</td>
                        <td>{{ $commodity_update->users->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modal')
@include('administrative-staff.update-commodities.modal.create')
@endpush

@push('js')
@include('administrative-staff.update-commodities._script')
@endpush