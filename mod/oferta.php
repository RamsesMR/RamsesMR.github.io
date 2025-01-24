<?php
if (isset($_GET['m']) && isset($_GET['op'])) {

    $op = $_GET['op'];
}




switch ($op) {
    case 'ver':
        $titulo = "Ofertar empleo";
        $subTitulo = "Ver Demandas";
        break;

    case 'crear':
        $titulo = "Busqueda de empleado";
        $subTitulo = "Crear Oferta";
        break;

    case 'gestion':
        $titulo = "Ofertar empleo";
        $subTitulo = "Gestión";
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

            //mostratemos los resultados de todos los candidatos

        case 'ver':

            $cv = dameCv();

            foreach ($cv as $row) {
    ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Contenedor para los datos del currículum -->
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white py-3">
                    <h4 class="mb-0">Datos del Currículum</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Área Laboral -->
                    <div class="mb-4">
                        <label for="areaLaboral" class="form-label text-muted fw-semibold">Área Laboral</label>
                        <p id="areaLaboral" class="fs-5 fw-medium text-dark"><?= $row['area_laboral'] ?></p>
                    </div>

                    <!-- Localidad -->
                    <div class="mb-4">
                        <label for="localidad" class="form-label text-muted fw-semibold">Localidad</label>
                        <p id="localidad" class="fs-5 fw-medium text-dark"><?= dameDato("provincias", "nombre", $row['provincia']) ?></p>
                    </div>

                    <!-- Experiencia -->
                    <div class="mb-4">
                        <label for="experiencia" class="form-label text-muted fw-semibold">Experiencia</label>
                        <p id="experiencia" class="fs-5 text-dark"><?= $row['descripcion'] ?></p>
                    </div>

                    <!-- Botón de descarga -->
                    <div class="text-center mt-4">
                        <a href="path/to/curriculum.pdf" download="Curriculum.pdf" class="btn btn-primary btn-lg px-4">
                            Descargar Currículum
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



            <?php
            }
            break;


            // aqui sera un formulario para crear ofertas de empleo
        case 'crear':
            ?>


            <fieldset>
                <legend>Datos Oferta</legend>
                <form id="formulario-oferta" class="from" onsubmit="enviarFormularioOferta(event,this)">

                    <input type="hidden" name="op" value="crear">

                    <div class="col-12 form-group">
                        <label for="">Empresa</label>
                        <input class="form-control" value="<?=$_SESSION['nombre_empresa']?>" type="text" name="empresa" id="empresa" placeholder="Ingrese nombre de empresa" readonly>
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
                        <label for="">Titulo oferta</label>
                        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="ingrese el titulo de la empresa">
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Area laboral</label>
                        <input class="form-control" type="text" name="area_laboral" id="area_laboral" placeholder="ingrese el area laboral a la que va referida el cv">
                    </div>



                    <div class="col-12 form-group">
                        <label for="">Jornada laboral</label>
                        <select class="form-control" type="text" name="jornada" id="jornada">
                            <option value="" selected>Seleccione tipo de jornada</option>
                            <option value="Jornada Completo">Tiempo Completo</option>
                            <option value="Media jornada">Media jornada</option>
                        </select>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Tipo de contrato</label>
                        <select class="form-control" type="text" name="contrato" id="contrato">
                            <option value="" selected>Seleccione tipo de contrato</option>
                            <option value="Temporal">Temporal</option>
                            <option value="Indefinido">Indefinido</option>
                        </select>
                    </div>


                    <div class="col-12 form-group">
                        <label for="">Modalidad</label>
                        <select class="form-control" type="text" name="modalidad" id="modalidad">
                            <option value="" selected>Selecione la modalidad</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Teletrabajo">Teletrabajo</option>
                            <option value="Hibrido">Hibrido</option>
                        </select>
                    </div>


                    <legend style="font-size: 16px;">Rango salarial</legend>
                    <div class="col-12 form-group d-flex" style="border:solid 1px black; margin: 10px; width: auto;">

                        <div class="col-6 form-group">
                            <label for="">Salario Minimo</label>
                            <input class="form-control" type="number" name="salarioMin" id="salarioMin" min="0" placeholder="salario minimo">
                        </div>

                        <div class="col-6 form-group">
                            <label for="">Salario Maximo</label>
                            <input class="form-control" type="number" name="salarioMax" id="salarioMax" min="0" placeholder="salario maximo">
                        </div>
                    </div>


                    <div class="col-12 form-group">
                        <label for="">Descripción</label>
                        <textarea class="form-control" type="text" name="descripcion" id="descripcion" placeholder="ingrese la descripción de la oferta"></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Descripción Corta</label>
                        <textarea class="form-control" type="text" name="descripcionCorta" id="descripcionCorta" placeholder="ingrese la descripción corta"></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <button class="btn btn-success" type="submit">Crear oferta</button>
                    </div>


                </form>
            </fieldset>


    <?php
            break;



            case 'gestion';


            break;
    }
