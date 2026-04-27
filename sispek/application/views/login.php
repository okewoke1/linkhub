<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISPEK - LOGIN</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="assets/toastr/toastr.min.css">
    <style>
        body {
            background-image: url('assets/img/bgg.jpg');
/*background: linear-gradient(to bottom, #19B2E6,  #3FE0D2);*/
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
        #con{
            /*background-image: url('assets/img/bg3.jpg');*/
             background: linear-gradient(to bottom, rgba(44, 230, 242, 1), rgba(98, 159, 163, 0.8));
            background-repeat: no-repeat;
            background-size: 100% 100%;
            /*background-color: rgba(12, 125, 125, 0.5); */
            /* Warna putih dengan 50% transparansi 
        }
       
        
    </style>
    <style>
        .input-group-text-fixed {
            width: 100px;           /* Sama untuk semua label */
            justify-content: flex-start; /* Biar teks rata kiri */
        }
        
        #modalEdit .modal-dialog {
        margin-top: 100px;  /* Atur sesuai kebutuhan, contoh 100px */
        }
    </style>

</head>

<body>

    <div class="container"><br><br><br>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-2" id="con">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" id="con2">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SISTEM PERJANJIAN KERJA KONTRAK ONLINE</h1>
                                    </div>

                                    <!-- <?php if ($this->session->flashdata('error')) : ?>
                                        <p class="toastrDefaultInfo" style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
                                    <?php endif; ?> -->

                                    <form action="<?php echo site_url('login/auth'); ?>" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text-fixed">NIP BPS</span>
                                                </div>
                                                <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text input-group-text-fixed">Password</span>
                                                </div>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                        </div>

                                    
                                        <div class="form-group form-check">
                                            <input class="form-check-input" type="checkbox" id="customCheck">
                                            <label class="form-check-label" for="customCheck">Remember Me</label>
                                        </div>
                                    
                                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                                    </form>



                                    <div class="loading-spinner" id="loadingSpinner"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/jquery/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- SweetAlert2 -->
        <script src="assets/sweetalert2/sweetalert2.min.js"></script>

        <script src="assets/toastr/toastr.min.js"></script>

        <!-- SweetAlert2  -->
        <!-- <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                });

                <?php if ($this->session->flashdata('success')) : ?>
                    Toast.fire({
                        icon: 'success',
                        title: '<?php echo $this->session->flashdata('success'); ?>'
                    });
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')) : ?>
                    Toast.fire({
                        icon: 'error',
                        title: '<?php echo $this->session->flashdata('error'); ?>'
                    });
                <?php endif; ?>

            });
        </script> -->

        <!-- TOAST  -->
        <script>
            $(function() {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000", // Set timer here (2000ms = 2 seconds)
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                <?php if ($this->session->flashdata('success')) : ?>
                    toastr.success('<?php echo $this->session->flashdata('success'); ?>');
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')) : ?>
                    toastr.error('<?php echo $this->session->flashdata('error'); ?>');
                <?php endif; ?>
            });
        </script>

</body>

</html>