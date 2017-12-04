<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$codigo = $_POST['codigo'];//validacion de cliente
		$empleado = $_POST['empleado'];
        $cod_inv = $_POST['cod_inv'];
        $fecha = $_POST['fecha'];  
        $ingreso=$_POST['ingreso'];
        $salida=$_POST['salida'];      
		include("conexion.php");
		$con= conectar();
		$res= $con->query("SELECT * FROM ingreso_cubeta WHERE cod_ing_cubeta='$codigo'");		
		$check_res=mysqli_num_rows($res);
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: ERROR, ya existe ese registro");</script> ';
				echo "<script>location.href='../html/adm_cubeta.php'</script>";
			}else{
                $rr = $con->query("INSERT INTO ingreso_cubeta(empleado_cod_emp,inventario_cod_inv,fecha,cantidad_ingreso,cantidad_salida) VALUES ('$empleado','$cod_inv','$fecha','$ingreso','$salida')");
                if($rr==1){
                    echo ' <script language="javascript">alert("Registro exitoso");</script> ';
                }else{
                    echo ' <script language="javascript">alert("Error registrando");</script> ';
                }						
                $con->close();
                echo "<script>location.href='../html/adm_cubeta.php'</script>";		
			}
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>
