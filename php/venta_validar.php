<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$codigo = $_POST['codigo'];//validacion generado
		$empleado = $_POST['empleado'];
		$cod_carta = $_POST['cod_carta'];
		$cliente = $_POST['cliente'];
		$cantidad=$_POST['cantidad'];
        $fecha = $_POST['fecha'];  
		$igv=$_POST['igv'];
		
		echo '<script language="javascript">alert("codigo: '.$codigo.'; empleado : '.$empleado.'; cod carta : '.$cod_carta.'; cliente : '.$cliente.';  cantidad :'.$cantidad.'");</script> ';

		include("conexion.php");
		$con= conectar();
		$cons_cant = $con->query("SELECT precio FROM carta WHERE cod_carta=$cod_carta");
		$row = mysqli_fetch_array($cons_cant);
		$precio_carta=$row[0];
		$total = $cantidad * $precio_carta;
		$m_igv = $total * $igv;
		$subtotal = $total - $m_igv;
		echo '<script language="javascript">alert("Subtotal: '.$subtotal.'; Monto Igv: '.$m_igv.'; Total Neto:'.$total.'");</script> ';
		$res= $con->query("SELECT * FROM venta WHERE cod_venta='$codigo'");		
		$check_res=mysqli_num_rows($res);
			if($check_res>0){
				echo ' <script language="javascript">alert("Atención: ERROR, ya existe ese registro");</script> ';
				echo "<script>location.href='../html/venta.php'</script>";
			}else{
                $rr = $con->query("INSERT INTO venta(cod_venta, empleado_cod_emp, carta_cod_cart, cliente_cod_cli, cantidad, fecha_venta, subtotal, igv, total) 
											VALUES (NULL, '$empleado', '$cod_carta', '$cliente', '$cantidad', '$fecha', '$subtotal', '$igv', '$total');");
                if($rr==1){
                    echo ' <script language="javascript">alert("Registro exitoso");</script> ';
                }else{
                    echo ' <script language="javascript">alert("Error registrando");</script> ';
                }						
                $con->close();
                echo "<script>location.href='../html/venta.php'</script>";		
			}
	}else{
		echo "<script>location.href='../html/principal.html'</script>";
	}
?>
