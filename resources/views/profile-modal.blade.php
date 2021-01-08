<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Ubah Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.home.profile.edit') }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center ">
                                <img src="{{ asset(auth()->user()->photo) }}" class="img-thumbnail"
                                    alt="{{ auth()->user()->name }}" id="image-preview" style="height: 100px;">
                                <input type="hidden" value="{{ asset(auth()->user()->photo) }}" id="old-image-hidden">
                                <div class="custom-file mt-2">
                                    <input type="file"
                                        class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                        name="photo" id="photo">
                                    <label class="custom-file-label" id="custom-file-label">Pilih file...</label>

                                    @if($errors->has('photo'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('photo') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="new_password">Password Baru</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                        name="new_password" id="new_password" placeholder=" Masukkan password baru..">
                                    <div class="input-group-prepend new-show-password">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye" id="new_eye"></i>
                                        </span>
                                    </div>

                                    @if($errors->has('new_password'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('new_password') }}
                                    </div>
                                    @endif
                                </div>
                                <small class="text-muted">Password baru minimal 6 karakter!</small>
                            </div>
                            <div class="form-group">
                                <label for="repeat_new_password">Ulangi Password Baru</label>
                                <div class="input-group">
                                    <input type="password"
                                        class="form-control{{ $errors->has('repeat_new_password') ? ' is-invalid' : '' }}"
                                        name="repeat_new_password" id="repeat_new_password"
                                        placeholder="Ulangi password baru..">
                                    <div class="input-group-prepend repeat-new-show-password">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye" id="repeat_new_eye"></i>
                                        </span>
                                    </div>

                                    @if($errors->has('repeat_new_password'))
                                    <div class="invalid-feedback font-weight-bold d-block">
                                        {{ $errors->first('repeat_new_password') }}
                                    </div>
                                    @endif
                                </div>
                                <small class="text-muted">Ulangi password harus sama dengan password baru!</small>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>