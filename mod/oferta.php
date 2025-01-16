<?php
if (isset($_GET['m']) && isset($_GET['op'])) {

$op = $_GET['op'];
}




switch ($op) {
    case 'crear':
        $titulo = "Ofertar empleo";
        $subTitulo = "Crear oferta";
        break;

    case 'cv':
        $titulo = "Busqueda de empleo";
        $subTitulo = "Subir curriculum";
        break;


    default:
        header("location:404.php");
        exit;
        break;
}
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $titulo; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= URL_RAIZ; ?>">Home</a></li>
                    <!-- <li class="breadcrumb-item active">Blank Page</li> -->
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">

    <h2 class="text-center"> <?= $subTitulo; ?></h2>

    <?php


    
      
