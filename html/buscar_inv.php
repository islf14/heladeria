<!DOCTYPE html>
<?php
	include('../php/conexion.php');
	$conexion=conectar();
	//$where=" where 1";
	$where="";
	$sabor="";	
	////////////////////// BOTON BUSCAR //////////////////////////////////////
	if (isset($_POST['buscar']))
	{
		$sabor=$_POST['sabor'];
		if($sabor!="")
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia♪</title>
    <link rel="stylesheet" href="../css/fontello.css">
	<link rel="stylesheet" href="../css/estilo_principal.css">
	<link rel="stylesheet" href="../css/menu_visualizar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/est_bus.css">
	<link rel="stylesheet" href="../css/estilo_bus_inv.css" >
	<!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.icon">        
</head>
<body>
    <header>
		<?php
            include("header_visualizar.php");
        ?>
	</header>
    <!--main-->
    <div class="main">
        <div class="contenedor">
			<div class="formulario">
				<form method="post">
					<input type="text" placeholder="Escriba el sabor" name="sabor"/>
					<button name="buscar" type="submit" class="btn-enviar">Buscar</button>
				</form>
				<!--<h3>Comensal</h3>-->
				<div class="mensaje">
					<?php
						//$reg = $resAlumnos->fetch_array(MYSQLI_BOTH);
						//$tarj=$reg['alumno_tarjeta'];
						$sab=$sabor;
						echo "Sabor: ".$sab;
					?>
				</div>

				<table class="table">
					<tr class="table_title">					
						<th>Codigo</th>
						<th>Sabor</th>
						<th>Cantidad</th>						
					</tr>				
					<br><br>
					<?php
						while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
						{
							echo'<tr class="table_row">						
								<td>'.$registroAlumnos['cod_inv'].'</td>
								<td>'.$registroAlumnos['sabor'].'</td>
								<td>'.$registroAlumnos['cantidad'].'</td>						
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
