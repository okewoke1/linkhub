<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('sibukgan/administrator/pegawai/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="<?php echo base_url('sibukgan/administrator/pegawai/add') ?>" method="post" class="row g-3">

		<div class="col-md-6">
			<label for="nama" class="form-label">Nama Pegawai</label>
			<input name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?> mb-3" ></input>
			<div class="invalid-feedback">
			<?php echo form_error('nama') ?>
			</div>
		</div>
		

		<div class="col-md-6">
			<label for="nip" class="form-label" >NIP</label>
			<input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?> mb-3"
			type="text" name="nip" maxlength="18"/>
			<div class="invalid-feedback">
			<?php echo form_error('nip') ?>
			</div>
		</div>


<div class="col-md-6">
			<label for="email" class="form-label">Email</label>
			<input name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?> mb-3" ></input>
			<div class="invalid-feedback">
			<?php echo form_error('email') ?>
			</div>
		</div>
		

				<div class="col-md-6">
			<label for="golongan" class="form-label">Golongan</label>
			<select class="form-control <?php echo form_error('golongan') ? 'is-invalid':'' ?> mb-3"
			type="text" id="golongan" name="golongan" >
   			<option></option>
			<option>I/a</option>
			<option>I/b</option>
			<option>I/c</option>
			<option>I/d</option>
			<option>II/a</option>
			<option>II/b</option>
			<option>II/c</option>
			<option>II/d</option>
			<option>III/a</option>
			<option>III/b</option>
			<option>III/c</option>
			<option>III/d</option>
			<option>IV/a</option>
			<option>IV/b</option>
			<option>IV/c</option>
			<option>IV/d</option>
			<option>IV/e</option>
			<option>VII</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('golongan') ?>
			</div>
		</div>

				<div class="col-md-6">
			<label for="password" class="form-label" >Password</label>
			<input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?> mb-3"
			 name="password"/>
			<div class="invalid-feedback">
			<?php echo form_error('password') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label for="jabatan" class="form-label" >Jabatan</label>
			<input class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?> mb-3"
			 name="jabatan"/>
			<div class="invalid-feedback">
			<?php echo form_error('jabatan') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label for="level" class="form-label">Level</label>
			<select class="form-control <?php echo form_error('level') ? 'is-invalid':'' ?> mb-3"
			type="text" id="level" name="level" >
   			<option></option>
			<option>Admin</option>
			<option>User</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('level') ?>
			</div>
		</div>

				<div class="col-md-6">
			<label for="pangkat" class="form-label" >Pangkat</label>
			<select class="form-control <?php echo form_error('pangkat') ? 'is-invalid':'' ?> mb-3"
			type="text" id="pangkat" name="pangkat" >
   			<option></option>
   			<option>-</option>
			<option>Juru Muda</option>
			<option>Juru Muda Tk.I</option>
			<option>Juru</option>
			<option>Juru Tingkat I</option>
			<option>Pengatur Muda</option>
			<option>Pengatur Muda Tk.I</option>
			<option>Pengatur</option>
			<option>Pengatur Tk.I</option>
			<option>Penata Muda</option>
			<option>Penata Muda Tk.I</option>
			<option>Penata</option>
			<option>Penata Tk.I</option>
			<option>Pembina</option>
			<option>Pembina Tk.I</option>
			<option>Pembina Utama Muda</option>
			<option>Pembina Utama Madya</option>
			<option>Pembina Utama</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('pangkat') ?>
			</div>
		</div>

				<div class="col-md-6">
			<label for="status" class="form-label" >Status</label>
			<select class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?> mb-3"
			type="text" id="status" name="status" >
   			<option></option>
			<option value="1">Aktif</option>
			<option value="2">Tidak Aktif</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('status') ?>
			</div>
		</div>





		<div class="col-md-6">
			<input class="btn btn-success" type="submit" name="btn" value="Save" />
		</div>

	</form>	
	
</div> 