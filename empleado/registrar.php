<?php
	if (isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$celular = $_POST['celular'];
	$direccion = $_POST['direccion'];
	}

	include("conexion.php");
		$con= conectar();	
	$checkemail= $con->query("SELECT * FROM empleado WHERE usuario='$usuario'");
	$check_mail=mysqli_num_rows($checkemail);
		
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
			}else{		
				$con->query("INSERT INTO empleado(nombre,apellido,dni,direccion,celular,usuario,contrasena) VALUES ('$nombre','$apellido','$dni','$direccion','$celular','$usuario','$contrasena')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				$con->close();
				echo "<script>location.href='../index.html'</script>";
			}			
		


?>
