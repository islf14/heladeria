<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia ♪ Sabor</title>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilo_principal.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/main_principal.css">    
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.icon">  
    <?php include("../php/conexion.php");
	$con= conectar();?>	      
</head>
<body>

    <header>
        <div class="contenedor">
        <h1 class="icon-guidedo"><a class="aaa" href="../index.html"><img src="../img/helado-icon.png" alt="" width="30px"></a><a class="aaa" href="principal.html"> Venecia</a></h1>
        &nbsp;
        <a class="adm" href="principal.html">'Administrador'</a>
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
                <a class="dir" href="principal.html" onclick="activa()">Inicio</a>
                <a class="dir" href="venta.html" onclick="activa()">Venta</a>
                <a class="dir" href="adm_cubeta.html" onclick="activa()">Adm. Cubeta</a>
                <a class="dir" href="ingreso_envase.html" onclick="activa()">Ingr. Envases</a>
                <a class="dir" href="registro_cubeta.html" onclick="activa()">Nueva Cubeta</a>
                <a class="sel" href="nuevo_sabor.php" onclick="activa()">Nv. Sabor</a>
                <a class="dir" href="buscar_inv.php" onclick="activa()">bsc</a>
                <a class="dir" href="nuevo_cliente.php" onclick="activa()">Cliente</a>
                <a class="dir" href="registro_empleado.html" onclick="activa()">Empleado</a>
                <a class="dir" href="../index.html" onclick="activa()">Cerrar Sesión</a>
            </nav>
        </div>
    </header>

    <?php    
    $query = $con->query("SELECT IFNULL(MAX(CAST(cod_carta AS UNSIGNED)), 0)+1 codigoExterno FROM carta");
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $postID = $row["codigoExterno"];
        //echo "<script>alert('Código: $postID')</script>"; 					
    }}
    ?>
    <!--main-->
    <div class="main">
        <div class="Caja">
                <div class="login">
                    <form action="../php/nuevo_sabor_validar.php" method="POST">
                        <div class="box">
                            <h2>Nuevo Sabor - Carta</h2>
                            <label for="cod_carta">Código:</label>
                            <input type="number" id="cod_carta" readonly value="<?php echo $postID;?>" placeholder="Código Carta">                            
                            <label for="sabor">Sabor:</label>
                            <input type="text" id="sabor" name="sabor" required placeholder="Sabor de helado"> 
                            <label for="precio">Precio:</label>
                            <input type="number" id="precio" name="precio" required placeholder="Precio">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" required value="0" placeholder="Cantidad">
                            <input type="submit" name="">             
                        </div>
                    </form>
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
