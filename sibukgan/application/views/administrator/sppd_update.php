<div class="container-fluid">

	<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php endif; ?>
		<div class="card mb-3">
<div class="card-header">
		<a href="<?php echo site_url('administrator/sppd/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<div class="card-body">
	<form action="" method="post" class="row g-3">
		<input type="hidden" name="id" value="<?php echo $sppd->id_spt?>" />

		<div class="col-md-6">
			<label class="form-label" >Pejabat Pembuat Komitmen</label>
			<input name="pejabat_pemberi_perintah" id="pejabat_pemberi_perintah" class="form-control mb-3" value="Ir. ENDANG WIDYARTI, MM" readonly>
  			<div class="invalid-feedback">
			<?php echo form_error('pejabat_pemberi_perintah') ?>
			</div>	
		</div>

		<div class="col-md-6">
			<label class="form-label">NIP Pejabat Pembuat Komitmen</label>
			<input class="form-control mb-3"
			name="nip_ppk" id="nip_ppk" value="196708021994012001" readonly/>
		</div>

<!-- 				<div class="col-md-6">
			<label class="form-label" >Pegawai</label>
			<select class="form-control <?php echo form_error('pegawai') ? 'is-invalid':'' ?> mb-3"
			type="text" id="pegawai" name="pegawai" >
   			<option selected="0">...</option>
   			<?php                                
            foreach ($pegawai as $row) {  
            echo  "<option value='".$row->nama."'>".$row->nama.  "</option>";
            }
            ?>
  			</select>
  			<div class="invalid-feedback">
			<?php echo form_error('pegawai') ?>
			</div>	
		</div> -->

<!-- 		<div class="col-md-6">
			<label class="form-label" >Nomor SPD</label>
			<input class="form-control <?php echo form_error('no_sppd') ? 'is-invalid':'' ?>"
			type="text" name="no_sppd" />
			<div class="invalid-feedback">
			<?php echo form_error('no_sppd') ?>
			</div>
		</div> -->



<!-- 		<div class="col-md-6">
			<label class="form-label">NIP</label>
			<input class="form-control mb-3"
			name="nip_pegawai" id="nip_pegawai" readonly/>
		</div> -->



		<div class="col-md-6">
			<label class="form-label" >Tanggal Pembuatan SPD</label>
			<input class="form-control <?php echo form_error('tgl_spd') ? 'is-invalid':'' ?>"
			type="date" name="tgl_spd"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_spd') ?>
			</div>
		</div>

<!-- 		<div class="col-md-6">
			<label class="form-label">Jabatan</label>
			<input class="form-control mb-3 "
			name="jabatan_pegawai" id="jabatan_pegawai" readonly/>
		</div> -->

				<div class="col-md-6">
			<label class="form-label" >Kegiatan</label>
			<select name="kegiatan" class="form-control <?php echo form_error('kegiatan') ? 'is-invalid':'' ?> mb-3"
			type="text" name="kegiatan" >
			<option>...</option>
			<option>Pemutakhiran Survei SITASI 2021</option>
			<option>Pencacahan Survei SITASI 2021</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('kegiatan') ?>
			</div>
		</div>






<!-- 		<div class="col-md-6">
			<label class="form-label">Pangkat</label>
			<input class="form-control mb-3"
			name="pangkat_pegawai" id="pangkat_pegawai" readonly/>
		</div> -->

						<div class="col-md-6">
			<label class="form-label" >Tanggal Berangkat</label>
			<input class="form-control <?php echo form_error('tgl_berangkat') ? 'is-invalid':'' ?> mb-3"
			type="date" name="tgl_berangkat"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_berangkat') ?>
			</div>
		</div>


		

