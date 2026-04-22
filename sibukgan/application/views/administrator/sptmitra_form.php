<div class="container-fluid">

<style>
.search_select_box select{
	width: 100%;

}

.search_select_box button{
	
	
}
</style>

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('administrator/sptmitra/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="<?php echo base_url('administrator/sptmitra/add') ?>" method="post" class="form-row">

		<div class="form-group col-md-6">
			<label class="form-label" >Mitra</label>
			<select data-live-search="true" class="form-control "
			 id="nama" name="nama">
   			<option selected="0">Choose...</option>
   			<?php             
            foreach ($mitra as $row) {  
            echo  "<option value='".$row->mitra."'>".$row->mitra.  "</option>";
            }
            ?>
  			</select>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Surat</label>
			<input type="date" name="tgl_sptmitra" class="form-control <?php echo form_error('tgl_sptmitra') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_sptmitra') ?>
			</div>
		</div>

		

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Selesai</label>
			<input type="date" name="tgl_selesai" class="form-control <?php echo form_error('tgl_selesai') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_selesai') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Mulai</label>
			<input type="date" name="tgl_mulai" class="form-control <?php echo form_error('tgl_mulai') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_mulai') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Tempat</label>
			<input type="text" list="kecamatan"  class="form-control <?php echo form_error('kecamatan') ? 'is-invalid':'' ?>" name="kecamatan"/>
				<datalist id="kecamatan">
				<option>Sekadau Hilir</option>
				<option>Sekadau Hulu</option>
				<option>Nanga Mahap</option>
				<option>Nanga Taman</option>
				<option>Belitang</option>
				<option>Belitang Hilir</option>
				<option>Belitang Hulu</option>
				</datalist>
			<div class="invalid-feedback">
			<?php echo form_error('kecamatan') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Menimbang</label>
			<input type="text" name="menimbang" class="form-control <?php echo form_error('menimbang') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('menimbang') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Keperluan</label>
			<input type="text" name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('keperluan') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Nomor Surat</label>
          <?php foreach ($kd as $data) :
              $kd = $data['no'];     
			$kd++;
		
		 ?>
			<input name="no" id="no" class="form-control <?php echo form_error('no') ? 'is-invalid':'' ?> " value="<?php echo $kd ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('no') ?>
			</div>
           <?php endforeach; ?>
		</div>

		
		

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>
	</form>
	<script type="text/javascript">
 $(document).ready(function() {
     $('#nama').select2();
 });
</script>

<script type="text/javascript">
$('.search_select_box select').selectpicker();
</script>
</div> 
