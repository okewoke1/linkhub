<div class="container-fluid">

  
<!-- Memuat CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!-- Memuat jQuery dan Select2 JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <style>
        .search_select_box select {
            width: 100%;
        }

        .search_select_box button {
            /* Custom button styling if needed */
        }
        
        .select2-container .select2-selection--single {
    height: 38px !important;
    padding: 6px 12px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    display: flex;
    align-items: center;
}

.select2-selection__rendered {
    line-height: 24px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px;
    top: 1px;
    right: 10px;
}
    </style>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header">
            <a href="<?php echo site_url('administrator/sptmitra/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
        </div>

        <div class="card-body">
            <form action="<?php echo base_url('administrator/sptmitra/add') ?>" method="post" class="form-row">

                <!-- Mitra Dropdown with Select2 -->
                <div class="form-group col-md-6">
                    <label class="form-label">Mitra</label>
                    <select class="form-control select2" id="mitra" name="mitra" style="width: 100%;">

                        <option value="">Pilih Mitra...</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" name="tgl_sptmitra" class="form-control <?php echo form_error('tgl_sptmitra') ? 'is-invalid':'' ?>">
                    <div class="invalid-feedback"><?php echo form_error('tgl_sptmitra') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tgl_selesai" class="form-control <?php echo form_error('tgl_selesai') ? 'is-invalid':'' ?>">
                    <div class="invalid-feedback"><?php echo form_error('tgl_selesai') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tgl_mulai" class="form-control <?php echo form_error('tgl_mulai') ? 'is-invalid':'' ?>">
                    <div class="invalid-feedback"><?php echo form_error('tgl_mulai') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Tempat</label>
                    <input type="text" list="kecamatan" class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>" name="kecamatan" />
                    <datalist id="kecamatan">
                        <option>Sekadau Hilir</option>
                        <option>Sekadau Hulu</option>
                        <option>Nanga Mahap</option>
                        <option>Nanga Taman</option>
                        <option>Belitang</option>
                        <option>Belitang Hilir</option>
                        <option>Belitang Hulu</option>
                    </datalist>
                    <div class="invalid-feedback"><?php echo form_error('kecamatan') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Menimbang</label>
                    <input type="text" name="menimbang" class="form-control <?php echo form_error('menimbang') ? 'is-invalid':'' ?>">
                    <div class="invalid-feedback"><?php echo form_error('menimbang') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Keperluan</label>
                    <input type="text" name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?>">
                    <div class="invalid-feedback"><?php echo form_error('keperluan') ?></div>
                </div>

                <div class="form-group col-md-6">
                    <label class="form-label">Nomor Surat</label>
                    <?php foreach ($kd as $data): 
                        $kd = $data['no'];     
                        $kd++;
                    ?>
                        <input name="no" id="no" class="form-control <?php echo form_error('no') ? 'is-invalid':'' ?>">
                        <div class="invalid-feedback"><?php echo form_error('no') ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group col-md-6">
                    <input class="btn btn-success" type="submit" name="btn" value="Save" />
                </div>
            </form>
        </div>
    </div>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
$('#mitra').select2({
    placeholder: 'Pilih Mitra...',
    minimumInputLength: 1,
    width: 'resolve', // ini penting!
    ajax: {
        url: '<?= base_url('administrator/sptmitra/get_mitra') ?>',
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                q: params.term
            };
        },
        processResults: function(data) {
            return {
                results: data.results
            };
        },
        cache: true
    }
});



    </script>

</div>
