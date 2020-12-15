<!-- Modal -->
<div class="modal fade" id="editCommodityCategoryModal" data-backdrop="static" tabindex="-1"
    aria-labelledby="editCommodityCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommodityCategoryLabel">Ubah Jenis Aset</h5>
                <button type="button" class="close clear-input" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="commodity-category-form" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name_edit">Nama</label>
                                <input type="text" class="form-control" name="name_edit" id="name_edit"
                                    placeholder="Masukkan nama.." autofocus required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description_edit">Keterangan</label>
                                <textarea class="form-control" name="description_edit" id="description_edit" cols="30"
                                    rows="10" placeholder="Masukkan keterangan.." style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary clear-input" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>