<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar ST
	</div>

<?php echo anchor('sibukgan/administrator/sppd/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Buat ST 2 Pegawai</button>') ?>

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
		 	<td width="20px"><abbr title="edit" ><?php echo anchor('sibukgan/administrator/sppd/edit/'.$st->id_spt,'<div class="btn btn-sm btn-warning" ><i class="fa fa-edit" ></i></div>') ?></abbr>
		 	<a href="<?php echo base_url('sibukgan/administrator/sppd/cetak_spt2/'.$st->id_spt) ?>" target="_blank"><abbr title="cetak spt"><div class="btn btn-sm btn-primary"><i class="fas fa-print"></i></div></abbr></a>

			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('sibukgan/administrator/sppd/delete/'.$st->id_spt) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>
			

		
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
<?php $this->load->view("sibukgan/administrator/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

	
</div>