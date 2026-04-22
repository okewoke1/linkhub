<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar SPD
	</div>

<div class="card shadow mb-4">
                     <div class="card-body">
                            <div class="table-responsive"> 
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Tanggal Surat Tugas</th>
			<th>Pegawai</th>
			<th>Anggota</th>
			<th>Aksi</th>
			<!-- <th>Status</th> -->
		</tr>
        </thead>
        <tbody>
		<?php 
$page=0;
foreach ($spt as $st) :
		 ?>
		 <tr>
		 	<td width="20px"><?php echo ++$page ?></td>
           <?php
      $bln1 = date("m",strtotime($st->tgl_spt));
              $thn1 = date("Y",strtotime($st->tgl_spt));
      ?>
			 <td>B-<?php echo $st->no ?>/6109<?php echo $st->nomor ?>/<?php echo $st->kode_huruf ?>/<?php echo ($thn1);?></td>
		 	<td><?php echo $st->tgl_spt ?></td>
		 	<td><?php echo $st->pegawai ?></td>
			 <td><?php echo $st->anggota_1 ?></td>
		 	<td width="20px">
			 <a href="<?php echo base_url('administrator/spd/cetak_spd/'.$st->id_spt) ?>" target="_blank"><abbr title="cetak spd"><div class="btn btn-sm btn-success"><i class="fas fa-print"></i></div></abbr></a>
			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('administrator/spt/delete/'.$st->id_spt) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>
		 </tr>
		<?php endforeach; ?>
	</tbody>
    </table>
    </div>
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