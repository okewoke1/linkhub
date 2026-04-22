<div class="container-fluid">
	<div class="alert alert-success" role="alert">
		Daftar Laporan
	</div>

	<div class="card shadow mb-4">
        <div class="card-body">
		<a href="<?php echo base_url() ?>assets/sibukgan/lpd.xlsx" download>Template Laporan Perjalanan Dinas</a><br>
		<a href="<?php echo base_url() ?>assets/sibukgan/sptm.docx" download>Template Surat Pernyataan Tidak Menginap</a><br>
          <a href="<?php echo base_url() ?>assets/sibukgan/sptmk.docx" download>Template Surat Pernyataan Tidak Menggunakan Kendis</a><br>
          <a href="<?php echo base_url() ?>assets/sibukgan/ll.docx" download>Template Laporan Lembur</a>
		</div>
	</div>
<div class="card shadow mb-4">
                     <div class="card-body">
                            
<table id="dataTable" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
		<tr>
			<th>No</th>
			<th>Nomor</th>
			<th>Pegawai</th>
			<th>Tanggal Laporan</th>
			<th>Laporan</th>
			<th>Status</th>
		</tr>
       </thead>
        <tbody>
		<?php 
$page=0;
foreach ($laporan as $st) :
		 ?>
		 <tr>
		 	<td width="20px"><?php echo ++$page ?></td>
		 	<?php
      $bln1 = date("m",strtotime($st->tgl_spt));
      ?>
		 	<td>B-<?php echo $st->no ?>/6109<?php echo $st->nomor ?>/<?php echo $st->kode_huruf ?>/<?php echo ($bln1);?>/2022</td>
		 	<td><?php echo $st->pegawai ?></td>
		 	<td><?php echo $st->tgl_laporan ?></td>
		 	<td width="20px" class="text-center"><abbr title="download"><a href="<?php echo base_url().'sibukgan/administrator/laporan/download/'.$st->id_spt; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a></abbr></td>
		 	<td width="20px">				
		 		<?php
				 if($st->status_laporan == 1){
				echo "<span class='badge badge-success'>Sudah Dibuat</span>";
			}
		
		else{
			echo "<span class='badge badge-secondary'>Belum Dibuat</span>";
		}?></td>
		 </tr>
		<?php endforeach; ?>
	</tbody>
    </table>
    </div>
    
    </div>
	            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BPS Sekadau 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->


	
</div>