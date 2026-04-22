<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Rincian Biaya
	</div>

<div class="card shadow mb-4">
                     <div class="card-body">
                            
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Tanggal Surat Tugas</th>
			<th>Pegawai</th>
			<th>Aksi</th>

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
      ?>
		 	<td>B-<?php echo $st->no ?>/6109<?php echo $st->nomor ?>/<?php echo $st->kode_huruf ?>/<?php echo ($bln1);?>/2022</td>
		 	<td><?php echo $st->tgl_spt ?></td>
		 	<td><?php echo $st->pegawai ?></td>
		 	<td width="20px"><abbr title="buat rincian" ><?php echo anchor('sibukgan/user/biaya/edit/'.$st->id_spt,'<div class="btn btn-sm btn-warning" ><i class="fa fa-edit" ></i></div>') ?></abbr>
		 	<!-- <a href="<?php echo base_url('sibukgan/user/spt/detail_spt/'.$st->id_spt) ?>" ><abbr title="detail spt"><div class="btn btn-success btn-icon btn-sm"><i class="fa fa-folder-open"></i></abbr></i></div></a> -->
		 	<a href="<?php echo base_url('sibukgan/user/biaya/cetak_biaya/'.$st->id_spt) ?>" target="_blank"><abbr title="cetak rincian"><div class="btn btn-sm btn-primary"><i class="fas fa-print"></i></abbr></i></div></a>
			<!-- <a href="<?php echo base_url('sibukgan/user/biaya/cetak_biaya/'.$st->id_spt) ?>" target="_blank"><abbr title="cetak spd"><div class="btn btn-sm btn-success"><i class="fas fa-print"></i></abbr></i></div></a> -->

			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('sibukgan/user/spt/delete/'.$st->id_spt) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>
			
			<!-- <td width="20px">
				<?php
				 if($st->statuspost == 1){
				echo "<span class='badge badge-success'>Disetujui</span>";
			}else if($st->statuspost == 2){
			echo "<span class='badge badge-danger'>Ditolak</span>";
		}
		else{
			echo "<span class='badge badge-warning'>Pending</span>";
		}?>
	</td> -->
		
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
<?php $this->load->view("sibukgan/user/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

	
</div>