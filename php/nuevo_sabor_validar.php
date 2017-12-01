<?php
	if (isset($_POST['submit'])){
	$nombre = $_POST['sabor'];
	$apellido = $_POST['precio'];
	$dni = $_POST['cantidad'];
	}
	echo '<script language="javascript">alert("Atencion, $nombre");</script>';
	include("conexion.php");
	$codificado= base64_encode($contrasena);
	$con= conectar();
	$checkemail= $con->query("SELECT * FROM empleado WHERE usuario='$usuario'");
	$check_mail=mysqli_num_rows($checkemail);
		
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
			}else{		
				$con->query("INSERT INTO empleado(nombre,apellido,dni,direccion,celular,usuario,contrasena) VALUES ('$nombre','$apellido','$dni','$direccion','$celular','$usuario','$codificado')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				$con->close();
				echo "<script>location.href='../html/principal.html'</script>";
			}			
		


?>

