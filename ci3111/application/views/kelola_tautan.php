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
                <table class="table table-bordered table-hover align-middle tautan-table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tautan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tautan as $item): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama ?></td>
                                <td class="wrap-column"><?= $item->deskripsi ?></td>
                                <td class="url-column"><?= $item->url ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit"
                                        data-id="<?= $item->id ?>"
                                        data-nama="<?= $item->nama ?>"
                                        data-desc="<?= $item->deskripsi ?>"
                                        data-url="<?= $item->url ?>"
                                        data-master_tim_id="<?= $item->master_tim_id ?>">Edit</button>
                                    <a href="<?= site_url('kelola/tautan/delete/' . $item->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
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
        <div class="modal-content">
            <form action="<?= site_url('kelola/tautan/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalTambahLabel">Tambah Tautan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="col-form-label fw-semibold">Nama:</label>
                        <input type="text" class="form-control shadow-sm" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="col-form-label fw-semibold">Deskripsi:</label>
                        <textarea class="form-control shadow-sm" id="desc" name="desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="col-form-label fw-semibold">Tautan:</label>
                        <input type="url" class="form-control shadow-sm" id="url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="master_tim_id" class="col-form-label fw-semibold">Kategori:</label>
                        <select class="form-select shadow-sm" id="master_tim_id" name="master_tim_id" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($tim as $t): ?>
                                <option value="<?= $t->id ?>"><?= $t->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="col-form-label fw-semibold">Upload Thumbnail:</label>
                        <input type="file" class="form-control shadow-sm" id="img" name="img">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
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
            <form action="<?= site_url('kelola/tautan/edit/') ?>" method="post" enctype="multipart/form-data" id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalEditLabel">Edit Tautan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label fw-semibold">Nama:</label>
                        <input type="text" class="form-control shadow-sm" id="edit-nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-desc" class="form-label fw-semibold">Deskripsi:</label>
                        <textarea class="form-control shadow-sm" id="edit-desc" name="desc" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit-url" class="form-label fw-semibold">Tautan:</label>
                        <input type="url" class="form-control shadow-sm" id="edit-url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-master_tim_id" class="col-form-label fw-semibold">Kategori:</label>
                        <select class="form-select shadow-sm" id="edit-master_tim_id" name="master_tim_id" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($tim as $t): ?>
                                <option value="<?= $t->id ?>"><?= $t->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit-img" class="form-label fw-semibold">Ganti Thumbnail:</label>
                        <input type="file" class="form-control shadow-sm" id="edit-img" name="img">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
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