<!-- table Section -->
<section id="data-table" class="data-table section-bg">
    <div class="container" data-aos="fade-up">

        <div class="container section-title">
            <h2><?= $title ?></h2>
            <p><?= $desc ?></p>
        </div>

        <?php
        $message = '';
        if ($this->session->flashdata('success')) {
            $success = $this->session->flashdata('success');
            $message = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            ' . $success . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
        if ($this->session->flashdata('error')) {
            $errors = $this->session->flashdata('error');
            $message = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                            ' . $errors . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
        if ($message) {
            echo $message;
        }
        ?>

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
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengguna as $item): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $item->nama ?></td>
                                <td>
                                    <?php if (!empty($item->roles)): ?>
                                        <?php
                                        $roles_list = explode(', ', $item->roles);

                                        foreach ($roles_list as $role):
                                        ?>
                                            <span class="badge rounded-pill border border-primary text-primary">
                                                <?php echo htmlspecialchars($role); ?>
                                            </span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEdit"
                                        data-id="<?= $item->id ?>"
                                        data-nama="<?= $item->nama ?>"
                                        data-email="<?= $item->email ?>"
                                        data-blokir="<?= $item->blokir ?>"
                                        data-username="<?= $item->username ?>"
                                        data-nip="<?= $item->nip ?>"
                                        data-nip-bps="<?= $item->nip_bps ?>"
                                        data-pangkat="<?= $item->pangkat ?>"
                                        data-golongan="<?= $item->golongan ?>"
                                        data-jabatan="<?= $item->jabatan ?>"
                                        data-status="<?= $item->status ?>"
                                        data-role="<?= $item->role_ids ?>">Edit</button>
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
            <form action="<?= site_url('kelola/pengguna/upload') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-success" id="modalTambahLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama (dengan gelar):</label>
                        <input type="text" class="form-control shadow-sm" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password:</label>
                        <input type="password" class="form-control shadow-sm" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email:</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username:</label>
                        <input type="text" id="username" name="username" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label fw-semibold">NIP:</label>
                        <input type="text" id="nip" name="nip" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="nip-bps" class="form-label fw-semibold">NIP BPS:</label>
                        <input type="text" id="nip-bps" name="nip-bps" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label fw-semibold">Pangkat:</label>
                        <input type="text" id="pangkat" name="pangkat" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="golongan" class="form-label fw-semibold">Golongan:</label>
                        <input type="text" id="golongan" name="golongan" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label fw-semibold">Jabatan:</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="col-form-label fw-semibold">Foto:</label>
                        <input type="file" class="form-control shadow-sm" id="img" name="img">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label fw-semibold">Role:</label>
                        <div class="form-check">
                            <?php foreach ($roles as $role): ?>
                                <input type="checkbox" name="roles[]" value="<?= $role->id ?>" class="btn-check" id="role_<?= $role->id ?>" autocomplete="off">
                                <label class="btn btn-outline-primary" for="role_<?= $role->id ?>">
                                    <?= $role->name ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
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
            <form action="<?= site_url('kelola/pengguna/edit/') ?>" method="post" enctype="multipart/form-data" id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success" id="modalEditLabel">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label fw-semibold">Nama (dengan gelar):</label>
                        <input type="text" class="form-control shadow-sm" id="edit-nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-password" class="form-label fw-semibold">Password:</label>
                        <input type="password" class="form-control shadow-sm" id="edit-password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label fw-semibold">Email:</label>
                        <input type="email" class="form-control shadow-sm" id="edit-email" name="email" required>
                    </div>
                    <div class="mb-3 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="edit-blokir" name="blokir" value="Y">
                        <label class="form-check-label" for="edit-blokir">Blokir</label>
                    </div>
                    <div class="mb-3 form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="edit-aktif" name="aktif" value=1>
                        <label class="form-check-label" for="edit-aktif">Aktif</label>
                    </div>
                    <div class="mb-3">
                        <label for="edit-username" class="form-label fw-semibold">Username:</label>
                        <input type="text" id="edit-username" name="username" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-nip" class="form-label fw-semibold">NIP:</label>
                        <input type="text" id="edit-nip" name="nip" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-nip-bps" class="form-label fw-semibold">NIP BPS:</label>
                        <input type="text" id="edit-nip-bps" name="nip-bps" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-pangkat" class="form-label fw-semibold">Pangkat:</label>
                        <input type="text" id="edit-pangkat" name="pangkat" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-golongan" class="form-label fw-semibold">Golongan:</label>
                        <input type="text" id="edit-golongan" name="golongan" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-jabatan" class="form-label fw-semibold">Jabatan:</label>
                        <input type="text" id="edit-jabatan" name="jabatan" class="form-control shadow-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-img" class="col-form-label fw-semibold">Foto:</label>
                        <input type="file" class="form-control shadow-sm" id="edit-img" name="img">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label fw-semibold">Role:</label>
                        <div class="form-check">
                            <?php foreach ($roles as $role): ?>
                                <input type="checkbox" name="roles[]" value="<?= $role->id ?>" class="btn-check" id="edit-role_<?= $role->id ?>" autocomplete="off">
                                <label class="btn btn-outline-primary" for="edit-role_<?= $role->id ?>">
                                    <?= $role->name ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
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