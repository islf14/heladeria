function validar_adm(){
    var fecha = document.getElementById("fecha").value;
    if(fecha==""){
        alert("Por favor ingrese fecha");
        return false;
    }

    if(document.form1.radio1[0].checked == false && document.getElementsByName("radio1")[1].checked == false){
        alert("Aviso: Selecciona entrada o salida");
        return false;
    }

}

function validar_venta(){
    empleado = document.getElementById("empleado").value;
    carta = document.getElementById("cod_carta").value;
    cliente = document.getElementById("cliente").value;
    if (empleado == 0){
        alert("Aviso: Selecciona empleado");
        return false;
    }
    if (carta == 0){
        alert("Aviso: Selecciona Carta");
        return false;
    }
    if (cliente == 0){
        alert("Aviso: Selecciona Cliente");
        return false;
    }
	
	
	
}
