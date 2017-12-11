<!DOCTYPE html>
<?php
	include('../php/conexion.php');
	$conexion=conectar();
	$where="";
	$sabor="";	
	////////////////////// BOTON BUSCAR //////////////////////////////////////
	if (isset($_POST['buscar']))
	{
		$sabor=$_POST['sabor'];
		if($sabor!="")
		$where=" WHERE e.nombre like '%$sabor%' or e.apellido like '%$sabor%'";		
	}
	/////////////////////// CONSULTA A LA BASE DE DATOS /////////////////////////
	$consulta="SELECT v.cod_venta, concat(e.nombre,' ',e.apellido) as empleado,c.nombre_carta, concat(ct.nombre,' ',ct.apellido) as cliente, v.cantidad,v.fecha_venta,v.subtotal,v.igv,v.total
    FROM venta v INNER JOIN carta c
    ON v.carta_cod_cart=c.cod_carta INNER JOIN empleado e
    ON v.empleado_cod_emp=e.cod_emp INNER JOIN cliente ct ON v.cliente_cod_cli=ct.cod_cli $where ORDER BY 1";
	$resConsulta=$conexion->query($consulta);
	//$usuarios=$conexion->query("SELECT *  FROM v_asis where alumno_tarjeta='$numero' and fecha BETWEEN '$fecha1' AND '$fecha2'");
	if(mysqli_num_rows($resConsulta)==0)
	{
		$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
	}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia ♪ - Ventas</title>
    <link rel="stylesheet" href="../css/fontello.css">
	<link rel="stylesheet" href="../css/estilo_principal.css">
	<link rel="stylesheet" href="../css/menu_visualizar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/est_bus.css">
	<link rel="stylesheet" href="../css/main_visualizar.css" >
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.icon">        
</head>
<body>
    <header>
		<?php
			//include("header_visualizar.php");
		?>
		<div class="contenedor">
			<h1 class="icon-guidedo"><a class="aaa" href="../index.html"><img src="../img/helado-icon.png" alt="" width="30px"></a><a class="aaa" href="principal.html"> Venecia</a></h1>
			&nbsp;
			<a class="adm" href="principal.html">'Administrador'</a>
			<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
			<nav class="menu">
				<a class="dir" href="visualizar.php" onclick="activa()">Inicio</a>
				<a class="dir" href="vi_clientes.php" onclick="activa()">Clientes</a>
				<a class="dir" href="vi_carta.php" onclick="activa()">Carta</a>
				<a class="dir" href="vi_inventario.php" onclick="activa()">Cubetas</a>
				<a class="dir" href="vi_adm_carta.php" onclick="activa()">Adm. Carta</a>
				<a class="dir" href="vi_adm_cubeta.php" onclick="activa()">Adm. Cubeta</a>
				<a class="sel" href="vi_ventas.php" onclick="activa()">Ventas</a>
				<a class="dir" href="vi_empleados.php" onclick="activa()">Usuarios</a>
				<a class="dir" href="principal.html" onclick="activa()">Regresar</a>
				<a class="dir" href="../index.html" onclick="activa()">Cerrar Sesión</a>
			</nav>
		</div>
	</header>
    <!--main-->
    <div class="main">
        <div class="contenedor">
			<div class="formulario">
				<h3 class="titulo">Ventas Registradas</h3>
				<form method="post">
					<input type="text" placeholder="Nombre de empleado" name="sabor"/>
					<button name="buscar" type="submit" class="btn-enviar">Buscar</button>
				</form>
				<div class="mensaje">
					<?php
						$sab=$sabor;
						echo "Búsqueda: ".$sab;
					?>
				</div>
				<table class="table">
					<tr class="table_title">					
						<th>Codigo</th>
						<th>Empleado</th>
                        <th>Carta</th>
                        <th>Cliente</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Subtotal</th>
                        <th>IGV</th>
                        <th>Total</th>
					</tr>
					<br><br>
					<?php
						while ($ConsultaArray = $resConsulta->fetch_array(MYSQLI_BOTH))
						{
							echo'<tr class="table_row">						
								<td>'.$ConsultaArray['0'].'</td>
								<td>'.$ConsultaArray['1'].'</td>
                                <td>'.$ConsultaArray['2'].'</td>
                                <td>'.$ConsultaArray['3'].'</td>
                                <td>'.$ConsultaArray['4'].'</td>
                                <td>'.$ConsultaArray['5'].'</td>
                                <td>'.$ConsultaArray['6'].'</td>
                                <td>'.$ConsultaArray['7'].'</td>
                                <td>'.$ConsultaArray['8'].'</td>
								</tr>';
						}
					?>
				</table>				
			</div>
		</div>
    </div>
    <!--fin main-->

    <footer>
        <div class="contenedor">
            <p class="copy">Venecia &copy; 2017</p>
            <div class="sociales">
                <a class="icon-facebook-squared" href="#"></a>
                <a class="icon-twitter-squared" href="#"></a>
                <a class="icon-instagram" href="#"></a>
                <a class="icon-gplus-squared" href="#"></a>
            </div>

        </div>
    </footer>

</body>
</html>
