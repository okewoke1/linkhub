<div class="container-fluid">
	<div class="alert alert-primary" role="alert">
		Daftar Klaim
	</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
  Buat Klaim
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body">

<?php echo form_open_multipart('administrator/kendis/upload'); ?>
		<div class="form-group">
			<label class="form-label">Pegawai</label>
			<input name="nama" id="nama" class="form-control" value="<?php echo $this->session->userdata('nama');?>" readonly>
		</div>

		<div class="form-group">
			<label class="form-label">NIP</label>
			<input name="nip" id="nip" class="form-control" value="<?php echo $this->session->userdata('nip');?>" readonly>	
		</div>

		<div class="form-group">
			<label class="form-label" >Tanggal Klaim</label>
			<input class="form-control"
			type="date" name="tgl_klaim"/>
		</div>

		<div class="form-group">
			<label class="form-label">Nama Bengkel</label>
			<input type="text" name="bengkel" class="form-control" >
		</div> 

		<div class="form-group">
			<label class="form-label">Tanggal Masuk Bengkel</label>
			<input type="date" name="tgl_masuk" class="form-control" >
		</div>

        <div class="form-group">
			<label class="form-label">Tanggal Keluar Bengkel</label>
			<input type="date" name="tgl_keluar" class="form-control" >
		</div>

        <!-- <div class="form-group">
			<label class="form-label">Nama Pengerjaan</label>
			<input type="text" name="pengerjaan" class="form-control <?php echo form_error('pengerjaan') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('pengerjaan') ?>
			</div>
		</div>

        <div class="form-group">
			<label class="form-label">Suku Cadang</label>
			<input type="text" name="suku_cadang" class="form-control <?php echo form_error('suku_cadang') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('suku_cadang') ?>
			</div>
		</div> -->

        <div class="form-group">
			<label class="form-label">Biaya</label>
			<input type="number" name="biaya" class="form-control" >
		</div>

        <div class="form-group">
			<label class="form-label">Upload Bukti</label>
			<input type="file" name="userfile" class="form-control" size="20">
		</div>
		
		<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="status_post" value="0" id="invalidCheck" required>
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
					 <div class="table-responsive">
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<!-- <th>Nomor</th> -->
			<th>Tanggal Klaim</th>
			<th>Pegawai</th>
            <th>Biaya</th>
			<th>Aksi</th>
			<th>Status</th>
		</tr>
        </thead>
        <tbody>
		<?php 
$page=0;
foreach ($kendis as $st) :
		 ?>
		 <tr>
		 	<td width="20px"><?php echo ++$page ?></td>
		 	<!-- <td><?php echo $st->nomor ?></td> -->
		 	<td><?php echo $st->tgl_klaim ?></td>
		 	<td><?php echo $st->nama ?></td>
             <td><?php echo $st->biaya ?></td>
		  <td width="140px">
		  	<abbr title="download"><a href="<?php echo base_url().'simakand/administrator/kendis/download/'.$st->id_kendis; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a></abbr>
			<abbr title="edit" ><?php echo anchor('simakand/administrator/kendis/edit/'.$st->id_kendis,'<div class="btn btn-sm btn-warning" ><i class="fa fa-edit" ></i></div>') ?></abbr>
		 	<!-- <a href="<?php echo base_url('simakand/administrator/spt/cetak_kendis/'.$st->id_kendis) ?>" target="_blank"><abbr title="cetak spt"><div class="btn btn-sm btn-primary"><i class="fas fa-print"></i></abbr></i></div></a> -->
			<abbr title="delete"><a onclick="deleteConfirm('<?php echo site_url('simakand/administrator/kendis/delete/'.$st->id_kendis) ?>')" class="btn btn-sm btn-danger" href="#!" ><i class="fas fa-trash"></i></a></abbr></td>
	
			<td width="20px"><?php
				 if($st->status_post == 0){
				echo "<span class='badge badge-secondary'>Belum Disetujui</span>";
			}else if($st->status_post == 1){
			echo "<span class='badge badge-primary'>Approve PJ</span>";
		}else if($st->status_post == 2){
			echo "<span class='badge badge-success'>Approve Kasubbag Umum</span>";
		}else if($st->status_post == 3){
			echo "<span class='badge badge-danger'>Ditolak</span>";
		}
		?></td>
		
		 </tr>
		<?php endforeach; ?>
	</tbody>
    </table>
    </div>
    </div>
    </div>

<?php $this->load->view("simakand/administrator/modal.php") ?>

<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

	
</div>