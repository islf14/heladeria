<!DOCTYPE html>

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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia♪</title>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilo_principal.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/est_bus.css">
    
    <link href="../css/estilo_reg_emp.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.csss">
        
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.icon">        
</head>
<body>

    <header>
        <div class="contenedor">
            <h1 class="icon-guidedo"><a class="aaa" href="../index.html"><img src="../img/helado-icon.png" alt="" width="30px"></a><a class="aaa" href="principal.html">Venecia</a></h1>
            &nbsp;
            <a class="aaa" href="principal.html">'Administrador'</a>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
				<a href="../html/principal.html" onclick="activa()">Inicio</a>
				<a href="../html/venta.html" onclick="activa()">Venta</a>
				<a href="../html/adm_cubeta.html" onclick="activa()">Adm. Cubeta</a>
				<a href="../html/ingreso_envase.html" onclick="activa()">Ingr. Envases</a>
				<a href="../html/registro_cubeta.html" onclick="activa()">Nueva Cubeta</a>
				<a href="../html/nuevo_sabor.html" onclick="activa()">Nv. Sabor</a>
				<a href="../php/buscar_inv.php" onclick="activa()">bsc</a>
				<a href="../html/nuevo_cliente.html" onclick="activa()">Cliente</a>
				<a href="../html/registro_empleado.html" onclick="activa()">Empleado</a>
				<a href="../index.html" onclick="activa()">Cerrar Sesión</a>
            </nav>
        </div>
    </header>

    
    <section class="main">
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

    <!--main-->
    <div class="mainn">
        <div class="Cajaa">
                <div class="loginn">
                   
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
