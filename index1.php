<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Barbarita</title>
</head>

<body>



    <div class="mi-carta">
        <fieldset class="fieldset-container">
            <legend class="legend-title">Barbarita</legend>
            <div class="centrado" style="flex-direction: column; padding: 20px;">

                <video width="200" height="200" controls>
                    <source src="src/VID-20241219-WA0003.mp4" type="video/mp4"> <!-- Ruta al archivo de video -->
                    Tu navegador no soporta la reproducción de video.
                </video>

                <h5>Primera vez que le hago esto a alguien, ni se me hubiera ocurrido</h5>

                <!-- Rango de valoración -->
                <div class="centrado" style="flex-direction: column;">
                    <span id="numero"></span> <!-- Por defecto, puede ser el valor inicial del rango -->
                    <label style="color:black;" for="customRange1" class="form-label">
                        ¿Te gustó el detalle? Del 1 al 100, ¿cuánto me das?
                    </label>
                    <input type="range" class="form-range" id="customRange1" name="gusto" min="1" max="100" value="50" />
                </div>

                <!-- Botones -->
                <div class="centrado" style="gap: 10px;">
                    <form action="pure-css-simple-pattern/dist/index.php?f=si">
                        <button type="submit" class="btn btn-outline-success">Bueno esta bien, llamame</button>
                    </form>
                    <form action="pure-css-simple-pattern2/dist/index.php?f=no">
                        <button type="submit" class="btn btn-outline-danger">Ni se te ocurra</button>
                    </form>
                </div>

            </div>
        </fieldset>
    </div>






    <a href="pure-css-simple-pattern/dist/index.html">si</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>

</html>