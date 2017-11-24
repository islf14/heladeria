<?php
	if (isset($_POST['submit'])){
	$sabor = $_POST['sabor'];
	$cantidad = $_POST['cantidad'];
	//$codigo = $_POST['codigo'];
	}

	include("conexion.php");
		$con= conectar();	
	$checkemail= $con->query("SELECT * FROM inventario_cubeta WHERE sabor='$sabor'");
	$check_mail=mysqli_num_rows($checkemail);
		
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el sabor, Ingrese otro");</script> ';
			}else{		
				$con->query("INSERT INTO inventario_cubeta(sabor,cantidad) VALUES ('$sabor','$cantidad')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Registrado con éxito");</script> ';
				$con->close();
				echo "<script>location.href='index.html'</script>";
			}			
		


?>