<?php
	if (isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$celular = $_POST['celular'];
	$direccion = $_POST['direccion'];
	//echo '<script language="javascript">alert("nombre:'.$nombre.'");</script>';
	}

	include("conexion.php");
	$codificado= base64_encode($contrasena);
	$con= conectar();
	$checkemail= $con->query("SELECT * FROM empleado WHERE usuario='$usuario'");
	$check_mail=mysqli_num_rows($checkemail);
		
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
				echo "<script>location.href='../html/registro_empleado.php'</script>";
			}else{		
				$ree = $con->query("INSERT INTO empleado(nombre,apellido,dni,direccion,celular,usuario,contrasena) VALUES ('$nombre','$apellido','$dni','$direccion','$celular','$usuario','$codificado')");
				//echo 'Se ha registrado con exito';
				if($ree==1)
					echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				else
					echo ' <script language="javascript">alert("Error registrando");</script> ';
				echo "<script>location.href='../html/registro_empleado.php'</script>";
				$con->close();
			}			
		


?>

