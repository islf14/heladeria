function radio_c(valor){
    //alert(valor);

    if(valor==1){
        document.getElementById("ingreso").disabled=false;
        document.getElementById("salida").disabled=true;
        document.getElementById("salida").value=0;
        document.getElementById("label_cantidad").textContent("sldfjlf");
    }
    else{
        document.getElementById("ingreso").disabled=true;
        document.getElementById("salida").disabled=false;
        document.getElementById("ingreso").value=0;
    }
}