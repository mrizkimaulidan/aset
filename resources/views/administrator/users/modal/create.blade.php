<!-- Modal -->
<div class="modal fade" id="addUserModal" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.pengguna.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="unique_user_number">ID Pengguna</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('unique_user_number') ? ' is-invalid' : '' }}"
                                    name="unique_user_number" id="unique_user_number"
                                    value="{{ old('unique_user_number') }}" placeholder="Masukkan ID pengguna.."
                                    autofocus required>

                                @if($errors->has('unique_user_number'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('unique_user_number') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap.." required>

                                @if($errors->has('name'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                    name="gender" id="gender" required>
                                    <option selected>Pilih..</option>
                                    <option value=" Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                                @if($errors->has('gender'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('gender') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" id="email" value="{{ old('email') }}" placeholder="Masukkan email.."
                                    required>

                                @if($errors->has('email'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                    <input type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" id="password" placeholder=" Masukkan password.." required>
                                    <div class="input-group-prepend show-password">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye" id="eye"></i>
                                        </span>
                                    </div>

                                    @if($errors->has('password'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <input type="text"
                                    class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    name="phone_number" id="phone_number" value="{{ old('phone_number') }}"
                                    placeholder="Masukkan nomor telepon.." required>

                                @if($errors->has('phone_number'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('phone_number') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <div class="custom-file mb-3">
                                    <input type="file"
                                        class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                        name="photo" id="photo" required>
                                    <label class="custom-file-label">Choose file...</label>

                                    @if($errors->has('photo'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('photo') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_id">Jabatan</label>
                                <select class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                    name="role_id" id="role_id" required>
                                    <option selected>Pilih..</option>
                                    @foreach($roles as $key => $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                @if($errors->has('role_id'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('role_id') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>