<!-- 		<div class="col-md-6">
			<label class="form-label">Golongan</label>
			<input class="form-control mb-3"
			name="golongan_pegawai" id="golongan_pegawai" readonly/>
		</div> -->


						<div class="col-md-6">
			<label class="form-label" >Program</label>
			<select name="program" class="form-control <?php echo form_error('program') ? 'is-invalid':'' ?> mb-3"
			type="text" name="program" >
			<option>...</option>
			<option>Program 1</option>
			<option>Program 2</option>
			<option>Program 3</option>
			<option>Program 4</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('program') ?>
			</div>
		</div>

				<div class="col-md-6">
			<label class="form-label" >Tanggal Kembali</label>
			<input class="form-control <?php echo form_error('tgl_kembali') ? 'is-invalid':'' ?> mb-3"
			type="date" name="tgl_kembali"/>
			<div class="invalid-feedback">
			<?php echo form_error('tgl_kembali') ?>
			</div>
		</div>








				<div class="col-md-6">
			<label class="form-label" >Komponen</label>
			<select name="komponen" class="form-control <?php echo form_error('komponen') ? 'is-invalid':'' ?> mb-3"
			type="text" name="komponen" >
			<option>...</option>
			<option>Komponen 1</option>
			<option>Komponen 2</option>
			<option>Komponen 3</option>
			<option>Komponen 4</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('komponen') ?>
			</div>
		</div>





		<div class="col-md-6">
			<label class="form-label" >Asal</label>
			<input class="form-control <?php echo form_error('asal') ? 'is-invalid':'' ?> mb-3"
			type="text" name="asal" value="BPS Kabupaten Jember" readonly/>
			<div class="invalid-feedback">
			<?php echo form_error('asal') ?>
			</div>
		</div>

								<div class="col-md-6">
			<label class="form-label" >Output</label>
			<select name="output" class="form-control <?php echo form_error('output') ? 'is-invalid':'' ?> mb-3"
			type="text" name="output" >
			<option>...</option>
			<option>Output 1</option>
			<option>Output 2</option>
			<option>Output 3</option>
			<option>Output 4</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('output') ?>
			</div>
		</div>









				<div class="col-md-6">
			<label for="tujuan">Tujuan</label>
			  <input list="list" name="tujuan" id="tujuan" class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?> mb-3">
  			<datalist id="list">
   			<?php                                
            foreach ($kecamatan as $row) {  
            echo  "<option value=".$row->kecamatan."></option>";
            }
            ?>
  			</datalist>
			<div class="invalid-feedback">
			<?php echo form_error('tujuan') ?>
			</div>
		</div>
						<div class="col-md-6">
			<label class="form-label" >Mata Anggaran</label>
			<select name="mata_anggaran" class="form-control <?php echo form_error('mata_anggaran') ? 'is-invalid':'' ?> mb-3"
			type="text" name="mata_anggaran" >
			<option>...</option>
			<option>Mata Anggaran 1</option>
			<option>Mata Anggaran 2</option>
			<option>Mata Anggaran 3</option>
			<option>Mata Anggaran 4</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('mata_anggaran') ?>
			</div>
		</div>





<!-- 				<div class="col-md-6">
			<label class="form-label">Keperluan</label>
			<input class="form-control <?php echo form_error('keperluan') ? 'is-invalid':'' ?> mb-3"
			type="text" name="keperluan"/>
			<div class="invalid-feedback">
			<?php echo form_error('keperluan') ?>
			</div>
		</div> -->

						<div class="col-md-6">
			<label class="form-label" >Jenis Transportasi</label>
			<select name="jenis_transport" class="form-control <?php echo form_error('jenis_transport') ? 'is-invalid':'' ?> mb-3"
			type="text" name="jenis_transport" >
			<option>...</option>
			<option>Dinas</option>
			<option>Non-Dinas</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('jenis_transport') ?>
			</div>
		</div>

		<div class="col-md-6">
			<label class="form-label" >Status</label>
			<select name="status_spd" class="form-control <?php echo form_error('status_spd') ? 'is-invalid':'' ?> mb-3"
			type="text" name="status_spd" readonly>
			<option value="3">Buat SPD</option>
			</select>
			<div class="invalid-feedback">
			<?php echo form_error('status_spd') ?>
			</div>
		</div>

<div class="col-md-6">
		<input class="btn btn-success" type="submit" name="btn" value="Save" />
</div>
	</form>
	
	
</div> 

