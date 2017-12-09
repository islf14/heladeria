function radio_c(valor){
    //alert(valor);
    if(valor==1){
        document.getElementById("cantidad").disabled=false;
        document.getElementById("cantidad").value="";
        document.getElementById("label_cantidad").textContent = "Cantidad de Ingreso:";
    }
    if(valor==2){
        document.getElementById("cantidad").disabled=false;
        document.getElementById("cantidad").value="";
        document.getElementById("label_cantidad").textContent = "Cantidad de Salida:";
    }
}