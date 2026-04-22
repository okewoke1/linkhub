<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIBUKGAN</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body{
  background-image: url('assets/img/bg1.JPG');
 
  background-repeat: no-repeat;
  background-size: 100% 100%;
        
}
div.p-5 {
  background-image: url('assets/img/bg.jpg');
  background-position: 50% 80%; 
  background-size: 500px 750px;
  background-repeat: no-repeat;
}
</style>
</head>

<body>

    <div class="container"><br><br><br>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                      <h1 class="h4 text-white mb-4"><b>SIBUKGAN<br>
                                      FORM LOGIN</b></h1>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                    </div>
                                    <form method="post" action="<?php echo base_url('login')?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan Email Anda" name="email">
                                                <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Masukkan Password Anda" name="password">
                                                <?php echo form_error('password', '<div class="text-danger small ml-3">','</div>') ?>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                    
                                </div>
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

</body>

</html>