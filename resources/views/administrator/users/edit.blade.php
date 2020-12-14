@extends('layouts.app', ['title' => 'Halaman Edit Pengguna', 'section_header' => 'Edit ' . $user->name])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
    </div>
    <div class="col-lg-6">
        <div class="card">
            <form action="{{ route('admin.pengguna.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <table class="table">
                    <tr>
                        <td style="width: 145px;">ID Pengguna</td>
                        <td style="width: 10px;">:</td>
                        <td class="text-wrap">
                            <input type="text"
                                class="form-control{{ $errors->has('unique_user_number') ? ' is-invalid' : '' }}"
                                name="unique_user_number" id="unique_user_number"
                                value="{{ $user->unique_user_number }}" required>

                            @if($errors->has('unique_user_number'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('unique_user_number') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" id="name" value="{{ $user->name }}" required>

                            @if($errors->has('name'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <select class="form-control" name="gender" id="gender" required>
                                <option selected>Pilih..</option>
                                <option value="Laki-laki" {{ $user->gender === 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ $user->gender === 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>

                            @if($errors->has('gender'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('gender') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                name="email" id="email" value="{{ $user->email }}" required>

                            @if($errors->has('email'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <div class="input-group mb-3">
                                <input type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" id="password" value="{{ $user->password }}"
                                    placeholder="Masukkan password.." required>
                                <div class="input-group-prepend show-password">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" id="eye"></i>
                                    </span>
                                </div>
                            </div>

                            @if($errors->has('password'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                </table>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <table class="table">
                <tr>
                    <td style="width: 145px;">Nomor Telepon</td>
                    <td style="width: 10px;">:</td>
                    <td class="text-wrap">
                        <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                            name="phone_number" id="phone_number" value="{{ $user->phone_number }}" required>

                        @if($errors->has('phone_number'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('phone_number') }}
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td class="text-wrap">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="photo" id="photo">
                            <label class=" custom-file-label">Choose file...</label>
                        </div>

                        @if($errors->has('photo'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('photo') }}
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td class="text-wrap">
                        <select class="form-control" name="role_id" id="role_id" required>
                            <option selected>Pilih..</option>
                            @foreach($roles as $key => $role)
                            <option value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('role_id'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('role_id') }}
                        </div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success text-white">Simpan Perubahan</button>
        </div>

        </form>

    </div>
</div>
@endsection