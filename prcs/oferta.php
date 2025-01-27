<?php
require_once('../config.php');

header("Content-Type: application/json");


if(isset($_POST['op'])){

	$op=$_POST['op'];

}





switch($op){


	case 'crear':

		$link = conexion();


		
		if(isset($_POST['empresa'],$_POST['provincia'],$_POST['area_laboral'],$_POST['titulo'],$_POST['descripcion'],$_POST['descripcionCorta'])){

			$empresa=$_POST['empresa'];
			$area_laboral=$_POST['area_laboral'];
			$provincia=$_POST['provincia'];
            $titulo=$_POST['titulo'];
            $descripcion=$_POST['descripcion'];
            $descripcionCorta=$_POST['descripcionCorta'];
			//campos no obligatorios
			$salarioMin= $_POST['salarioMin'] ? $_POST['salarioMin'] : NULL;
			$salarioMax=$_POST['salarioMax'] ? $_POST['salarioMax'] : NULL;
			$jornada=$_POST['jornada'] ? $_POST['jornada'] : NULL;
			$modalidad=$_POST['modalidad'] ? $_POST['modalidad'] : NULL;
			$contrato=$_POST['contrato'] ? $_POST['contrato'] : NULL;
			$idEmpresa=$_POST['id_empresa'];

			$sql="INSERT INTO ofertas (`empresa`,`area_laboral`,`provincia`,`titulo`,`contrato`,`modalidad`,`jornada`,`salario_min`,`salario_max`,`descripcion`,`descripcion_corta`, `id_empresa`) VALUES ('$empresa','$area_laboral','$provincia','$titulo','$contrato','$modalidad','$jornada','$salarioMin','$salarioMax','$descripcion','$descripcionCorta','$idEmpresa')";

			$resultado=mysqli_query($link,$sql);

			//SI LA CONSULTA ANTERIOR DE CREAR UNA OFERTA ES TRUE, REALIZAMOS UNA CONSULTA UPDATE PARA TOMAR LA CANTIDAD DE OFERTAS PUBLICADAS POR ESTA EMPRESA Y AUMENTARLA EN 1

			if($resultado){

			$id_empresa=$_SESSION['id_empresa'];
			$aumento=$_SESSION['cantidad_ofertas'];
			$aumento++;
			$sql2 = "UPDATE empresas SET cantidad_ofertas = $aumento WHERE id = $id_empresa";

			$resultado2=mysqli_query($link,$sql2);

			}


			$response = [
				"status" => "success",
				"message" => "Oferta creada con exito" 
			];
		
			echo json_encode($response);



		}

		break;



}


?>