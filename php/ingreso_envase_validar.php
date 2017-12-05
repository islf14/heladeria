<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$codigo = $_POST['codigo'];//validacion de cliente
		$empleado = $_POST['empleado'];
        $cod_carta = $_POST['cod_carta'];
		$cantidad = $_POST['cantidad'];
		echo '<script language="javascript">alert("empleado: '.$empleado.', cod_carta: '.$cod_carta.'");</script> ';
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
                    echo ' <script language="javascript">alert("Registro exitoso");</script> ';
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
