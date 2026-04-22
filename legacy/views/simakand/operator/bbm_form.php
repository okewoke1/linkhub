<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('simakand/operator/bbm/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
<form action="<?php base_url("operator/bbm/edit") ?>" method="post" class="row g-3">
	<input type="hidden" name="id" value="<?php echo $bbm->id_upload?>" />

	<div class="form-group col-md-2">
			<label class="form-label" >Status</label>
			<select id="status_upload" class="form-control <?php echo form_error('status_upload') ? 'is-invalid':'' ?>" name="status_upload">
        <option>Choose...</option>
        <option value="1">Setuju</option>
		<option value="3">Tolak</option>
      </select>
			<div class="invalid-feedback">
			<?php echo form_error('status_upload') ?>
			</div>
		</div>
<br>
		<div class="form-group col-md-10">
		</div>

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

	</form>

</div> 
