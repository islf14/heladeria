<?php
	include('conexion.php');
	$conexion=conectar();
	//$where=" where 1";
	$where="";
	$sabor="";	
	////////////////////// BOTON BUSCAR //////////////////////////////////////
	if (isset($_POST['buscar']))
	{
		$sabor=$_POST['sabor'];
		
		$where="where sabor like '".$sabor."' ";		
	}
	/////////////////////// CONSULTA A LA BASE DE DATOS /////////////////////////
	//$alumnos="SELECT * FROM v_asis $where ";
	$cubeta="SELECT * FROM inventario_cubeta $where ";
	$resAlumnos=$conexion->query($cubeta);
	//$usuarios=$conexion->query("SELECT *  FROM v_asis where alumno_tarjeta='$numero' and fecha BETWEEN '$fecha1' AND '$fecha2'");
	if(mysqli_num_rows($resAlumnos)==0)
	{
		$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
	}
?>
<html lang="es">
	<head>
		<title>INVENTARIO DE CUBETAS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="css/buscar_cub.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Inventario de Productos</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Escriba el sabor" name="sabor"/>
				
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<!--<h3>Comensal</h3>-->
			<?php
				//$reg = $resAlumnos->fetch_array(MYSQLI_BOTH);
				//$tarj=$reg['alumno_tarjeta'];
				$sab=$sabor;
				echo "Sabor: ".$sab;
			?>
			<table class="table">
				<tr class="bg-primary">
				
					<th>Codigo</th>
					<th>Sabor</th>
					<th>Cantidad</th>
					
				</tr>				
				<br><br>
				<?php
					while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
					{
						echo'<tr>						
							<td>'.$registroAlumnos['cod_inv'].'</td>
							<td>'.$registroAlumnos['sabor'].'</td>
							<td>'.$registroAlumnos['cantidad'].'</td>
													 
							</tr>';
					}
				?>
			</table>
			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>