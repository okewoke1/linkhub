<!-- Modal Input BAST -->
<div class="modal fade" id="modalBAST" tabindex="-1" role="dialog" aria-labelledby="modalBASTLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBASTLabel">Input BAST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formInputBAST">
                    <div class="form-group">
                        <label for="no_spk_modal">Nomor SPK</label>
                        <input type="text" class="form-control" id="no_spk_modal" disabled>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_spk_modal">Tanggal SPK</label>
                        <input type="text" class="form-control" id="tanggal_spk_modal" readonly>
                    </div>
                    <div class="form-group">
                        <label for="no_bast_modal">Nomor BAST</label>
                        <input type="text" class="form-control" id="no_bast_modal" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_bast_modal">Tanggal BAST</label>
                        <input type="date" class="form-control" id="tanggal_bast_modal">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="simpanBAST">Simpan</button>
            </div>
        </div>
    </div>
</div>
