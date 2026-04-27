<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('administrator/spt/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="<?php echo base_url('administrator/spt/add') ?>" method="post" class="form-row">

		<div class="form-group col-md-6">
			<label class="form-label" >Pegawai</label>
			<select class="form-control <?php echo form_error('pegawai') ? 'is-invalid':'' ?> "
			type="text" id="nama" name="pegawai" >
   			<option selected="0">Choose...</option>
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
			<input name="nip" id="nip" class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?> " readonly>
			<div class="invalid-feedback">
			<?php echo form_error('nip') ?>
			</div>	
		</div>
      
      <div class="form-group col-md-1">
			<label class="form-label" >Nomor</label>

			<input type="text" name="no" id="no" class="form-control <?php echo form_error('no') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			</div>
    
		</div>

		

		<div class="form-group col-md-2">
			<label class="form-label" >Nama Fungsi</label>
			<select id="nomor" class="form-control <?php echo form_error('nomor') ? 'is-invalid':'' ?>" name="nomor">
        <option value="">Choose...</option>
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
        <option value="">Choose...</option>
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
			<label class="form-label">Jabatan</label>
			<input name="jabatan" id="jabatan" class="form-control " readonly>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label" >Tanggal Pembuatan SPT</label>
			<input class="form-control <?php echo form_error('tgl_spt') ? 'is-invalid':'' ?> "
			type="date" name="tgl_spt"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_spt') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Pangkat</label>
			<input class="form-control "
			name="pangkat_pegawai" id="pangkat_pegawai" readonly/>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Untuk</label>
			<input type="text" name="keperluan" class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('keperluan') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Golongan</label>
			<input class="form-control "
			name="golongan_pegawai" id="golongan_pegawai" readonly/>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Menimbang</label>
			<input type="text" name="menimbang" class="form-control <?php echo form_error('menimbang') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('menimbang') ?>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Berangkat</label>
			<input type="date" name="tgl_berangkat" class="form-control <?php echo form_error('tgl_berangkat') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_berangkat') ?>
			</div>
		</div>

		
		<div class="form-group col-md-6">
			<label class="form-label">Tempat</label>
			<input type="text" list="tempat_tugas"  class="form-control <?php echo form_error('tempat_tugas') ? 'is-invalid':'' ?>" name="tempat_tugas"/>
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

		<div class="form-group col-md-6">
			<label class="form-label">Tanggal Kembali</label>
			<input type="date" name="tgl_kembali" class="form-control <?php echo form_error('tgl_kembali') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('tgl_kembali') ?>
			</div>
		</div>
		
			<div class="form-group col-md-6">
			<label class="form-label">Pembebanan</label>
			<input type="text" name="kode_anggaran" class="form-control <?php echo form_error('kode_anggaran') ? 'is-invalid':'' ?> " >
			<div class="invalid-feedback">
			<?php echo form_error('kode_anggaran') ?>
			</div>
		</div>
		

		<div class="form-group col-md-2"  id="drop-down" name="drop-down">
      <label class="form-label" for="status_spd">Aktifkan SPD</label>
      <select id="status_spd" class="form-control" name="status_spd"  onChange=showHide()>
        <option value="1">Ya</option>
		<option value="2">Tidak</option>
      </select>
    </div>

<div class="form-group col-md-2" name="hidden-panel" id="hidden-panel">

    <label class="form-label" for="nomor_spd">Nomor SPD</label>
    <input type="number" name="nomor_spd" class="form-control " id="nomor_spd">
<br>
	<select id="jenis_transport" class="form-control" name="jenis_transport">
	<option>Choose...</option>
        <option>Kendaraan Dinas</option>
		<option>Angkutan Umum</option>
		<option>Kendaraan Pribadi</option>
    </select>

</div>

		

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>

		


		

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>
		

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>
<script>
function showHide() {
    var statusSpd = document.getElementById("status_spd").value;
    var hiddenPanel = document.getElementById("hidden-panel");

    if (statusSpd === "1") {
        hiddenPanel.style.display = "block";
    } else {
        hiddenPanel.style.display = "none";
    }
}

// Jalankan saat halaman dibuka (untuk set awal)
window.onload = function() {
    showHide();
};
</script>


	</form>

</div> 
