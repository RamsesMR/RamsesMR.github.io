<?php
if (isset($_GET['m']) && isset($_GET['op'])) {

    $op = $_GET['op'];
}
$idEmpresa=$_SESSION['id_empresa'];





switch ($op) {
    case 'listar':
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
                    <li class="breadcrumb-item"><a href="<?= URL_RAIZ; ?>">inicio</a></li>
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

        case 'listar':

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

<div class="alert alert-info shadow-sm p-4 rounded mb-4" role="alert">
    <h1 class="h3 mb-3">Instrucciones para llenar el formulario</h1>
    <ul>
        <li><strong>Campos obligatorios:</strong> 
            <ul>
                <li><strong>Comunidad Autónoma:</strong> Selecciona la comunidad donde se realizará la oferta.</li>
                <li><strong>Título oferta:</strong> Define un título breve pero claro que describa el puesto.</li>
                <li><strong>Área laboral:</strong> Especifica el área a la que corresponde el puesto.</li>
                <li><strong>Provincia:</strong> Si seleccionas una Comunidad Autónoma, podrás especificar una provincia.</li>
                <li><strong>Descripción:</strong> Detalla las responsabilidades y requisitos del puesto.</li>
                <li><strong>Descripción corta:</strong> Incluye un resumen breve y llamativo para destacar tu oferta.</li>
            </ul>
        </li>
        <li><strong>Campos opcionales:</strong> 
            <ul>
                
                <li><strong>Rango salarial:</strong> Aunque no es obligatorio, incluir un rango salarial puede aumentar el interés en tu oferta.</li>
                <li><strong>Jornada laboral:</strong> Indica si es jornada completa o media jornada.</li>
                <li><strong>Tipo de contrato:</strong> Selecciona el tipo de contrato ofrecido (temporal o indefinido).</li>
                <li><strong>Modalidad:</strong> Define si el trabajo será presencial, remoto o híbrido.</li>
            </ul>
        </li>
    </ul>
    <p>
        Recuerda que mientras más información proporciones, más atractiva será tu oferta para los candidatos. ¡Completa el formulario cuidadosamente y publica tu oferta de forma efectiva!
    </p>
</div>


<div class="alert alert-warning shadow-sm p-4 rounded mb-4" role="alert">
    <h1 class="h3 mb-3">¿Qué sucede después de publicar una oferta?</h1>
    <p class="mb-2">
        Todas las ofertas de trabajo que publiques tendrán un tiempo de visibilidad de un mes de forma automática. 
        Una vez transcurrido este periodo, la oferta se desactivará y dejará de aparecer para los usuarios que buscan empleo. 
        Esto ayuda a mantener la plataforma actualizada y libre de ofertas en desuso o caducadas.
    </p>
    <p>
        Si necesitas extender el tiempo de publicación, podrás hacerlo fácilmente desde la sección <strong>Gestionar mis ofertas -> Editar Publicación</strong> después de haber creado tu oferta.
    </p>
</div>



            <fieldset>
                <legend>Datos Oferta</legend>
                <form id="formulario-oferta" class="from" onsubmit="enviarFormularioOferta(event,this)">

                    <input type="hidden" name="op" value="crear">
                    <input type="hidden" name="id_empresa" value="<?= $idEmpresa ?>">

                    <div class="col-12 form-group">
                        <label for="">Empresa</label>
                        <input class="form-control" value="<?=$_SESSION['nombre_empresa']?>" type="text" name="empresa" id="empresa" placeholder="Ingrese nombre de empresa" readonly>
                    </div>

                    <div class="col-12 form-group">
                        <label for="especialidad">Comunidad Autónoma</label>
                        <select class="form-control" name="comunidad_autonoma" id="comunidad_autonoma" oninput="daleValorInputComunidadesProvincias()" required>
                            <?php echo dameComunidadAutonoma(); ?>
                        </select>
                    </div>


                    <div class="col-12  form-group" id="div-provincia" style="display: none;">
                        <label for="especialidad">Provincia</label>
                        <select class="form-control" name="provincia" id="provincia" required>

                        </select>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Titulo oferta</label>
                        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="ingrese el titulo de la empresa" required>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Area laboral</label>
                        <input class="form-control" type="text" name="area_laboral" id="area_laboral" placeholder="ingrese el area laboral a la que va referida el cv" required>
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
                        <textarea class="form-control" type="text" name="descripcion" id="descripcion" placeholder="ingrese la descripción de la oferta" required></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <label for="">Descripción Corta</label>
                        <textarea class="form-control" type="text" name="descripcionCorta" id="descripcionCorta" placeholder="ingrese la descripción corta" required></textarea>
                    </div>

                    <div class="col-12 form-group">
                        <button class="btn btn-success" type="submit">Crear oferta</button>
                    </div>


                </form>
            </fieldset>


    <?php
            break;

            case 'gestion':

                $totalOfertasActivas = contarOfertas($idEmpresa,1);
                $ofertMaxPorPagina = 9;
                $totalPaginas = ceil($totalOfertasActivas / $ofertMaxPorPagina);
                $paginaActual = isset($_GET['pagina1']) ? (int)$_GET['pagina1'] : 1;
                $offset = ($paginaActual - 1) * $ofertMaxPorPagina;

                $misOfertas = dameMisOfertasActivas($idEmpresa,1,$ofertMaxPorPagina, $offset);
            ?>
            
            <!-- Alerta Informativa -->
            <div class="alert alert-warning shadow-sm p-4 rounded mb-4" role="alert">
                <h1 class="h3  mb-3">¿Por qué las ofertas se desactivan automáticamente?</h1>
                <p class="mb-2">
                    Cuando una empresa publica una oferta de trabajo, esta permanecerá activa por un mes de forma automática. 
                    Pasado este tiempo, la oferta se desactivará y dejará de ser visible para los usuarios que buscan empleo. 
                    Esto nos ayuda a evitar que ofertas en desuso o caducadas sigan apareciendo y confundan a los usuarios.
                </p>
                <p>
                    Si deseas extender el tiempo de publicación, podrás hacerlo fácilmente desde la sección <strong>Editar Publicación</strong>.
                </p>
            </div>
            
            <!-- Título de Sección -->
            <h3 class="text-center text-dark mb-4">Publicaciones Activas</h3>
            
            <!-- Tarjetas de Ofertas -->
            <div class="row g-4">
                <?php foreach ($misOfertas as $row): ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-info text-white">
                                <h5 class="card-title mb-0"><?= htmlspecialchars($row['titulo']) ?></h5>
                            </div>
                            <div class="card-body">
                                <p><strong>Área Laboral:</strong> <?= htmlspecialchars($row['area_laboral']) ?></p>
                                <p><strong>Provincia:</strong> <?= dameDato("provincias", "nombre", $row['provincia']) ?>, España</p>
                                <p><strong>Fecha de Alta:</strong> <?= htmlspecialchars(fecha(date( "Y-m-d",strtotime($row['fecha_alta'])))) ?></p>
                                <p>
                                    <strong>Estado:</strong> 
                                    <?= $row['activo'] == 1 
                                        ? "<span class='badge bg-success'>Activa</span>" 
                                        : "<span class='badge bg-danger'>Desactivada</span>" 
                                    ?>
                                </p>
                                <p><strong>Candidatos:</strong> 
                                    <?= $row['cantidad_cv'] > 0
                                        ? htmlspecialchars($row['cantidad_cv'])
                                        : "<span class='badge bg-warning'>Sin candidatos</span>" 
                                    ?>
                                </p>
                            </div>
                            <div class="card-footer bg-light text-end">
                                <a href="detalleOferta.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Ver Oferta</a>
                                <a href="editarOferta.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ($totalPaginas > 1): ?>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($paginaActual > 1): ?>
                                <li class="page-item">
                                    <!-- Añadimos los parámetros de los filtros a la URL -->
                                    <a class="page-link" href="?m=oferta&op=gestion&pagina1=<?php echo $paginaActual - 1; ?>">Anterior</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                                <li class="page-item <?php echo $i == $paginaActual ? 'active' : ''; ?>">
                                    <!-- Añadimos los parámetros de los filtros a la URL -->
                                    <a class="page-link" href="?m=oferta&op=gestion&pagina1=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($paginaActual < $totalPaginas): ?>
                                <li class="page-item">
                                    <!-- Añadimos los parámetros de los filtros a la URL -->
                                    <a class="page-link" href="?m=oferta&op=gestion&pagina1=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            
            <?php
                break;
    }
