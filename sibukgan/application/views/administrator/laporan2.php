<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar Laporan
	</div>

<div class="card shadow mb-4">
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Pegawai</th>
			<th>Tanggal Laporan</th>
			<th>Buat Laporan</th>
			<th>Aksi</th>
			<th>Status Laporan</th>
		</tr>
   </thead>
        <tbody>
		<?php 
$page=0;
foreach ($laporan as $st) :
		 ?>
		<tr>
		 	<td width="20px"><?php echo ++$page ?></td>
		 	<?php
      $bln1 = date("m",strtotime($st->tgl_spt));
      ?>
		 	<td>B-<?php echo $st->no ?>/6109<?php echo $st->nomor ?>/<?php echo $st->kode_huruf ?>/<?php echo ($bln1);?>/2022</td>
		 	<td><?php echo $st->pegawai ?></td>
		 	<td><?php echo $st->tgl_laporan ?></td>
		 	<td width="20px"><abbr title="buat"><?php echo anchor('administrator/laporan2/edit/'.$st->id_spt,'<div class="btn btn-sm btn-primary"><i class="fas fa-file-invoice"></i></div>') ?></abbr></td>
		 	<td width="20px"><abbr title="edit"><?php echo anchor('administrator/laporan2/edit2/'.$st->id_spt,'<div class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></div>') ?></abbr></td>
		<td width="20px"><?php
				 if($st->status_laporan == 0){
				echo "<span class='badge badge-secondary'>Belum Dibuat</span>";
			}else if($st->status_laporan == 1){
			echo "<span class='badge badge-success'>Sudah Dibuat</span>";
		}
		?></td>
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
                        <span>Copyright &copy; BPS Sekadau 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
<?php $this->load->view("administrator/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

</div>