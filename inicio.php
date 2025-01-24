<?php
require_once('config.php');

if((!$_SESSION['user'] || $_SESSION['user'] == "") && $_GET['m'] == "oferta") {
    header("location:login.php");
    exit;
}

if($_GET['logout'] === "true") {
    session_destroy();
    header("location:login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Portal de empleo</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="recursos/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="recursos/adminlte/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="recursos/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="recursos/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="recursos/sweetalert2/sweetalert2.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="recursos/select2/css/select2.min.css">
    <link rel="stylesheet" href="recursos/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- jQuery UI -->
    <link rel="stylesheet" type="text/css" href="recursos/jquery-ui-1.12.1/jquery-ui.min.css"/>
    <!-- ElFInder -->
    <link rel="stylesheet" href="recursos/elFinder-2.1.55/css/elfinder.min.css">
        <!-- CSS Albertemus -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body class="hold-transition sidebar-mini"> <!-- layout-footer-fixed -->

    <!-- MODAL -->

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>

                <div class="modal-footer justify-content-between"></div>
            </div>
        </div>
    </div>

    <!-- FIN MODAL -->


    <div class="wrapper">
        <?php
        require_once(INC.'navbar.php');
        require_once(INC.'aside.php'); 
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <?php


        if($_GET['m'] && $_GET['m'] != "") {
            incluye($_GET['m']);
        }
        else {
            
            incluye('inicio');    
            
        }

        require(INC.'footer.php');  