<!-- Modal -->
<div class="modal fade" id="commodityUpdateModal" aria-labelledby="commodityUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commodityUpdateModalLabel">Tambah Ubah Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.ubah-aset.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="commodity_id">ID Aset</label>
                                <select class="form-control" name="commodity_id" id="commodity_id" required>
                                    <option value="" selected>Pilih..</option>
                                    @foreach ($commodities as $commodity)
                                    <option value="{{ $commodity->id }}">{{ $commodity->unique_commodity_number }} -
                                        {{ $commodity->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="commodity_category_id">Jenis Aset</label>
                                <select class="form-control" name="commodity_category_id" id="commodity_category_id"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="amount">Jumlah</label>
                                <input type="number"
                                    class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount"
                                    id="amount" required>

                                @if($errors->has('amount'))
                                <div class="invalid-feedback font-weight-bold d-block">
                                    {{ $errors->first('amount') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="commodity_location_id">Ruangan</label>
                                <select class="form-control" name="commodity_location_id" id="commodity_location_id"
                                    required>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="update_date">Tanggal Update</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="update_date" id="update_date"
                                        value="{{ date('Y-m-d') }}" placeholder="Pilih tanggal.." data-input required>
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <a class="input-button" title="Pilih tanggal.." data-toggle>
                                                <i class="fas fa-calendar-alt"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
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