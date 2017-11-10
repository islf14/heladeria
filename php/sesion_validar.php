<?php	
	$username=$_POST['usuario'];
	$pass=$_POST['contrasena'];

	include("conexion.php");
	$codificado= base64_encode($username);
	$con= conectar();
	$sql2=$con->query("SELECT * FROM `empleado` WHERE usuario='$username'");
	if($f2=mysqli_fetch_array($sql2))
	{
		if($pass==$f2[5]){
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