<?php
	if (isset($_POST['submit'])){
		$sabor = $_POST['sabor'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		
		echo '<script language="javascript">alert("Atencion:'.$sabor.'");</script>';
		echo '<script>alert ("precio'.$precio.'respuestas afirmativas");</script>';
		include("conexion.php");
		$con= conectar();

		$checkemail= $con->query("SELECT * FROM empleado WHERE usuario='$sabor'");
		$check_mail=mysqli_num_rows($checkemail);
			
				if($check_mail>0){
					echo ' <script language="javascript">alert("Atencion, ya existe el usuario, Ingrese otro");</script> ';
				}else{		
					$con->query("INSERT INTO emplead(nombre,apellido,dni,direccion,celular,usuario,contrasena) VALUES ('$nombre','$apellido','$dni','$direccion','$celular','$usuario','$codificado')");
					//echo 'Se ha registrado con exito';
					echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
					$con->close();
					echo "<script>location.href='../html/principal.html'</script>";
				}			
			
	}else{
		echo '<script language="javascript">alert("Saliendo de valiar");</script>';
		echo "<script>location.href='../html/principal.html'</script>";
	}

?>

