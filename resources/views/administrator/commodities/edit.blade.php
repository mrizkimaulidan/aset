@extends('layouts.app', ['title' => 'Halaman Edit','section_header' => 'Edit'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        @include('utilities.flash-messages')
    </div>
    <div class="col-lg-6">
        <div class="card">
            <form action="{{ route('admin.aset.update', $commodity->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <table class="table">
                    <tr>
                        <td style="width: 145px;">ID Aset</td>
                        <td style="width: 10px;">:</td>
                        <td class="text-wrap">
                            <input type="text"
                                class="form-control{{ $errors->has('unique_commodity_number') ? ' is-invalid' : '' }}"
                                name="unique_commodity_number" id="unique_commodity_number"
                                value="{{ $commodity->unique_commodity_number }}" required>

                            @if($errors->has('unique_commodity_number'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('unique_commodity_number') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name" id="name" value="{{ $commodity->name }}" required>

                            @if($errors->has('name'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <input type="number" class="form-control" name="amount" id="amount"
                                value="{{ $commodity->amount }}" required>

                            @if($errors->has('amount'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('amount') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Aset</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <select class="form-control" name="commodity_category_id" id="commodity_category_id"
                                required>
                                <option selected>Pilih..</option>
                                @foreach($commodity_categories as $key => $commodity_category)
                                <option value="{{ $commodity_category->id }}"
                                    {{ $commodity->commodity_category_id === $commodity_category->id ? 'selected' : '' }}>
                                    {{ $commodity_category->name }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('commodity_category_id'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('commodity_category_id') }}
                            </div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Ruangan</td>
                        <td>:</td>
                        <td class="text-wrap">
                            <select class="form-control" name="commodity_location_id" id="commodity_location_id"
                                required>
                                <option selected>Pilih..</option>
                                @foreach($commodity_locations as $key => $commodity_location)
                                <option value="{{ $commodity_location->id }}"
                                    {{ $commodity->commodity_location_id === $commodity_location->id ? 'selected' : '' }}>
                                    {{ $commodity_location->name }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('commodity_location_id'))
                            <div class="invalid-feedback font-weight-bold d-block">
                                {{ $errors->first('commodity_location_id') }}
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
                    <td style="width: 145px;">Kondisi</td>
                    <td style="width: 10px;">:</td>
                    <td class="text-wrap">
                        <select class="form-control" name="condition" id="condition" required>
                            <option selected>Pilih..</option>
                            <option value="Sudah Layak" {{ $commodity->condition === 'Sudah Layak' ? 'selected' : '' }}>
                                Sudah Layak</option>
                            <option value="Layak Sebagian"
                                {{ $commodity->condition === 'Layak Sebagian' ? 'selected' : '' }}>Layak Sebagian
                            </option>
                            <option value="Tidak Layak" {{ $commodity->condition === 'Tidak Layak' ? 'selected' : '' }}>
                                Tidak Layak</option>
                        </select>

                        @if($errors->has('condition'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('condition') }}
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Register</td>
                    <td>:</td>
                    <td class="text-wrap">
                        <div class="input-group">
                            <input type="date" class="form-control" name="register_date" id="register_date"
                                placeholder="Pilih tanggal.." value="{{ $commodity->register_date }}" data-input
                                required>
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <a class="input-button" title="Pilih tanggal.." data-toggle>
                                        <i class="fas fa-calendar-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>

                        @if($errors->has('register_date'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('register_date') }}
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Update</td>
                    <td>:</td>
                    <td class="text-wrap">
                        <div class="input-group">
                            <input type="date" class="form-control" name="update_date" id="update_date"
                                placeholder="Pilih tanggal.." value="{{ $commodity->update_date }}" data-input required>
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <a class="input-button" title="Pilih tanggal.." data-toggle>
                                        <i class="fas fa-calendar-alt"></i>
                                    </a>
                                </span>
                            </div>
                        </div>

                        @if($errors->has('update_date'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('update_date') }}
                        </div>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Pengguna</td>
                    <td>:</td>
                    <td class="text-wrap">
                        <select class="form-control" name="user_id" id="user_id" required>
                            <option selected>Pilih..</option>
                            @foreach($users as $key => $user)
                            <option value="{{ $user->id }}" {{ $commodity->user_id === $user->id ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('user_id'))
                        <div class="invalid-feedback font-weight-bold d-block">
                            {{ $errors->first('user_id') }}
                        </div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <a href="{{ route('admin.aset.index') }}" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success text-white">Simpan Perubahan</button>
        </div>

        </form>

    </div>
</div>
@endsection