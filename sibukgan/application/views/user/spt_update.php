<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('user/spt/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="" method="post" class="row g-3">
		<input type="hidden" name="id" value="<?php echo $spt->id_spt?>" />

		<div class="form-group col-md-6">
			<label class="form-label" >Pegawai</label>
			<select class="form-control <?php echo form_error('pegawai') ? 'is-invalid':'' ?> mb-3"
			type="text" id="nama" name="pegawai" >
   			<option selected="0"><?php echo $spt->pegawai ?></option>
   			<?php                                
            foreach ($pegawai as $row) {  
            echo  "<option value='".$row->nama."'>".$row->nama.  "</option>";
            }
            ?>
  			</select>
  			<div class="invalid-feedback">
			<?php echo form_error('pegawai') ?>
			</div>	
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">NIP</label>
			<input name="nip" id="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?> mb-3" value="<?php echo $spt->nip ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nip') ?>
			</div>	
		</div>

		<div class="form-group col-md-2">
			<label class="form-label" >Nama Fungsi</label>
			<select id="nomor" class="form-control <?php echo form_error('nomor') ? 'is-invalid':'' ?>" name="nomor">
				<option selected="0"><?php echo $spt->kode_seksi ?></option>
				<option selected="1">Umum</option>
				<option selected="2">Sosial</option>
				<option selected="3">Produksi</option>
				<option selected="4">Distribusi</option>
				<option selected="5">NWAS</option>
				<option selected="6">IPDS</option>
      		</select>
			<div class="invalid-feedback">
			<?php echo form_error('nomor') ?>
			</div>
		</div>

		<div class="form-group col-md-2">
			<label class="form-label">Kode Huruf</label>
			<select id="kode_huruf" class="form-control <?php echo form_error('kode_huruf') ? 'is-invalid':'' ?>" name="kode_huruf">
				<option selected="0"><?php echo $spt->kode_huruf ?></option>
				<option>KP</option>
				<option>VS</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('kode_huruf') ?>
			</div>
    	</div>

	<div class="form-group col-md-2">
      <label class="form-label">Kode Angka</label>
      <select id="kode_angka" class="form-control <?php echo form_error('kode_angka') ? 'is-invalid':'' ?>" name="kode_angka">
        <option selected="0"><?php echo $spt->kode_angka ?></option>
        <option>650</option>
		<option>310</option>
		<option>330</option>
		<option>350</option>
		<option>220</option>
      </select>
	  	<div class="invalid-feedback">
		<?php echo form_error('kode_angka') ?>
		</div>
    </div>

	<div class="form-group col-md-6">
		<label class="form-label">Jabatan</label>
		<input name="jabatan" id="jabatan" class="form-control " value="<?php echo $spt->jabatan ?>" readonly>
	</div>

		<div class="form-group col-md-6">
			<label class="form-label" >Tanggal Pembuatan SPT</label>
			<input class="form-control <?php echo form_error('tgl_spt') ? 'is-invalid':'' ?> "
			type="date" name="tgl_spt" value="<?php echo $spt->tgl_spt ?>"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_spt') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label class="form-label">Pangkat</label>
			<input class="form-control mb-3" name="pangkat_pegawai" id="pangkat_pegawai" value="<?php echo $spt->pangkat_pegawai ?>" readonly/>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Untuk</label>
			<input type="text" name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?> " value="<?php echo $spt->keperluan ?>" >
			<div class="invalid-feedback">
			<?php echo form_error('keperluan') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label class="form-label">Golongan</label>
			<input class="form-control mb-3"
			name="golongan_pegawai" id="golongan_pegawai" value="<?php echo $spt->golongan_pegawai ?>" readonly/>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Menimbang</label>
			<input type="text" name="menimbang" class="form-control <?php echo form_error('menimbang') ? 'is-invalid':'' ?> " value="<?php echo $spt->menimbang ?>" >
			<div class="invalid-feedback">
			<?php echo form_error('menimbang') ?>
			</div>
		</div>

		<div class="form-group col-md-2">
			<label class="form-label">Aktifkan SPD</label>
			<select id="status_spd" class="form-control <?php echo form_error('status_spd') ? 'is-invalid':'' ?>" name="status_spd">
				<option selected="0"><?php echo $spt->status_spd ?></option>
				<option selected="1">Ya</option>
				<option selected="2">Tidak</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('status_spd') ?>
			</div>
    	</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Berangkat</label>
			<input type="date" name="tgl_berangkat" class="form-control <?php echo form_error('tgl_berangkat') ? 'is-invalid':'' ?> " value="<?php echo $spt->tgl_berangkat ?>" >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_berangkat') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Kembali</label>
			<input type="date" name="tgl_kembali" class="form-control <?php echo form_error('tgl_kembali') ? 'is-invalid':'' ?> " value="<?php echo $spt->tgl_kembali ?>">
			<div class="invalid-feedback">
			<?php echo form_error('tgl_kembali') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tempat</label>
			<select id="tempat_tugas" class="form-control <?php echo form_error('tempat_tugas') ? 'is-invalid':'' ?>" name="tempat_tugas">
			<option selected="0"><?php echo $spt->tempat_tugas?></option>
			<option>Sekadau Hilir</option>
			<option>Sekadau Hulu</option>
			<option>Nanga Mahap</option>
			<option>Nanga Taman</option>
			<option>Belitang</option>
			<option>Belitang Hilir</option>
			<option>Belitang Hulu</option>
      	</select>
			<div class="invalid-feedback">
			<?php echo form_error('tempat_tugas') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		<div class="col-md-6">
			<input class="btn btn-success" type="submit" name="btn" value="Save" />
		</div>

		<div class="col-md-6">
			<label class="form-label" >Status</label>
			<select name="statuspost" class="form-control <?php echo form_error('status_spd') ? 'is-invalid':'' ?> mb-3"
			type="text" name="statuspost" readonly>
			<option value="3">Edit Surat Tugas</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('statuspost') ?>
			</div>
		</div>

	</form>

</div> 
