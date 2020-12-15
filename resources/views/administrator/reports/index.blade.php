@extends('layouts.app', ['title' => 'Halaman Laporan', 'section_header' => 'Laporan'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                        title="Print">
                        <span data-toggle="modal" data-target="#filterModal">
                            <i class="fas fa-print"></i>
                        </span>
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
                        @if (auth()->user()->role_id === 1)
                        <th>Aksi</th>
                        @endif
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
                        <td>{{ indonesian_date_format($commodity->register_date) }}</td>
                        @if($commodity->condition === 'Sudah Layak')
                        <td>
                            <span class="badge badge-pill badge-success" data-toggle="tooltip" data-placement="top"
                                title="Sudah Layak">Sudah Layak</span>
                        </td>
                        @elseif($commodity->condition === 'Layak Sebagian')
                        <td>
                            <span class="badge badge-pill badge-warning" data-toggle="tooltip" data-placement="top"
                                title="Layak Sebagian">Layak Sebagian</span>
                        </td>
                        @else
                        <td>
                            <span class="badge badge-pill badge-danger" data-toggle="tooltip" data-placement="top"
                                title="Tidak Layak">Tidak Layak</span>
                        </td>
                        @endif
                        <td>{{ indonesian_date_format($commodity->update_date) }}</td>
                        <td>{{ $commodity->users->name }}</td>
                        @if(auth()->user()->role_id === 1)
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
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('modal')
@include('administrator.reports.modal.print')
@endpush

@push('js')
@include('administrator.reports._script')
@endpush