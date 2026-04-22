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
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pegawai</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->query("SELECT id FROM master_users")->num_rows(); ?></div>
                                            <a>Total Data Pegawai</a>
                                        </div>
                                        <div class="col-auto">  
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                     

                       
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Tugas
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $this->db->query("SELECT id_spt FROM tb_spt WHERE statuspost=0")->num_rows(); ?></div>
                                                    <a>ST dibuat</a>
                                                </div>
                                                <div class="col">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                           <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Laporan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->query("SELECT id_spt FROM tb_spt WHERE status_laporan=0")->num_rows(); ?></div>
                                              <a>Laporan belum dibuat</a>
                                              
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                

                    <!-- Content Row -->

                    <div class="row">

                       
                        <div class="col-xl-12">
                            <div class="card shadow">
                               
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Surat Tugas</h6>
                                    <div class="dropdown no-arrow">
                                    
                                
                                    </div>
                                </div>
                              
                                <div class="card-body">
                                <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myChart" style="display: block; height: 160px; width: 541px;" width="676" height="200" class="chartjs-render-monitor"></canvas>
                                    </div>
    <script src="<?php echo base_url()?>/assets/chart.js/Chart.js"></script>
    <?php
    //Inisialisasi nilai variabel awal
    $tanggal= "";
    $jumlah=null;
    foreach ($hasil as $item)
    {
        $tgl=$item->tgl_spt;
        $tanggal .= "'$tgl'". ", ";
        $jum=$item->total;
        $jumlah .= "$jum". ", ";
    }
    ?>

<?php
    //Inisialisasi nilai variabel awal
    $orang= "";
    foreach ($nama as $item1)
    {
        $org=$item1->pegawai;
        $orang .= "'$org'". ", ";
    }
    ?>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php echo $tanggal; ?>],
            datasets: [{
                label:'Total',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [<?php echo $jumlah; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>

</div></div></div></div>           
                <br><br><br><br>   <br><br>

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
        <!-- End of Content Wrapper -->

        </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



 