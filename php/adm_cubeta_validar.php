<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$codigo = $_POST['codigo'];//validacion de adm cubeta
		$empleado = $_POST['empleado'];
        $cod_inv = $_POST['cod_inv'];
        //$fecha = $_POST['fecha'];  
		$cantidad=$_POST['cantidad'];
		$val_radio=$_POST['radio1'];
		///////////obteniendo fecha del sistema
		date_default_timezone_set("America/Lima");	
		$fecha = date("Y-m-d H:i:s");
		//////////////////
		$ingreso = 0;
		$salida = 0;
		if($val_radio==1)
			$ingreso = $cantidad;
		if($val_radio==2)
			$salida = $cantidad;//resta
		include("conexion.php");
		$con= conectar();
		//se consulta a la bd con la intension de saber si es posible la resta
		$cons_cant = $con->query("SELECT cantidad FROM inventario_cubeta WHERE cod_inv=$cod_inv");
		$row = mysqli_fetch_array($cons_cant);
		$cant_bd=$row[0];
		//echo '<script language="javascript">alert("cantida bd: '.$cant_bd.'");</script> ';
		if ($val_radio==2 && $cantidad > $cant_bd){
			echo '<script language="javascript">alert("ERROR: No se puede realizar operación, insuficientes recursos");</script> ';
			$con->close();
			echo "<script>location.href='../html/adm_cubeta.php'</script>";
		}
		else{
			$res= $con->query("SELECT * FROM ingreso_cubeta WHERE cod_ing_cubeta='$codigo'");		
			$check_res=mysqli_num_rows($res);
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: ERROR, ya existe ese registro");</script> ';
				echo "<script>location.href='../html/adm_cubeta.php'</script>";
			}else{
				$rr = $con->query("INSERT INTO ingreso_cubeta(cod_ing_cubeta,empleado_cod_emp,inventario_cod_inv,fecha,cantidad_ingreso,cantidad_salida)
																	VALUES ('$codigo','$empleado','$cod_inv','$fecha','$ingreso','$salida')");
				if($rr==1){
					if($val_radio==1)
					$new_cant = $cant_bd + $ingreso;
					if($val_radio==2)
					$new_cant = $cant_bd - $salida;
					$upd = $con->query("UPDATE inventario_cubeta SET cantidad = '$new_cant' WHERE cod_inv = $cod_inv");
					if($upd==1 && $rr==1)
						echo '<script language="javascript">alert("Felicidades: Registro y actualización exitosa");</script> ';
					else
						echo '<script language="javascript">alert("ERROR actualizando");</script> ';	
				}else{
					echo ' <script language="javascript">alert("ERROR registrando");</script> ';
				}						
				$con->close();
				echo "<script>location.href='../html/adm_cubeta.php'</script>";
			}
		}
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>