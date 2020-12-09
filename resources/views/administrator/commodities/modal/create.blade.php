<!-- Modal -->
<div class="modal fade" id="addCommodityModal" tabindex="-1" aria-labelledby="addCommodityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommodityModalLabel">Tambah Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.aset.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="unique_commodity_number">ID Aset</label>
                                <input type="text" class="form-control" name="unique_commodity_number" id="unique_commodity_number" placeholder="Masukkan id aset..">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama..">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="amount">Jumlah</label>
                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Masukkan jumlah..">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="commodity_category_id">Jenis Aset</label>
                                <select class="form-control" name="commodity_category_id" id="commodity_category_id">
                                    <option selected>Pilih..</option>
                                    @foreach($commodity_categories as $key => $commodity_category)
                                    <option value="{{ $commodity_category->id }}">{{ $commodity_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="commodity_location_id">Ruangan</label>
                                <select class="form-control" name="commodity_location_id" id="commodity_location_id">
                                    <option selected>Pilih..</option>
                                    @foreach($commodity_locations as $key => $commodity_location)
                                    <option value="{{ $commodity_location->id }}">{{ $commodity_location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="condition">Kondisi</label>
                                <select class="form-control" name="condition" id="condition">
                                    <option selected>Pilih..</option>
                                    <option value="Sudah Layak">Sudah Layak</option>
                                    <option value="Layak Sebagian">Layak Sebagian</option>
                                    <option value="Tidak Layak">Tidak Layak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <label for="register_date">Tanggal Register</label>
                            <input type="date" class="form-control" name="register_date" id="register_date">
                        </div>
                        <div class="col-lg-4">
                            <label for="update_date">Tanggal Update</label>
                            <input type="date" class="form-control" name="update_date" id="update_date">
                        </div>
                        <div class="col-lg-4">
                            <label for="user_id">Pengguna</label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option selected>Pilih..</option>
                                @foreach($users as $key => $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
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