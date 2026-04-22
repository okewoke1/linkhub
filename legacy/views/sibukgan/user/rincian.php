<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar Rincian
	</div>

<div class="card shadow mb-4">
                     <div class="card-body">
                            
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Pegawai</th>
			<th>Total</th>
			<th>Buat Rincian</th>
			<th>Aksi</th>
			<th>Status</th>

		</tr>
  </thead>
        <tbody>
		<?php 
$page=0;
foreach ($rincian as $rin) :
		 ?>
		 <tr>
		 	<td width="20px"><?php echo ++$page ?></td>
		 	<?php
      $bln1 = date("m",strtotime($st->tgl_spt));
      ?>
		 	<td>B-<?php echo $st->no ?>/6109<?php echo $st->nomor ?>/<?php echo $st->kode_huruf ?>/<?php echo ($bln1);?>/2022</td>
		 	<td><?php echo $rin->pegawai ?></td>
		 	<td width="300px"><?php echo $rin->total ?></td>
		 	<td width="20px"><abbr title="buat"><?php echo anchor('sibukgan/user/rincian/edit/'.$rin->id_spt,'<div class="btn btn-sm btn-primary"><i class="fas fa-file-invoice"></i></div>') ?></abbr></td>
			<td width="20px"><abbr title="edit"><?php echo anchor('sibukgan/user/rincian/edit2/'.$rin->id_spt,'<div class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></div>') ?></abbr>
		 	<abbr title="detail"><?php echo anchor('sibukgan/user/rincian/detail_rincian/'.$rin->id_spt,'<div class="btn btn-success btn-icon btn-sm"><i class="fa fa-folder-open"></i></div>') ?></abbr>
		 			 	<a href="<?php echo base_url('sibukgan/user/rincian/cetak_rincian/'.$rin->id_spt) ?>" target="_blank"><abbr title="cetak rincian"><div class="btn btn-sm btn-primary"><i class="fas fa-print"></i></abbr></i></div></a></td>
		 			 	<td width="20px"><?php
				 if($rin->status_rincian == 0){
				echo "<span class='badge badge-secondary'>Belum Dibuat</span>";
			}else if($rin->status_rincian == 1){
			echo "<span class='badge badge-success'>Disetujui</span>";
		}
		else if($rin->status_rincian == 2){
			echo "<span class='badge badge-danger'>Ditolak</span>";
		}else if($rin->status_rincian == 3){
			echo "<span class='badge badge-warning'>Pending</span>";
		}?></td>
		 </tr>
		<?php endforeach; ?>
	</tbody>
    </table>
    </div>
    
    </div>
	
		            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BPS Jember 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
</div>