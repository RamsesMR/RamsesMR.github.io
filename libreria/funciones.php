<?php 
function conexion()
{
	$link = mysqli_connect(SERVIDOR, USUARIO, PASSWORD);
	mysqli_select_db($link, BASE_DATOS);
	mysqli_set_charset($link, 'utf8');

	return $link;
}


function incluye($modulo)
{
	if (file_exists('mod/' . $modulo . '.php')) {
		include_once('mod/' . $modulo . '.php');
	} else {
		include_once('mod/404.php');
	}
}

function pass($cadena)
{
	$pass = hash("SHA256", trim($cadena));
	return $pass;
}

function has($cadena)
{
	$has = hash('sha1', trim($cadena));
	return $has;
}

function limpiarCadena($str)
{
	$link = conexion();

	$str = mysqli_real_escape_string($link, trim($str));
	return $str;

	mysqli_close($link);
}


function userMod($id)
{
	$link = conexion();
	$sql = "SELECT * FROM usuarios WHERE id = '" . $id . "' ";
	$result = mysqli_query($link, $sql);
	if ($result) {
		$row = mysqli_fetch_assoc($result);

		return $row['nombre'];
	}

	mysqli_close($link);
}

function fechaExcel($fecha)
{
	$tfecha = explode("-", $fecha);
	$nfecha = $tfecha[2] . '/' . $tfecha[1] . '/' . substr($tfecha[0], 2);
	return $nfecha;
}

function fecha($fecha)
{
	$tfecha = explode("-", $fecha);
	$nfecha = $tfecha[2] . ' / ' . mes($tfecha[1]) . ' / ' . $tfecha[0];
	return $nfecha;
}

function fechaTime($datetime)
{
	$fechaTime = explode(" ", $datetime);
	$tfecha = explode("-", $fechaTime[0]);
	$nfecha = $tfecha[2] . ' / ' . mes($tfecha[1]) . ' / ' . $tfecha[0];
	return $nfecha . ' ' . $fechaTime[1];
}

function mes($numero)
{

	$_SESSION['lang'] = 'es';

	switch ($numero) {
		case "01":
			$mes = ($_SESSION['lang'] == 'es') ? "Enero" : "January";
			break;
		case "02":
			$mes = ($_SESSION['lang'] == 'es') ? "Febrero" : "February";
			break;
		case "03":
			$mes = ($_SESSION['lang'] == 'es') ? "Marzo" : "March";
			break;
		case "04":
			$mes = ($_SESSION['lang'] == 'es') ? "Abril" : "April";
			break;
		case "05":
			$mes = ($_SESSION['lang'] == 'es') ? "Mayo" : "May";
			break;
		case "06":
			$mes = ($_SESSION['lang'] == 'es') ? "Junio" : "June";
			break;
		case "07":
			$mes = ($_SESSION['lang'] == 'es') ? "Julio" : "July";
			break;
		case "08":
			$mes = ($_SESSION['lang'] == 'es') ? "Agosto" : "August";
			break;
		case "09":
			$mes = ($_SESSION['lang'] == 'es') ? "Septiembre" : "September";
			break;
		case "10":
			$mes = ($_SESSION['lang'] == 'es') ? "Octubre" : "October";
			break;
		case "11":
			$mes = ($_SESSION['lang'] == 'es') ? "Noviembre" : "November";
			break;
		case "12":
			$mes = ($_SESSION['lang'] == 'es') ? "Diciembre" : "December";
			break;
	}
	return $mes;
}

?>