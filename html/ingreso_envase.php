<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia - Envases</title>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilo_principal.css">
    <link rel="stylesheet" href="../css/menu_principal.css">
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
                <a class="dir" href="venta.php" onclick="activa()">Venta</a>
                <a class="dir" href="adm_cubeta.php" onclick="activa()">Adm. Cubeta</a>
                <a class="sel" href="ingreso_envase.php" onclick="activa()">Ingr. Envase</a>
                <a class="dir" href="registro_cubeta.php" onclick="activa()">Nueva Cubeta</a>
                <a class="dir" href="nuevo_sabor.php" onclick="activa()">Nueva Carta</a>
                <a class="dir" href="nuevo_cliente.php" onclick="activa()">Cliente</a>
                <a class="dir" href="registro_empleado.php" onclick="activa()">Empleado</a>
                <a class="dir" href="visualizar.php" onclick="activa()">Visualizar</a>
                <a class="dir" href="../index.html" onclick="activa()">Cerrar Sesión</a>
            </nav>
        </div>
    </header>

    <?php    
    $query = $con->query("SELECT IFNULL(MAX(CAST(cod_ing_carta AS UNSIGNED)), 0)+1 codigoExterno FROM ingreso_carta");
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){ 
            $postID = $row["codigoExterno"];
        //echo "<script>alert('Código: $postID')</script>"; 					
    }}
    ?>
    <!--main-->
    <div class="main">
        <div class="formulario">
            <form action="../php/ingreso_envase_validar.php" method="post">
                <div class="box">
                    <h2>Ingreso de Envases</h2>
                    <label for="codigo">Codigo generado:</label>
                    <input type="number" id="codigo" name="codigo" readonly placeholder="Código generado" value="<?php echo $postID;?>">

                    <label for="empleado">Empleado:</label>
                    <?php
                        $query = 'SELECT * FROM empleado';
                        $result = $con->query($query);
                    ?>
                    <select name="empleado" id="empleado">
                        <option value="0">Seleccione empleado</option>
                        <?php    
                            while ( $row = mysqli_fetch_array($result) )    
                            {
                        ?>
                        <option value="<?php echo $row['cod_emp'] ?> " ><?php echo $row['nombre']." ".$row['apellido']; ?></option>
                        <?php
                            }    
                        ?>        
                    </select>

                    <label for="cod_carta">Carta:</label>
                    <?php
                        $query = 'SELECT * FROM carta';
                        $result = $con->query($query);
                    ?>
                    <select name="cod_carta" id="cod_carta">
                        <option value="0">Seleccione carta</option>
                        <?php    
                            while ( $row = mysqli_fetch_array($result) )    
                            {
                        ?>
                        <option value="<?php echo $row['cod_carta'] ?> " ><?php echo $row['nombre_carta']; ?></option>
                        <?php
                            }    
                        ?>        
                    </select>

                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" value="0" required placeholder="Cantidad"> 
                    <input type="submit">
                </div>
            </form>
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
