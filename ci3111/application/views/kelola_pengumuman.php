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
                <table class="table table-bordered table-hover align-middle pengumuman-table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Aktif</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengumuman as $item): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->judul ?></td>
                                <td class="wrap-column"><?= $item->isi ?></td>
                                <td><?= $item->active ? 'Ya' : 'Tidak' ?></td>
                                <td><?= $item->start_date ?></td>
                                <td><?= $item->end_date ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit"
                                        data-judul="<?= $item->judul ?>"
                                        data-id="<?= $item->id ?>"
                                        data-isi="<?= $item->isi ?>"
                                        data-active="<?= $item->active ?>"
                                        data-start-date="<?= $item->start_date ?>"
                                        data-end-date="<?= $item->end_date ?>">Edit</button>
                                    <a href="<?= site_url('kelola/pengumuman/delete/' . $item->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
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
            <form action="<?= site_url('kelola/pengumuman/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-success" id="modalTambahLabel">Tambah Pengumuman</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-semibold">Judul:</label>
                        <input type="text" class="form-control shadow-sm" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label fw-semibold">Isi:</label>
                        <textarea class="form-control shadow-sm" id="isi" name="isi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status:</label><br>
                        <label class="me-3">
                            <input type="radio" name="active" value="1" id="aktif" class="form-check-input me-1"> Aktif
                        </label>
                        <label>
                            <input type="radio" name="active" value="0" id="nonaktif" class="form-check-input me-1"> Nonaktif
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label fw-semibold">Tanggal Mulai:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control shadow-sm">
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label fw-semibold">Tanggal Selesai:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control shadow-sm">
                    </div>
                </div>
                <div class="modal-footer border-0">
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
        <div class="modal-content ipt-modal">
            <form action="<?= site_url('kelola/pengumuman/edit/') ?>" method="post" enctype="multipart/form-data" id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalEditLabel">Edit Pengumuman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="mb-3">
                        <label for="edit-judul" class="form-label fw-semibold">Judul:</label>
                        <input type="text" class="form-control shadow-sm" id="edit-judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-isi" class="form-label fw-semibold">Isi:</label>
                        <textarea class="form-control shadow-sm" id="edit-isi" name="isi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status:</label><br>
                        <label class="me-3">
                            <input type="radio" name="active" value="1" id="edit-aktif" class="form-check-input me-1"> Aktif
                        </label>
                        <label>
                            <input type="radio" name="active" value="0" id="edit-nonaktif" class="form-check-input me-1"> Nonaktif
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="edit-start_date" class="form-label fw-semibold">Tanggal Mulai:</label>
                        <input type="date" id="edit-start_date" name="start_date" class="form-control shadow-sm">
                    </div>
                    <div class="mb-3">
                        <label for="edit-end_date" class="form-label fw-semibold">Tanggal Selesai:</label>
                        <input type="date" id="edit-end_date" name="end_date" class="form-control shadow-sm">
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