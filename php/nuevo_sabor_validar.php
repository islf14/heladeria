<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sabor = $_POST['sabor'];//validacion de carta
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];		
		//echo '<script language="javascript">alert("Atencion:'.$sabor.'");</script>';
		include("conexion.php");
		$con= conectar();
		$res= $con->query("SELECT * FROM carta WHERE nombre_carta='$sabor'");		
		$check_res=mysqli_num_rows($res);
		//echo '<script language="javascript">alert("ya existentes: '.$check_res.'");</script>';
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: Ya existe sabor, ingrese otro");</script> ';
				echo "<script>location.href='../html/nuevo_sabor.php'</script>";
			}else{
				try{
					$rr = $con->query("INSERT INTO carta(nombre_carta,precio,cantidad) VALUES ('$sabor','$precio','$cantidad')");
					//echo '<script language="javascript">alert("inseta: '.$rr.'");</script>';
					if($rr==1){
						echo ' <script language="javascript">alert("Registro exitoso");</script> ';
					}else{
						echo ' <script language="javascript">alert("Error registrando");</script> ';
					}						
					$con->close();
					echo "<script>location.href='../html/nuevo_sabor.php'</script>";

				}catch(Exception $e){
					echo ' <script language="javascript">alert("Error!! :(");</script> ';
				}
			}
	}else{
		//echo '<script language="javascript">alert("Saliendo de valiar");</script>';
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>

