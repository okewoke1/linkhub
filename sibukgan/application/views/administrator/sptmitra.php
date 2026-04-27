<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar ST Mitra
	</div>

<?php echo anchor('administrator/sptmitra/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Buat ST Mitra</button>') ?>



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
			<th>Aksi</th>
			<!-- <th>Status</th> -->
		</tr>
        </thead>
        <tbody>
		<?php 
$page=0;
foreach ($sptmitra as $st) :
		 ?>
		 <tr>
		 	<td width="20px"><?php echo ++$page ?></td>
           <?php
      $bln1 = date("m",strtotime($st->tgl_sptmitra));
              $thn1 = date("Y",strtotime($st->tgl_sptmitra));
      ?>
		 	<td><?php echo $st->no ?>/6109/KP.650/<?php echo ($thn1);?></td>
		 	<td><?php echo $st->tgl_sptmitra ?></td>
		 	<td><?php echo $st->mitra ?></td>
		 	<td width="20px"><!--<abbr title="edit" ><?php echo anchor('administrator/sptmitra/edit/'.$st->id_mitra,'<div class="btn btn-sm btn-warning" ><i class="fa fa-edit" ></i></div>') ?></abbr>-->
		 	<a href="<?php echo base_url('administrator/sptmitra/cetak_sptmitra/'.$st->id_mitra) ?>" target="_blank"><abbr title="cetak spt"><div class="btn btn-sm btn-primary"><i class="fas fa-print"></i></div></abbr></a>

			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('administrator/sptmitra/delete/'.$st->id_mitra) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>
			
			
		
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