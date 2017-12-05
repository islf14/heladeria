<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heladeria Venecia♪</title>
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/estilo_principal.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/estilo_reg_emp.css">    
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.icon">        
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
                <a class="dir" href="ingreso_envase.php" onclick="activa()">Ingr. Envase</a>
                <a class="dir" href="registro_cubeta.php" onclick="activa()">Nueva Cubeta</a>
                <a class="dir" href="nuevo_sabor.php" onclick="activa()">Nueva Carta</a>
                <a class="dir" href="buscar_inv.php" onclick="activa()">bsc</a>
                <a class="dir" href="nuevo_cliente.php" onclick="activa()">Cliente</a>
                <a class="sel" href="registro_empleado.php" onclick="activa()">Empleado</a>
                <a class="dir" href="../index.html" onclick="activa()">Cerrar Sesión</a>
            </nav>
        </div>
    </header>
    <div class="formulario">
        <form action="../php/registro_empleado_validar.php" method="post" class="form-register" onSubmit="return validar();">
            <h2 class="form_titulo">Datos de nuevo empleado</h2>
            <div class="contenedor_inputs">
                <!--<input type="text" id="codigo" name="codigo" placeholder="Codigo" class="input-100">-->
                <input type="text" id="nombre" name="nombre" class="input-48" placeholder="Nombre">
                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="input-48">
                <input type="text" id="dni" name="dni" placeholder="DNI" class="input-48">
                <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input-48">
                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" class="input-48">
                <input type="text" id="celular" name="celular" placeholder="Celular" class="input-48">
                <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="input-100">                
                <input type="submit"  name="submit" value="Registar" class="btn-enviar">                
            </div>
        </form>
    </div>
	    
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


    <script type="text/javascript" src="../js/validar_reg_emp.js"></script>
</body>
</html>
