<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Barbarita</title>
</head>

<body>
<style>
        h1 {
            font-family: 'roboto', sans-serif;
            color:black;
            font-weight: 900; /* Estilo negrita fuerte */
            width: 100%;
            margin: 20px auto;
            word-wrap: break-word;
            white-space: pre-wrap;
            line-height: 1.6;
          
            letter-spacing: 2px;
            text-align: center;
        }
    </style>
    <div class="mi-carta">

        <div class="centrado" style="flex-direction: column; padding: 20px;">


            <h1 id="miTexto"></h1>

        </div>

    </div>

    <script>
    let textos = [
        "¡Hola, Barbarita! Eres una bárbara, ¡espero que estés teniendo un buen día!",
        "¡Espero que te guste la sorpresa que te estoy haciendo! Bueno, ya no es sorpresa, ahora es solo un detalle.",
        "¡Todo esto es por una llamada! (:",
        "Ya que no quieres que te llame, seguiré buscando la manera de hacerte cambiar de opinión.",
        "Atiende mi llamada y verás que te gustará hablar un rato conmigo.",
        "No te la des de dura, sé que lo eres, pero te puedes ablandar un poco, ¿sí? ¿Por mí?",
        "Tu carácter no te deja perder una, eres Zapata, pero por mí podrías perder la primera?",
        "¡DIME, TE GUSTARÍA QUE TE LLAME?"
    ];

    let textoIndex = 0;  // Índice para el array de textos
    let totalTextos = textos.length;  // Total de textos en el array
    let i = 0;  // Índice de caracteres de un texto específico

    let completedTextCount = 0;  // Contador para ver si hemos completado todos los textos

    function escribirLetra() {
        if (i < textos[textoIndex].length) {
            document.getElementById("miTexto").innerText += textos[textoIndex].charAt(i);
            i++;
            setTimeout(escribirLetra, 70); // Espera 100ms entre cada letra
        } else {
            setTimeout(borrarTexto, 1000); // Espera 1 segundo antes de comenzar a borrar
        }
    }

    function borrarTexto() {
        let textoActual = document.getElementById("miTexto").innerText;
        if (textoActual.length > 0) {
            document.getElementById("miTexto").innerText = textoActual.slice(0, -1); // Elimina una letra
            setTimeout(borrarTexto, 10); // Elimina una letra cada 50ms
        } else {
            textoIndex++; // Incrementamos el índice de textos
            if (textoIndex < totalTextos) {
                i = 0;  // Reiniciamos el índice de caracteres
                completedTextCount++;
                
                setTimeout(escribirLetra, 500); // Espera 0.5 segundos antes de empezar a escribir el siguiente texto
            } else {
                // Si hemos completado todos los textos, redirigimos
             
                if (completedTextCount === 7) {
                    setTimeout(function() {
                        window.location.href = "index1.php"; // Redirige a index1.php
                    }, 500); // Espera 1 segundo después de que se haya completado todo
                }
            }
        }
    }

    escribirLetra();  // Inicia el proceso de escribir
</script>






</body>

</html>