<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){	
		$codigo = $_POST['codigo'];//validacion generado
		$empleado = $_POST['empleado'];
		$cod_carta = $_POST['cod_carta'];
		$cliente = $_POST['cliente'];
		$cantidad=$_POST['cantidad'];/*cantidad a restar en bd*/
		//$fecha = $_POST['fecha'];
		date_default_timezone_set("America/Lima");	
		$fecha = date("Y-m-d H:i:s");
		$igv=$_POST['igv'];
		//echo '<script language="javascript">alert("codigo: '.$codigo.'empleado : '.$empleado.'; cod carta: '.$cod_carta.'; cliente : '.$cliente.';  cantidad :'.$cantidad.'; fecha : '.$fecha.'");</script> ';
		echo '<script language="javascript">alert("fecha: '.$fecha.'");</script>';
		include("conexion.php");
		$con= conectar();
		//se consulta a la bd con la intension de saber si es posible la resta
		$cons_cant = $con->query("SELECT * FROM carta WHERE cod_carta=$cod_carta");
		$row = mysqli_fetch_array($cons_cant);
		$precio_carta=$row[2];
		$cant_bd=$row[3];
		//echo '<script language="javascript">alert("cantidad en bd: '.$cant_bd.'");</script> ';
		if ($cantidad > $cant_bd){
			echo '<script language="javascript">alert("No se puede realizar operación, insuficientes envases");</script> ';
			$con->close();
			echo "<script>location.href='../html/venta.php'</script>";
		}else{
			//se ejecuta si hay todavia envases
			//echo '<script language="javascript">alert("precio carta: '.$precio_carta.'");</script> ';
			//hallando  los precios para la bd
			$total = $cantidad * $precio_carta;
			$m_igv = $total * ($igv/100);
			$subtotal = $total - $m_igv;
			echo '<script language="javascript">alert("Subtotal: '.$subtotal.';  Monto Igv: '.$m_igv.';  Total Neto:'.$total.'");</script> ';
			$res= $con->query("SELECT * FROM venta WHERE cod_venta='$codigo'");		
			$check_res=mysqli_num_rows($res);
				if($check_res>0){
					echo ' <script language="javascript">alert("Atención: ERROR, ya existe ese registro");</script> ';
					echo "<script>location.href='../html/venta.php'</script>";
				}else{
					$rr = $con->query("INSERT INTO venta(cod_venta, empleado_cod_emp, carta_cod_cart, cliente_cod_cli, cantidad, fecha_venta, subtotal, igv, total) 
												VALUES ('$codigo', '$empleado', '$cod_carta', '$cliente', '$cantidad', '$fecha', '$subtotal', '$m_igv', '$total');");
					if($rr==1){
						//se actualizar en carta disminuyendo por las venta
						$new_cant = $cant_bd - $cantidad;
						$upd = $con->query("UPDATE carta SET cantidad = '$new_cant' WHERE cod_carta = $cod_carta");
						if($upd==1 && $rr==1)
							echo '<script language="javascript">alert("Felicidades: Registro y actualización exitosa");</script> ';
						else
							echo '<script language="javascript">alert("Error actualizando");</script> ';	
	
					}else{
						echo ' <script language="javascript">alert("Error registrando");</script> ';
					}						
					$con->close();
					echo "<script>location.href='../html/venta.php'</script>";		
				}
		}	
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>
