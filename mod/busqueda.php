<?php
if (isset($_GET['m']) && isset($_GET['op'])) {

    $op = $_GET['op'];
}




switch ($op) {
    case 'ver':
        $titulo = "Busqueda de Empleo";
        $subTitulo = "Ver Ofertas";
        break;

    case 'cv':
        $titulo = "Busqueda de Empleo";
        $subTitulo = "Subir mi Currículum";
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

    switch ($op) {

        case 'ver':



            $ofertas = dameOfertas();

            foreach ($ofertas as $row) {
    ?>

                <div class="container mt-4">
                    <!-- Contenedor de la oferta -->
                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">

                            <!-- Columna para la información de la oferta -->
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title mb-1" ><?= $row['titulo'] ?> </h5>
                                    <p class="text-muted mb-2"><strong>&nbsp;<?= $row['empresa'] ?>&nbsp;</strong> <?= dameDato("provincias","nombre",$row['provincia']) ?>, España</p>
                                    <p class="card-text mb-2">
                                        <span class="badge bg-warning"><?= $row['contrato'] ?></span>
                                        <span class="badge bg-primary"><?= $row['jornada'] ?></span>
                                        <span class="badge bg-success"><?= $row['modalidad'] ?></span>
                                        <span class="badge bg-info"><?= $row['salario_min'] .' - '. $row['salario_max'] ?> €/año</span>
                                    </p>
                                    <p class="text-muted mb-0">
                                    <?= $row['descripcion_corta'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Footer con botones -->
                        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                            <small class="text-muted">Publicada hace 3 días</small>
                            <div>
                                <a href="#" class="btn btn-primary btn-sm">Aplicar ahora</a>
                                <a href="#" class="btn btn-outline-secondary btn-sm">Guardar</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            break;

        case 'cv':
            ?>



            <div class="d-flex flex-column flex-md-row justify-content-between" style="gap: 5px;">
                <div class="alert alert-info me-2 mb-3 mb-md-0" role="alert" style="flex: 1;">
                    <h1 class="h4 mb-3">¿Por qué te pedimos datos extras?</h1>
                    <p>
                        Además del currículum, te solicitaremos algunos datos adicionales para facilitar el proceso de filtrado y búsqueda por parte de las empresas. Esto nos permitirá ayudarte a conectar más fácilmente con las oportunidades laborales que mejor se ajusten a tu perfil.
                    </p>
                </div>
                <div class="alert alert-warning me-2 mb-3 mb-md-0" role="alert" style="flex: 1;">
                    <h1 class="h4 mb-3">Uso sin registro</h1>
                    <p>
                        No es necesario registrarte para operar en este sitio web. Puedes acceder y utilizar nuestras funciones de forma directa y sencilla, sin necesidad de crear una cuenta.
                    </p>
                </div>
            </div>






            <fieldset>
                <legend >Mis Datos</legend>
                <form id="formulario-cv" class="from" onsubmit="enviarFormularioCv(event,this)">

                    <input type="hidden" name="op" value="crear">

                    <div class="col-12 form-group">
                        <label for="">Dni</label>
                        <input class="form-control" type="text" name="dni" id="dni" placeholder="Ingrese su dni">
                    </div>

                    <div class="col-12 form-group">
                        <label for="especialidad">Comunidad Autónoma</label>
                        <select class="form-control" name="comunidad_autonoma" id="comunidad_autonoma" oninput="daleValorInputComunidadesProvincias()">
                            <?php echo dameComunidadAutonoma(); ?>
                        </select>
                    </div>


                    <div class="col-12  form-group" id="div-provincia" style="display: none;">
                        <label for="especialidad">Provincia</label>
                        <select class="form-control" name="provincia" id="provincia">

                        </select>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Area laboral</label>
                        <input class="form-control" type="text" name="area_laboral" id="area_laboral" placeholder="ingrese el area laboral a la que va referida el cv">
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Descripción</label>
                        <textarea class="form-control" type="text" name="descripcion" id="descripcion" placeholder="Ingrese una presentación al contenido del Curriculum "></textarea>
                    </div>

                  


                    <div class="col-12 form-group">
                        <label for="">CV (pdf, jpg, png)</label>
                        <input class="form-control" type="file" name="cv" id="cv">
                    </div>


                    <div class="col-12 form-group">
                        <button class="btn btn-success" type="submit">Subir currículum</button>
                    </div>


                </form>
            </fieldset>


    <?php
            break;
    }
