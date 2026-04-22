<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('administrator/sptplh/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="<?php echo base_url('administrator/sptplh/add') ?>" method="post" class="form-row">

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
			<?php echo form_error('pegawai') ?>
			</div>	
		</div>
      
      <div class="form-group col-md-1">
			<label class="form-label" >Nomor</label>
		<?php foreach ($kd as $data) :
              $a = $data['no'];     
			$a++;
			$kd = sprintf($a);
		 ?>
			<input type="text" name="no" id="no" class="form-control <?php echo form_error('no') ? 'is-invalid':'' ?> " value="<?php echo $kd ?>" readonly>
			<div class="invalid-feedback">
			<?php echo form_error('no') ?>
			</div>
        <?php endforeach; ?>
		</div>

		

		<div class="form-group col-md-2">
			<label class="form-label" >Nama Fungsi</label>
			<select id="nomor" class="form-control <?php echo form_error('nomor') ? 'is-invalid':'' ?>" name="nomor">
        <option>Choose...</option>
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
      <label class="form-label">Kode Surat</label>
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
        <option value="KP.650">Supervisi</option>
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

		<div class="form-group col-md-2"  id="drop-down" name="drop-down">
      <label class="form-label" for="status_spd">Aktifkan SPD</label>
      <select id="status_spd" class="form-control" name="status_spd"  onChange=showHide()>
        <option value="1">Ya</option>
		<option value="2">Tidak</option>
      </select>
    </div>

<div class="form-group col-md-2" name="hidden-panel" id="hidden-panel">
<?php foreach ($kd2 as $data) :
              $b = $data['nomor_spd'];     
			$b++;
			$kd2 = sprintf($b);
		 ?>
    <label class="form-label" for="nomor_spd">Nomor SPD</label>
    <input type="number" name="nomor_spd" class="form-control " id="nomor_spd" value="<?php echo $kd2 ?>">
<br>
	<select id="jenis_transport" class="form-control" name="jenis_transport">
	<option>Choose...</option>
        <option>Kendaraan Dinas</option>
		<option>Angkutan Umum</option>
		<option>Kendaraan Pribadi</option>
    </select>
	<?php endforeach; ?>
</div>

<div class="form-group col-md-2">
			<label class="form-label"></label>
		</div>

    <div class="form-group col-md-2">
      <label class="form-label">Penugasan PLH</label>
      <select id="status_plh" class="form-control <?php echo form_error('status_plh') ? 'is-invalid':'' ?>" name="status_plh">
        <option>Choose...</option>
        <option>Afifah Nuraini Gunawan</option>
        <option>Endri Setiawan</option>
        <option>Sultan Nabila Ravani</option>
        <option>Juhairiah</option>
        <option>Wahidi Astuti</option>
        <option>Sri Suyatmi</option>
        <option>Firza Refo Adi Pratama</option>
        <option>Febi Taufiqurrahman</option>
        <option>Arif Rahman</option>
        <option>Murohman</option>
        <option>Daniel Haratio Rupert Marpaung</option>
        <option>Tju Ji Long</option>
        <option>Rafi Oktriatama</option>
        <option>Roma Dear Silitonga</option>
      </select>
	  <div class="invalid-feedback">
			<?php echo form_error('status_plh') ?>
			</div>
    </div>



		

		

		<div class="form-group col-md-6">
			<label class="form-label"></label>
		</div>
		

<div class="form-group col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>

<script>
function showHide() {
    let travelhistory = document.getElementById('status_spd')
    if (travelhistory.value == 1) {
        document.getElementById('hidden-panel').style.display = 'block'
    } else {
        document.getElementById('hidden-panel').style.display = 'none'
    }
}


</script>
	</form>

</div> 
