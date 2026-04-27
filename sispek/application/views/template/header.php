<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISPEK</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/toastr/toastr.min.css">
    
    
<style>
.dt-buttons {
    margin-bottom: 10px; /* Jarak di bawah tombol */
}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-left: 20px; /* Jarak di antara elemen */
}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label {
    white-space: nowrap; /* Mencegah pemisahan label */
}
</style>
<style>
/* Styling slider tanpa bulatan, dengan bar berwarna terisi */
input[type=range] {
  -webkit-appearance: none;
  width: 100%;
  background: linear-gradient(to right, #007bff 50%, #e0e0e0 50%);
  height: 8px;
  border-radius: 4px;
  outline: none;
  transition: background 0.3s;
  cursor: pointer;
}

/* Update background fill on input */
input[type=range]::-webkit-slider-runnable-track {
  height: 8px;
  border-radius: 4px;
}

/* Hilangkan bulatan pada Chrome, Safari, Edge */
input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 0;
  height: 0;
  background: transparent;
  cursor: pointer;
  margin-top: 0;
  box-shadow: none;
}

/* Hilangkan bulatan pada Firefox */
input[type=range]::-moz-range-thumb {
  width: 0;
  height: 0;
  background: transparent;
  cursor: pointer;
  box-shadow: none;
}
</style>




 

</head>