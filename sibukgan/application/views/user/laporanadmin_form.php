<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">

<div class="card-header">
		<a href="<?php echo site_url('user/laporan2/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">

<form action="<?php base_url("user/laporan2/edit") ?>" enctype="multipart/form-data" method="post" class="row g-3">
	<input type="hidden" name="id" value="<?php echo $laporan->id_spt?>" />
		<div class="col-md-6">
			<label class="form-label">Unggah Laporan</label>
			<input type="file" name="file" class="form-control <?php echo form_error('file') ? 'is-invalid':'' ?> mb-3" >
			<input type="hidden" name="old_file"  />
			<div class="invalid-feedback">
			<?php echo form_error('file') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label class="form-label">Tanggal Laporan</label>
			<input type="date" name="tgl_laporan" class="form-control <?php echo form_error('tgl_laporan') ? 'is-invalid':'' ?> mb-3"  >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_laporan') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label class="form-label" >Status</label>
			<select name="status_laporan" class="form-control <?php echo form_error('status_laporan') ? 'is-invalid':'' ?> mb-3"
			type="text" name="status_laporan" readonly>
			<option value="1">Buat Laporan</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('status_laporan') ?>
			</div>
		</div>	
	

<div class="col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

</div> 
