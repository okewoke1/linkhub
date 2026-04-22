<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('user/kendis/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<!-- <form action="<?php echo base_url('user/kendis/add') ?>" method="post"   enctype="multipart/form-data" class="form-row"> -->
	<?php echo form_open_multipart('user/kendis/add');?>
        <div class="form-group col-md-6">
			<label class="form-label">Pegawai</label>
			<input name="nama" id="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?> " value="<?php echo $this->session->userdata('nama');?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nama') ?>
			</div>	
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">NIP</label>
			<input name="nip" id="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?> " value="<?php echo $this->session->userdata('nip');?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nip') ?>
			</div>	
		</div>

		<div class="form-group col-md-6">
			<label class="form-label" >Tanggal Klaim</label>
			<input class="form-control <?php echo form_error('tgl_klaim') ? 'is-invalid':'' ?> "
			type="date" name="tgl_klaim"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_klaim') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Nama Bengkel</label>
			<input type="text" name="bengkel" class="form-control <?php echo form_error('bengkel') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('bengkel') ?>
			</div>
		</div> 

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Masuk Bengkel</label>
			<input type="date" name="tgl_masuk" class="form-control <?php echo form_error('tgl_masuk') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_masuk') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Tanggal Keluar Bengkel</label>
			<input type="date" name="tgl_keluar" class="form-control <?php echo form_error('tgl_keluar') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_keluar') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Nama Pengerjaan</label>
			<input type="text" name="pengerjaan" class="form-control <?php echo form_error('pengerjaan') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('pengerjaan') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Suku Cadang</label>
			<input type="text" name="suku_cadang" class="form-control <?php echo form_error('suku_cadang') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('suku_cadang') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Biaya</label>
			<input type="text" name="biaya" class="form-control <?php echo form_error('biaya') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('biaya') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Upload Bukti</label>
			<input type="file" name="userfile" class="form-control" >
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
		
  <div class="form-group col-md-6">

		</div>

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>


<?php echo form_close(); ?>

</div> 
