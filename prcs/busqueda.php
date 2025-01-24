<?php
require_once('../config.php');

header("Content-Type: application/json");

if (isset($_POST['comunidad'])) {
	$comunidad = $_POST['comunidad'];
	$response = [
		"status" => "success",
		"message" => "la variable familia:" . $comunidad,
		"data" => [dameProvincias($comunidad)],
		

	];

	echo json_encode($response);
}

if(isset($_POST['op'])){

	$op=$_POST['op'];

}





switch($op){


	case 'crear':

		$link = conexion();
		
		if(isset($_POST['dni'],$_POST['provincia'],$_POST['area_laboral'], $_POST['descripcion'])){

			$dni=$_POST['dni'];
			$comunidad_autonoma=$_POST['comunidad_autonoma'];
			$area_laboral=$_POST['area_laboral'];
			$provincia=$_POST['provincia'];
			$descripcion=$_POST['descripcion'];

			$sql="INSERT INTO cv (`dni`,`provincia`,`area_laboral`,`nombre_archivo`,`descripcion`) VALUES ('$dni',$provincia,'$area_laboral','un archivo','$descripcion') ";

			$resultado=mysqli_query($link,$sql);


			$response = [
				"status" => "success",
				"message" => "Curriculum cargado con exito" 
			];
		
			echo json_encode($response);



		}

		break;



}


?>