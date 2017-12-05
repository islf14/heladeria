<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$codigo = $_POST['codigo'];//validacion de ingreso de envases
		$empleado = $_POST['empleado'];//codigo de empleado que se cargo desde bd
        $cod_carta = $_POST['cod_carta'];/*se obtiene el cod de carta xD*/
		$cantidad = $_POST['cantidad'];
		//echo '<script language="javascript">alert("empleado: '.$empleado.', cod_carta: '.$cod_carta.'");</script> ';
		include("conexion.php");
		$con= conectar();
		$res= $con->query("SELECT * FROM ingreso_carta WHERE cod_ing_carta='$codigo'");
		$check_res=mysqli_num_rows($res);
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: ERROR, ya existe ese registro");</script> ';
				echo "<script>location.href='../html/ingreso_envase.php'</script>";
			}else{
                $rr = $con->query("INSERT INTO ingreso_carta(empleado_cod_emp,carta_cod_cart,cantidad_ingresa) VALUES ('$empleado','$cod_carta','$cantidad')");
                if($rr==1){
					echo '<script language="javascript">alert("Registro exitoso 1");</script> ';					
					$cant_bd = $con->query("SELECT cantidad FROM carta WHERE cod_carta=$cod_carta");
					echo '<script language="javascript">alert("varlor de cant_bd: '.$cant_bd.'");</script> ';					
					$upd=$con->qury("UPDATE carta SET cantidad = '$cant_bd+$cantidad' WHERE cod_carta = $cod_carta;");
					echo '<script language="javascript">alert("valor upd: '.$upd.'");</script> ';
					if($upd==1){
						echo '<script language="javascript">alert("Registro exitoso 2");</script> ';
					}
                }else{
                    echo ' <script language="javascript">alert("Error registrando");</script> ';
                }
                $con->close();
                echo "<script>location.href='../html/ingreso_envase.php'</script>";		
			}
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>
