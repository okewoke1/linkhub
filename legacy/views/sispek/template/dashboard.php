<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $page_heading; ?></h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL NILAI SPK BULAN INI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo format_rupiah($total_perjanjian_bulan_ini); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL NILAI SPK TAHUN INI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo format_rupiah($total_perjanjian_tahun_ini); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">BANYAKNYA SPK BULAN INI
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo ($spk_bulan_ini); ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                BANYAKNYA SPK TAHUN INI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($spk_tahun_ini); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="row">

        <div class="col-lg-4 col-md-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-arrow-circle-left" "></i> PERJANJIAN KONTRAK BULAN SEBELUMNYA</h6>
                </div>
                <div class="card-body">
                    <!--<table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">-->
                        <table class="table table-bordered" id="table_dashboard2" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th style="width:10px;vertical-align: middle">No.</th>
                                <th>Nama</th>
                                <th style="width:100px;">Honor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($daftarspkbulanlalu as $row) : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('sispek/datamitra/index/' . $row->id_sobat); ?>" class="text-decoration-none">
                                            <b><?php echo ucwords(strtolower($row->nama_mitra)); ?></b>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm view-detail_mitra"
                                            data-spk="<?= htmlspecialchars(json_encode($spk_data1[$row->no_spk] ?? [])); ?>">
                                            <?php echo format_rupiah($row->total_perjanjian); ?>
                                        </button>
                                    </td>
                                </tr>
                                <!-- <td>
                                    <button class="btn btn-info btn-sm view-detail"
                                        data-spk='<?= htmlspecialchars(json_encode($spk_data1[$row->no_spk] ?? []), ENT_QUOTES, 'UTF-8'); ?>'>
                                        <?php echo format_rupiah($row->total_perjanjian); ?>
                                    </button>
                                    <pre><?php echo json_encode($spk_data1[$row->no_spk] ?? [], JSON_PRETTY_PRINT); ?></pre>
                                </td> -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">

            <!-- Circle Buttons -->
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PERJANJIAN KONTRAK BULAN INI</h6>
                </div>
                <div class="card-body">
                   
                        <table class="table table-bordered" id="table_dashboard1" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th style="width:10px;vertical-align: middle">No.</th>
                                <th>Nama</th>
                                <th style="width:100px;">Honor</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($daftarspk as $row) : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('sispek/datamitra/index/' . $row->id_sobat); ?>" class="text-decoration-none">
                                            <b><?php echo ucwords(strtolower($row->nama_mitra)); ?></b>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm view-detail_mitra"
                                            data-spk="<?= htmlspecialchars(json_encode($spk_data[$row->no_spk] ?? [])); ?>">
                                            <?php echo format_rupiah($row->total_perjanjian); ?>
                                        </button>
                                    </td>
                                </tr>
                                <!-- <td>
                                    <button class="btn btn-info btn-sm view-detail"
                                        data-spk='<?= htmlspecialchars(json_encode($spk_data[$row->no_spk] ?? []), ENT_QUOTES, 'UTF-8'); ?>'>
                                        <?php echo format_rupiah($row->total_perjanjian); ?>
                                    </button>
                                    <pre><?php echo json_encode($spk_data[$row->no_spk] ?? [], JSON_PRETTY_PRINT); ?></pre>
                                </td> -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

        <div class="col-lg-4 col-md-6">
            <!-- Circle Buttons -->
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PERJANJIAN KONTRAK BULAN SELANJUTNYA <i class="fa fa-arrow-circle-right" "></i></h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table_dashboard3" width="100%" cellspacing="0">
                        <thead style="text-align: center;">
                            <tr>
                                <th style="width:10px;vertical-align: middle">No.</th>
                                <th>Nama</th>
                                <th style="width:100px;">Honor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($daftarspkbulanberikutnya as $row) : ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i++; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('sispek/datamitra/index/' . $row->id_sobat); ?>" class="text-decoration-none">
                                            <b><?php echo ucwords(strtolower($row->nama_mitra)); ?></b>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-sm view-detail_mitra"
                                            data-spk="<?= htmlspecialchars(json_encode($spk_data2[$row->no_spk] ?? [])); ?>">
                                            <?php echo format_rupiah($row->total_perjanjian); ?>
                                        </button>
                                    </td>
                                </tr>
                                <!-- <td>
                                    <button class="btn btn-info btn-sm view-detail"
                                        data-spk='<?= htmlspecialchars(json_encode($spk_data2[$row->no_spk] ?? []), ENT_QUOTES, 'UTF-8'); ?>'>
                                        <?php echo format_rupiah($row->total_perjanjian); ?>
                                    </button>
                                    <pre><?php echo json_encode($spk_data1[$row->no_spk] ?? [], JSON_PRETTY_PRINT); ?></pre>
                                </td> -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>

</div>
<!-- End of Main Content -->