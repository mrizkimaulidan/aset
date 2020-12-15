<!-- Modal -->
<div class="modal fade" id="addCommodityCategoryModal" tabindex="-1" aria-labelledby="addCommodityCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommodityCategoryLabel">Tambah Jenis Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.jenis-aset.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan nama.."
                                    autofocus required>

                                @if($errors->has('name'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description" id="description" cols="30" rows="10"
                                    placeholder="Masukkan keterangan.."
                                    style="height: 100px;">{{ old('description') }}</textarea>

                                @if($errors->has('description'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('description') }}
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