<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">FORM SK</h1>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">

      <form method="post" action="<?= base_url('sk/store') ?>">

        <!-- DATA SK -->
        <div class="form-group">
          <label>Nomor SK</label>
          <input type="text" name="no_sk" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Tanggal SK</label>
          <input type="date" name="tanggal_sk" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Tentang</label>
          <textarea name="tentang" class="form-control" rows="3"></textarea>
        </div>

        <hr>

        <!-- FILTER -->
        <div class="row mb-3">
          <div class="col-md-3">
            <label>Tahun</label>
            <select id="filterTahun" class="form-control">
              <option value="">-- Pilih Tahun --</option>
              <?php for ($th = date('Y'); $th >= date('Y') - 5; $th--): ?>
                <option value="<?= $th ?>"><?= $th ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <div class="col-md-4">
            <label>Kelompok Anggaran</label>
            <select id="filterKelompok" class="form-control" disabled>
              <option value="">-- Pilih Kelompok Anggaran --</option>
            </select>
          </div>
        </div>

        <!-- LIST TUGAS -->
        <div id="listTugas" class="mt-3 text-muted">
          Pilih Tahun terlebih dahulu
        </div>

        <hr>

        <button type="submit" class="btn btn-primary">
          Simpan SK
        </button>

      </form>

    </div>
  </div>

</div>
