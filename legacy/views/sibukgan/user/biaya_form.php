<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('sibukgan/user/biaya/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
<form action="" method="post" class="row g-3">
		<input type="hidden" name="id" value="<?php echo $spt->id_spt?>" />

		<div class="form-group col-md-6">
			<label class="form-label">Biaya Transport</label>
			<input type="number" name="biaya_transport" id="biaya_transport" class="form-control <?php echo form_error('biaya_transport') ? 'is-invalid':'' ?> " onkeyup="sum();" >
			<div class="invalid-feedback">
			<?php echo form_error('biaya_transport') ?>
			</div>	
		</div>

        <div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Uang Harian</label>
			<input type="number" name="uang_harian" id="uang_harian" class="form-control <?php echo form_error('uang_harian') ? 'is-invalid':'' ?> " onkeyup="sum();">
			<div class="invalid-feedback">
			<?php echo form_error('uang_harian') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Biaya Penginapan</label>
			<input type="number" id="biaya_penginapan" name="biaya_penginapan" class="form-control <?php echo form_error('biaya_penginapan') ? 'is-invalid':'' ?> " onkeyup="sum();">
			<div class="invalid-feedback">
			<?php echo form_error('biaya_penginapan') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Pengeluaran Riil</label>
			<input type="number" id="pengeluaran_riil" name="pengeluaran_riil" class="form-control <?php echo form_error('pengeluaran_riil') ? 'is-invalid':'' ?> " onkeyup="sum();">
			<div class="invalid-feedback">
			<?php echo form_error('pengeluaran_riil') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Total</label>
			<input type="number" id="total" name="total" class="form-control <?php echo form_error('total') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('total') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>
		

<div class="form-group col-md-6">
<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('biaya_transport').value;
      var txtSecondNumberValue = document.getElementById('uang_harian').value;
      var txtThirdNumberValue = document.getElementById('biaya_penginapan').value;
      var txtFourthNumberValue = document.getElementById('pengeluaran_riil').value;
      var result = parseFloat(txtFirstNumberValue) + parseFloat(txtSecondNumberValue) + parseFloat(txtThirdNumberValue) + parseFloat(txtFourthNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>
	</form>

</div> 
