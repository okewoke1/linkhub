<div class="container-fluid">



		<div class="card mb-3">
			
<div class="card-header">
		<a href="<?php echo site_url('sibukgan/user/spt/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

						
<table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          <u>SURAT TUGAS</u>
          <?php foreach($detail as $ts): ?>
          <br>Nomor : <?php echo $ts->nomor ?>
          <?php endforeach ?>
        </span>
      </td>
    </tr>
  </table>

<br>
  <p>
    <br>
    Yang bertandatangan di bawah ini :
  </p>
  <table class="table table-bordered">
  	 <?php foreach($detail as $ts): ?>
    <tr>
      <tr><th width="20px">Nama</th><th width="20px">:</th><td><?php echo $ts->pemberi_tugas ?></td></tr>
      <tr><th>NIP</th><th>:</th><td><?php echo $ts->nip_atasan ?></td></tr>
      <tr><th>Jabatan</th><th>:</th><td><?php echo $ts->jabatan_atasan ?></td></tr>
    



    <?php endforeach ?>

		<!-- <script type="text/javascript">
			window.print();
		</script> -->
  </table>

          <p>
    <br>
    Dengan ini menugaskan kepada :
  </p>
   </tr>

     <table class="table table-bordered">
  	 <?php foreach($detail as $ts): ?>
    <tr>
      <tr><th width="20px">Nama</th ><th width="20px">:</th><td><?php echo $ts->pegawai ?></td></tr>
      <tr><th >NIP</th><th>:</th><td><?php echo $ts->nip ?></td></tr>
      <tr><th >Jabatan</th><th>:</th><td><?php echo $ts->jabatan ?></td></tr>
    



    <?php endforeach ?>

		
  </table>

            <p>
    <br>
    Untuk melakukan kegiatan sebagaimana berikut :
  </p>



  <table class="table table-bordered">
    <tr>
      <th class="text-center" width="20px">No</th>
      <th class="text-center"width="500px">Kegiatan</th>
      <th class="text-center" width="20px">Vol</th>
      <th colspan="13" class="text-center">Bulan</th>
    </tr>

      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="13" class="text-center">Tanggal</th>
      </tr>

            <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>1</th>
        <th>...</th>
        <th>6</th>
        <th>...</th>
        <th>8</th>
        <th>...</th>
        <th>13</th>
        <th>...</th>
        <th>23</th>
        <th>...</th>
        <th>29</th>
        <th>...</th>
        <th>31</th>
      </tr>

            <tr height="80px">
                <?php foreach($detail as $ts): ?>
        <th>1</th>
        <th><?php echo $ts->keperluan ?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <?php endforeach ?>
      </tr>

  </table>
   <br> <br>
  <br> <br>   

  <table >
     <tr>
        <th width="800px"></th>
        
        <th class="text-center">Jember, &nbsp; November 2021</th>
      </tr>
           <tr>
        <th width="800px"></th>
        <th class="text-center">Kepala BPS Kabupaten Jember</th>
      </tr>
 </table>
    <br> <br>
  <br> <br> 


    <table>

     <tr>
        <th width="800px"></th>
        <th class="text-center"><u>Ir. ARIF JOKO SUTEJO, MM</u></th>
      </tr>
           <tr>
        <th width="800px"></th>
        <th class="text-center">NIP. 19671026 199102 1 001</th>
      </tr>
 </table>














	
												
											
