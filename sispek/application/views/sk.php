<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h4 class="mb-3">Daftar Surat Keputusan</h4>
        
            <a href="<?= base_url('sk/create') ?>" class="btn btn-primary mb-3">
                + Tambah SK
            </a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">
        


           
        
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No SK</th>
                        <th>Tanggal</th>
                        <th>Tentang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($sk)) : ?>
                    <?php $no = 1; foreach ($sk as $row): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->no_sk ?></td>
                            <td><?= date('d-m-Y', strtotime($row->tanggal_sk)) ?></td>
                            <td><?= $row->tentang ?></td>
                            <td><?= strtoupper($row->status_sk) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada SK</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        
        


        
      </div>
    </div>
  </div>

</div>