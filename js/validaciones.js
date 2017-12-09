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