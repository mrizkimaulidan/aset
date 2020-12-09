<!-- Modal -->
<div class="modal fade" id="editCommodityLocationModal" tabindex="-1" aria-labelledby="editCommodityLocationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommodityLocationLabel">Ubah Jenis Aset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="commodity-location-form" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name_edit">Nama</label>
                                <input type="text" class="form-control" name="name_edit" id="name_edit" placeholder="Masukkan nama.." autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description_edit">Keterangan</label>
                                <textarea class="form-control" name="description_edit" id="description_edit" cols="30" rows="10" placeholder="Masukkan keterangan.."></textarea>
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