<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$nombre = $_POST['nombre'];//validacion de cliente
		$apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $ruc = $_POST['ruc'];        
		include("conexion.php");
		$con= conectar();
		$res= $con->query("SELECT * FROM cliente WHERE dni='$dni'");		
		$check_res=mysqli_num_rows($res);
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: Ya existe este cliente, no se puede registrar");</script> ';
				echo "<script>location.href='../html/nuevo_cliente.php'</script>";
			}else{
                $rr = $con->query("INSERT INTO cliente(nombre,apellido,dni,ruc) VALUES ('$nombre','$apellido','$dni','$ruc')");
                if($rr==1){
                    echo ' <script language="javascript">alert("Registro exitoso");</script> ';
                }else{
                    echo ' <script language="javascript">alert("Error registrando");</script> ';
                }						
                $con->close();
                echo "<script>location.href='../html/nuevo_cliente.php'</script>";		
			}
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>
