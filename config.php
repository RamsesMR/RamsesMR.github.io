<?php
// Verificar si la constante __FILE__ es igual al nombre del archivo actual
if (basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
    // Si es el mismo, significa que se está intentando acceder directamente
    header("HTTP/1.0 403 Forbidden");
    echo "Acceso prohibido";
    exit();
}

error_reporting(5);
date_default_timezone_set("Europe/Madrid");

//iniciamos sesion en el servidor si no se ha iniciado.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



// APUNTAMOS AL SERVIDOR DE PRUEBAS
// define('SERVIDOR'  , 'localhost'); //87.106.17.86 //localhost
// define('USUARIO'   , 'Crmpracticasdev'); 
// define('PASSWORD'  , 'pfklZQfbVkEL2OL6'); 
// define('BASE_DATOS', 'crmpracticasdev');

// APUNTAMOS AL SERVIDOR LOCAL
define('SERVIDOR'  , 'localhost'); 
define('USUARIO'   , 'root'); 
define('PASSWORD'  , ''); 
define('BASE_DATOS', 'impactgroup');

//Muestra el ID de la sesion de PHP
//echo  session_id();

//SE DEFINE ABSPATH EN ESTE DIRECTORIO COMO RAIZ
define('ABSPATH' , dirname(__FILE__) . '/');
define('INC' , ABSPATH.'inc/');
define('LIB' , ABSPATH.'libreria/');
define('MOD' , ABSPATH.'mod/');
define('PRCS' , ABSPATH.'prcs/');

// define('DOCUMENTOS_EMPRESAS' , ABSPATH.'documentos-empresas/');
// define('DOCUMENTOS_ALUMNOS' , ABSPATH.'documentos-alumnos/');
// define('DOCUMENTOS_PRACTICAS' , ABSPATH.'documentos-practicas/');
//define('RECURSOS' , ABSPATH.'recursos/');


//REVISAMOS SI ESTAMOS CONECTANO POR HTTP o HTTPS
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) {
    define('PROTOCOLO', 'https://');
}
else {
    define('PROTOCOLO', 'http://');
}
define('NAME_SERVER',$_SERVER["SERVER_NAME"]);

//CAMBIAR ESTO DEPENDIENDO DE LA CARPETA DONDE SE HALLE PANEL DE ADMINISTRACION
define('URL_RAIZ', PROTOCOLO . NAME_SERVER . '/');
define('RECURSOS', URL_RAIZ . 'recursos/');
define('URL_DOCUMENTOS', URL_RAIZ . 'documentos/');

//CAMBIAR ESTO DEPENDIENDO DE LA CARPETA DONDE SE HALLEN LOS RECURSOS DEL PANEL DE ADMINISTRACION
/* define('RECURSOS' , URL_RAIZ.'vistas/recursos/');
define('EVISTAS' , URL_RAIZ.'vistas/'); */

//Recorremos la URL para saber que hay que mostrar.
$trozos = explode('/',$_SERVER["REQUEST_URI"]);
$trozos = array_filter($trozos);
$trozos = array_values($trozos);
$numTrozos = count($trozos);
require_once(LIB.'funciones.php');
