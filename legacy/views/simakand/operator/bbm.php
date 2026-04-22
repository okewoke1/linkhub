<div class="container-fluid">
	<div class="alert alert-primary" role="alert">
		Daftar Klaim BBM
	</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Buat Klaim
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body">

<?php echo form_open_multipart('operator/bbm/upload'); ?>
		<div class="form-group">
			<label class="form-label">Pegawai</label>
          <select class="form-control"
			type="text" id="nama" name="nama" >
   			<option selected="0">Choose...</option>
   			<?php                                
            foreach ($nama as $row) {  
            echo  "<option value='".$row->nama."'>".$row->nama.  "</option>";
            }
            ?>
  			</select>
		</div>

		<div class="form-group">
			<label class="form-label">NIP</label>
			<input name="nip" id="nip" class="form-control" value="<?php echo $this->session->userdata('nip');?>" readonly>
		</div>

		<div class="form-group">
			<label class="form-label">Tanggal Klaim</label>
			<input type="date" name="tgl_upload" class="form-control">	
		</div>

		<div class="form-group">
			<label class="form-label">Biaya BBM</label>
			<input type="number" id="biaya" name="biaya" class="form-control" onkeyup="sum();">	
		</div>
  
  		<div class="form-group">
			<label class="form-label">Biaya Kendis</label>
			<input type="number" id="biaya_kendis" name="biaya_kendis" class="form-control" onkeyup="sum();">	
		</div>
  
  		<div class="form-group">
			<label class="form-label">Total</label>
			<input type="number" id="total" name="total" class="form-control" readonly>	
		</div>

		<div class="form-group">
			<label class="form-label">File</label>
			<input type="file" name="userfile" class="form-control" size="20">
		</div>
		
		<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="status_upload" value="0" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Setuju klaim
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
      
  </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" value="upload" class="btn btn-primary">Save</button>

<?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Pegawai</th>
			<th>Tanggal Pengajuan</th>
			<th>Total</th>
			<th>Aksi</th>
			<th>Status</th>
		</tr>
   </thead>
        <tbody>
		<?php 
$page=0;
foreach ($bbm as $st) :
		 ?>
		<tr>
		 	<td width="20px"><?php echo ++$page ?></td>
		 	<td><?= $st->nama ?></td>
		 	<td><?php echo $st->tgl_upload ?></td>
		 	<td><?php echo $st->total ?></td>
			<td width="200px">
			<abbr title="download"><a href="<?php echo base_url().'simakand/operator/bbm/download/'.$st->id_upload; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a></abbr>
              
			<!-- <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal <?php echo $st->id_upload?>">
			<i class="fa fa-edit" ></i>
</button> -->

			<abbr title="edit" ><?php echo anchor('simakand/operator/bbm/edit/'.$st->id_upload,'<div class="btn btn-sm btn-warning"><i class="fa fa-edit" ></i></div>') ?></abbr>
			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('simakand/operator/bbm/delete/'.$st->id_upload) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>

		<td width="20px"><?php
				 if($st->status_upload == 0){
				echo "<span class='badge badge-secondary'>Belum Disetujui</span>";
			}else if($st->status_upload == 1){
			echo "<span class='badge badge-primary'>Approve PJ</span>";
		}else if($st->status_upload == 2){
			echo "<span class='badge badge-success'>Approve Kasubbag Umum</span>";
		}else if($st->status_upload == 3){
			echo "<span class='badge badge-danger'>Ditolak</span>";
		}
		?></td>
		
		 </tr>
		<?php endforeach; ?>
	</tbody>
    </table>
    </div>
    
    </div>
	          
<?php $this->load->view("simakand/operator/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('biaya').value;
      var txtSecondNumberValue = document.getElementById('biaya_kendis').value;
      var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>
	
</div>