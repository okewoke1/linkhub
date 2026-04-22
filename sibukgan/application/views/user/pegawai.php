    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<div class="container-fluid">
	<div class="alert alert-success" role='alert'>
		Data Pegawai
	</div>

	<?php echo anchor('user/pegawai/add','<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Pegawai </button>') ?>

<div class="card shadow mb-4">
                     <div class="card-body">
                         
                        <div class="table-responsive">    
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Pangkat</th>
              
                <th>Jabatan</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
        <?php 
		$page = 0;
        foreach ($pegawai as $pgw) : ?>
		<tr>
			<td><?php echo ++$page ?></td>
			<td><?php echo $pgw->nip ?></td>
			<td><?php echo $pgw->nama ?></td>
			<td><?php echo $pgw->pangkat ?></td>
		
			<td><?php echo $pgw->jabatan ?></td>
			<td><?php echo $pgw->level ?></td>

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

<?php $this->load->view("user/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>



</div>

 
