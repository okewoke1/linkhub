<!-- table Section -->
<section id="data-table" class="data-table section-bg">
    <div class="container" data-aos="fade-up">

        <div class="container section-title">
            <h2><?= $title ?></h2>
            <p><?= $desc ?></p>
        </div>

        <div class="card shadow-sm rounded-4 p-3">
            <!-- Button trigger modal -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-success justify-content-end" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle skp-table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Jabatan</th>
                            <th>Tautan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($skp as $item): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama ?></td>
                                <td><?= $item->jabatan ?></td>
                                <td class="url-column"><?= $item->url ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit"
                                        data-id="<?= $item->id ?>"
                                        data-user-id="<?= $item->user_id ?>"
                                        data-nama="<?= $item->nama ?>"
                                        data-jabatan="<?= $item->jabatan ?>"
                                        data-url="<?= $item->url ?>"
                                        data-master_tim_id="<?= $item->master_tim_id ?>">Edit</button>
                                    <a href="<?= site_url('kelola/skp/delete/' . $item->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-3 justify-content-end d-flex">
                    <?= $links ?>
                </div>
            </div>
        </div>

    </div>
</section> <!-- /table Section -->

<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ipt-modal">
            <form action="<?= site_url('kelola/skp/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalTambahLabel">Tambah Folder Bukti Dukung SKP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pegawai_id" class="col-form-label fw-semibold">Pegawai:</label>
                        <select class="form-select shadow-sm" id="pegawai_id" name="pegawai_id" required>
                            <option value="">Pilih Pegawai</option>
                            <?php foreach ($pegawai as $p): ?>
                                <option value="<?= $p->id ?>"><?= $p->nama ?> - <?= $p->jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="col-form-label fw-semibold">Folder SKP:</label>
                        <input type="url" class="form-control shadow-sm" id="url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="master_tim_id" class="col-form-label fw-semibold">Tim:</label>
                        <select class="form-select shadow-sm" id="master_tim_id" name="master_tim_id" required>
                            <option value="">Pilih Tim</option>
                            <?php foreach ($tim as $t): ?>
                                <option value="<?= $t->id ?>"><?= $t->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= site_url('kelola/skp/edit/') ?>" method="post" enctype="multipart/form-data" id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalEditLabel">Edit Folder SKP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-pegawai_id" class="col-form-label fw-semibold">Pegawai:</label>
                        <select class="form-select" id="edit-pegawai_id" name="edit-pegawai_id" required disabled>
                            <?php foreach ($pegawai as $p): ?>
                                <option value="<?= $p->id ?>"><?= $p->nama ?> - <?= $p->jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="pegawai_id" id="hidden_pegawai_id">
                    </div>
                    <div class="mb-3">
                        <label for="edit-url" class="col-form-label fw-semibold">Folder SKP:</label>
                        <input type="url" class="form-control shadow-sm" id="edit-url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-master_tim_id" class="col-form-label fw-semibold">Tim:</label>
                        <select class="form-select shadow-sm" id="edit-master_tim_id" name="master_tim_id" required>
                            <option value="">Pilih Tim</option>
                            <?php foreach ($tim as $t): ?>
                                <option value="<?= $t->id ?>"><?= $t->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary shadow-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>