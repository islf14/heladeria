<?php	
	$username=$_POST['usuario'];
	$pass=$_POST['contrasena'];

	include("conexion.php");
	$codificado= base64_encode($pass);
	$con= conectar();
	$sql2=$con->query("SELECT * FROM `empleado` WHERE usuario='$username'");
	//echo'<script>alert("despues de la consulta")</script>';
	if($f2=mysqli_fetch_array($sql2))
	{
		if($codificado==$f2[7]){
			//echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';		
			echo "<script>location.href='../html/principal.html'</script>";		
		}
		else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
				echo "<script>location.href='../sesion.html'</script>";
		}
	}
	else{
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		echo "<script>location.href='../sesion.html'</script>";
	}
?>