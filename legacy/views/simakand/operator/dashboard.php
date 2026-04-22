                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        
                    <div class="col-xl-4 col-md-6 mb-4">
                            <div class="shadow h-100 py-2 card bg-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                                Pegawai</div>
                                            <div class="h5 mb-0 font-weight-bold text-light"><?php echo $this->db->query("SELECT id FROM tb_user")->num_rows(); ?></div>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fas fa-user fa-2x text-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                       
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="shadow h-100 py-2 card bg-warning">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">Total Klaim
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-light">
                                                      <?php 
                                $page=0;
                                foreach ($bbm as $st) :
                                        ?>
                            
                                                 Rp. <?php echo number_format($st->b,2,',','.')?>
                             <?php endforeach; ?>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-light"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                           <div class="col-xl-4 col-md-6 mb-4">
                            <div class="shadow h-100 py-2 card bg-danger">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                            Sisa Anggaran</div>
                                            <div class="h5 mb-0 font-weight-bold text-light">
                                              <?php 
$page=0;
foreach ($pagu as $st) :
          $a= $st->pagu;
		 ?>

         <?php endforeach; ?>
        
           
          <?php 
          $page=0; 
                                              $b=0;
          foreach ($bbm as $st) :
          $b= $st->b; ?>
           
          <?php endforeach; ?>
          
          <?php $c=$a-$b; ?>
                                              Rp. <?php echo number_format($c,2,',','.')?>
                                              
                                          </div>  
                                        </div>
                                        <i class="fas fa-dollar-sign fa-2x text-light"></i>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                

   <!-- Content Row -->

   <div class="row">

<!-- Area Chart -->
<div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-2">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between  bg-secondary">
            <h6 class="m-0 font-weight-bold text-light">Sisa Anggaran</h6>
        </div>
        <!-- Card Body -->
      
        <div class="card-body">
                                              <?php 
$page=0;
foreach ($orang as $org) :
		 ?>

         
            <h6 class="font-weight-bold">Achmad Tasylichul Adib, S.Tr.Stat<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
    <?php endforeach; ?>
          
           <?php 
$page=0;
foreach ($orang2 as $org) :
		 ?>
     
            <h6 class="font-weight-bold">Arif Rahman, S.Tr. Stat.<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
 <?php endforeach; ?>
               <?php 
$page=0;
foreach ($orang3 as $org) :
		 ?>
            <h6 class="font-weight-bold">Bimbi Ardhana Rizky, S.Stat<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
    <?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang4 as $org) :
		 ?>
          <h6 class="font-weight-bold">Endri Setiawan, SE<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
     
     <?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang5 as $org) :
		 ?>
          <h6 class="font-weight-bold">Firza Refo Adi Pratama, S.Tr.Stat.<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
   <?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang6 as $org) :
		 ?>
          <h6 class="font-weight-bold">Leila Ayu Zanaria, SE<span
                    class="float-right">Rp. <?php echo number_format(34000000-$org->b,2,',','.')?></span></h6>
          <?php endforeach; ?>
 <?php 
$page=0;
foreach ($orang7 as $org) :
		 ?>
          
          <h6 class="font-weight-bold">Roma Dear Silitonga, SST<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
<?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang8 as $org) :
		 ?>
          <h6 class="font-weight-bold">Rafi Oktriatama, A.Md<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
     
  <?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang9 as $org) :
		 ?>
          <h6 class="font-weight-bold">Umar<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
     
<?php endforeach; ?>
           <?php 
$page=0;
foreach ($orang10 as $org) :
		 ?>
          <h6 class="font-weight-bold">Wahidi Astuti, SST<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
     <?php endforeach; ?>

           <?php 
$page=0;
foreach ($orang11 as $org) :
		 ?>
          <h6 class="font-weight-bold">Sultan Nabila Ravani, S.Tr.Stat<span
                    class="float-right">Rp. <?php echo number_format(3700000-$org->b,2,',','.')?></span></h6>
     
<?php endforeach; ?>
   


        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-4">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between  bg-secondary">
            <h6 class="m-0 font-weight-bold text-light">Pemakaian Anggaran</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <?php 
$page=0;
foreach ($pagu as $st) :
		 ?>
            <h6 class="font-weight-bold">Pagu Anggaran<span
                    class="float-right">Rp. <?php echo number_format($st->pagu,2,',','.')?></span></h6>
          <?php endforeach; ?>
            <div class="progress mb-4">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="font-weight-bold">Pengeluaran<span
                    class="float-right"><?php 
                                $page=0;
                                foreach ($bbm as $st) :
                                        ?>
                             Rp. <?php echo number_format($st->b,2,',','.')?>
                             <?php endforeach; ?></span></h6>
            <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              
            </div>
              
            <h6 class="font-weight-bold">Sisa Anggaran<span
                    class="float-right">Rp. <?php echo number_format($c,2,',','.')?></span></h6>
     
            <div class="progress mb-4">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
         
        </div>
    </div>
</div>
</div>
                  
                  

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
<span>Copyright &copy; BPS Sekadau 2022</span>
</div>
</div>
</footer>
<!-- End of Footer -->


<!-- End of Content Wrapper -->


<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>



