<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('administrator/sptplh2/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
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
			<label class="form-label" >Anggota</label>
			<select class="form-control <?php echo form_error('anggota_1') ? 'is-invalid':'' ?> "
			type="text" id="anggota_1" name="anggota_1" >
   			<option selected="0"><?php echo $spt->anggota_1 ?></option>
   			<?php                                
            foreach ($pegawai as $row) {  
            echo  "<option value='".$row->nama."'>".$row->nama.  "</option>";
            }
            ?>
  			</select>
  			<div class="invalid-feedback">
			<?php echo form_error('anggota_1') ?>
			</div>	
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">NIP</label>
			<input name="nip" id="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?> mb-3" value="<?php echo $spt->nip ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nip') ?>
			</div>	
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">NIP</label>
			<input name="nip_1" id="nip_1" class="form-control <?php echo form_error('nip_1') ? 'is-invalid':'' ?> mb-3" value="<?php echo $spt->nip_1 ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nip_1') ?>
			</div>	
		</div>

       


	<div class="form-group col-md-6">
		<label class="form-label">Jabatan</label>
		<input name="jabatan" id="jabatan" class="form-control " value="<?php echo $spt->jabatan ?>" readonly>
	</div>

    <div class="form-group col-md-6">
		<label class="form-label">Jabatan</label>
		<input name="jabatan_1" id="jabatan_1" class="form-control " value="<?php echo $spt->jabatan_1 ?>" readonly>
	</div>
		

		<div class="col-md-6">
			<label class="form-label">Pangkat</label>
			<input class="form-control mb-3" name="pangkat_pegawai" id="pangkat_pegawai" value="<?php echo $spt->pangkat_pegawai ?>" readonly/>
		</div>

        <div class="col-md-6">
			<label class="form-label">Pangkat</label>
			<input class="form-control mb-3" name="pangkat_1" id="pangkat_1" value="<?php echo $spt->pangkat_1 ?>" readonly/>
		</div>

        <div class="col-md-6">
			<label class="form-label">Golongan</label>
			<input class="form-control mb-3"
			name="golongan_pegawai" id="golongan_pegawai" value="<?php echo $spt->golongan_pegawai ?>" readonly/>
		</div>

        <div class="col-md-6">
			<label class="form-label">Golongan</label>
			<input class="form-control mb-3"
			name="golongan_1" id="golongan_1" value="<?php echo $spt->golongan_1 ?>" readonly/>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label" >Tanggal Pembuatan SPT</label>
			<input class="form-control <?php echo form_error('tgl_spt') ? 'is-invalid':'' ?> "
			type="date" name="tgl_spt" value="<?php echo $spt->tgl_spt ?>"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_spt') ?>
			</div>
		</div>

        <div class="form-group col-md-1">
			<label class="form-label" >Nomor</label>

			<input type="text" name="no" id="no" class="form-control <?php echo form_error('no') ? 'is-invalid':'' ?> " value="<?php echo $spt->no ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('no') ?>
			</div>

		</div>

        <div class="form-group col-md-2">
			<label class="form-label" >Nama Fungsi</label>
			<select id="nomor" class="form-control <?php echo form_error('nomor') ? 'is-invalid':'' ?>" name="nomor">
				<option selected="0">Choose...</option>
				<option value="1">Umum</option>
		<option value="2">Sosial</option>
		<option value="3">Produksi</option>
		<option value="4">Distribusi</option>
		<option value="5">NWAS</option>
		<option value="6">IPDS</option>
      		</select>
			<div class="invalid-feedback">
			<?php echo form_error('nomor') ?>
			</div>
		</div>

        <div class="form-group col-md-3">
      <label class="form-label">Kode Huruf</label>
      <select id="kode_huruf" class="form-control <?php echo form_error('kode_huruf') ? 'is-invalid':'' ?>" name="kode_huruf">
        <option selected="0">Choose...</option>
        <option value="SS.220">Pelatihan Petugas Sensus</option>
		<option value="SS.310">Listing Sensus</option>
		<option value="SS.330">Pengumpulan Data Sensus</option>
		<option value="SS.350">Pengawasan Lapangan Sensus</option>
		<option value="SS.220">Pelatihan Petugas Survei</option>
		<option value="VS.310">Listing Survei</option>
		<option value="VS.330">Pengumpulan Data Survei</option>
		<option value="VS.350">Pengawasan Lapangan Survei</option>
		<option value="KS.200">Penyusunan Publikasi</option>
		<option value="KP.650">Surat Perintah Dinas/Surat Tugas</option>
      </select>
	  <div class="invalid-feedback">
			<?php echo form_error('kode_huruf') ?>
			</div>
    </div>

		<div class="form-group col-md-6">
			<label class="form-label">Untuk</label>
			<input type="text" name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?> " value="<?php echo $spt->keperluan ?>" >
			<div class="invalid-feedback">
			<?php echo form_error('keperluan') ?>
			</div>
		</div>
		

		<div class="form-group col-md-6">
			<label class="form-label">Menimbang</label>
			<input type="text" name="menimbang" class="form-control <?php echo form_error('menimbang') ? 'is-invalid':'' ?> " value="<?php echo $spt->menimbang ?>" >
			<div class="invalid-feedback">
			<?php echo form_error('menimbang') ?>
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
			<label class="form-label">Tanggal Kembali</label>
			<input type="date" name="tgl_kembali" class="form-control <?php echo form_error('tgl_kembali') ? 'is-invalid':'' ?> " value="<?php echo $spt->tgl_kembali ?>">
			<div class="invalid-feedback">
			<?php echo form_error('tgl_kembali') ?>
			</div>
		</div>

        <div class="form-group col-md-6">
			<label class="form-label">Tempat</label>
			<input type="text" list="tempat_tugas"  class="form-control <?php echo form_error('tempat_tugas') ? 'is-invalid':'' ?>" name="tempat_tugas" value="<?php echo $spt->tempat_tugas ?>"/>
				<datalist id="tempat_tugas">
				<option>Sekadau Hilir</option>
				<option>Sekadau Hulu</option>
				<option>Nanga Mahap</option>
				<option>Nanga Taman</option>
				<option>Belitang</option>
				<option>Belitang Hilir</option>
				<option>Belitang Hulu</option>
				</datalist>
			<div class="invalid-feedback">
			<?php echo form_error('tempat_tugas') ?>
			</div>
		</div>

		


		<div class="form-group col-md-2">
      <label class="form-label">Penugasan PLH</label>
      <select id="status_plh" class="form-control <?php echo form_error('status_plh') ? 'is-invalid':'' ?>" name="status_plh">
        <option><?php echo $spt->status_plh ?></option>
        <option>Afifah Nuraini Gunawan</option>
        <option>Endri Setiawan</option>
        <option>Sultan Nabila Ravani</option>
        <option>Rusli Salam</option>
        <option>Juhairiah</option>
        <option>Wahidi Astuti</option>
        <option>Yon Malikul Kudus</option>
        <option>Firza Refo Adi Pratama</option>
        <option>Febi Taufiqurrahman</option>
        <option>Arif Rahman</option>
        <option>Diva Arum Mustika</option>
        <option>Achmad Tasylichul Adib</option>
        <option>Bimbi Ardhana Rizky</option>
        <option>Daniel Haratio Rupert Marpaung</option>
        <option>Tju Ji Long</option>
        <option>Rafi Oktriatama</option>
        <option>Umar</option>
        <option>Roma Dear Silitonga</option>
      </select>
	  <div class="invalid-feedback">
			<?php echo form_error('status_plh') ?>
			</div>
    </div>

    <div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

	</form>

</div> 
