@extends('layouts.app', ['title' => 'Halaman Pengguna', 'section_header' => 'Pengguna'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
        <div class="card px-3 py-3 table-reponsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        Tambah Data
                    </button>
                </div>
            </div>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Pengguna</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Foto</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $user->unique_user_number }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <img src="{{ $user->photo }}" class="img-thumbnail w-80" alt="{{ $user->name }}">
                        </td>
                        <td>{{ $user->roles->name }}</td>
                        <td>
                            <div class="btn-group btn-group-justified">
                                <a href="{{ route('admin.pengguna.edit', $user->id) }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}" method="POST">
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
@include('administrator.users.modal.create')
@endpush