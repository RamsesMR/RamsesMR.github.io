<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- mi css -->
    <link rel="stylesheet" href="css/styleInicio.css">
    <title>Portal del empleo</title>
</head>

<body>

    <div class="contenedor">

        <div class="card" id="busquedaEmpleo">
            <div class="title">
                <h2>Buscar empleo</h2>
            </div>

            <div class="img">
                <img src="img/cv1.avif" alt="Curriculum">
            </div>

            <div class="text">
                <p>Encuentra las mejores ofertas laborales adaptadas a tu perfil y comienza tu búsqueda de empleo hoy mismo.</p>
            </div>
        </div>

        <div class="card" id="ofertaEmpleo">
            <div class="title">
                <h2>Publicar Oferta</h2>
            </div>

            <div class="img">
                <img src="img/cv1.avif" alt="Oferta de empleo">
            </div>

            <div class="text">
                <p>Publica tus vacantes fácilmente y encuentra a los candidatos ideales para tu empresa.</p>
            </div>
        </div>

    </div>

    <!-- Bootstrap (si lo necesitas) -->
    <script src="recursos/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

<script>

    document.getElementById("busquedaEmpleo").addEventListener("click", ()=>{

        window.location.href="inicio.php?m=busqueda&op=ver";

    })

    document.getElementById("ofertaEmpleo").addEventListener("click", ()=>{

        window.location.href="inicio.php?m=oferta&op=crear";

    })

</script>

</html>