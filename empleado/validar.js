function validar(){
	var nombre, apellido, dni, usuario, contrasena, celular, direccion;
	
	nombre = document.getElementById("nombre").value;
	apellido = document.getElementById("apellido").value;
	dni = document.getElementById("dni").value;
	usuario = document.getElementById("usuario").value;
	contrasena =document.getElementById("contrasena").value;
	celular = document.getElementById("celular").value;
	direccion = document.getElementById("direccion").value;
	
	if( nombre === "" || apellido === "" || dni ==="" || usuario ==="" || contrasena ==="" || celular === "" || direccion ==="" ){
		alert ("Todos los campos son obligatorios");
		return false;
	}
	else if(nombre.length>30){
		alert("El nombre es muy largo");
		return false;
	}
	else if (apellido.length>80){
		alert("Los apellidos son muy largos");
		return false;
	}
	else if(usuario.length>10 || contrasena.length>10){
		alert("El usuario y la contraseña solo deben contener 1o caracteres como maximo");
		return false;
	}
	else if(celular.length>10){
		alert("El celular es muy largo");
		return false;
	}
	else if (direccion.length>80){
		alert("La direccion es muy grande");
		return false;
	}
	else if(isNaN(celular)){
		alert("El celular tiene que ser solo digitos");
		return false;
	}
	
	
	
}

function env(){
	alert ("bhjsv");
	console.log("chau");
}