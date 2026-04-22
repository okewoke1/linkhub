<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('simakand/user/bbm/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
<form action="<?php base_url("simakand/user/bbm/edit") ?>" enctype="multipart/form-data" method="post" class="row g-3">
	<input type="hidden" name="id" value="<?php echo $bbm->id_upload?>" />

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Klaim</label>
			<input type="date" name="tgl_upload" class="form-control <?php echo form_error('tgl_upload') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_upload') ?>
			</div>
		</div>

        <!-- <div class="form-group col-md-6">
			<label class="form-label">File</label>
			<input type="file" name="file" class="form-control <?php echo form_error('file') ? 'is-invalid':'' ?> mb-3" >
			<input type="hidden" name="old_file"  />
			<div class="invalid-feedback">
			<?php echo form_error('file') ?>
			</div>
		</div> -->

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

	</form>

</div> 
