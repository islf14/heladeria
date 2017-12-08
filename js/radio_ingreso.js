function radio_c(valor){
    //alert(valor);

    if(valor==1){
        document.getElementById("ingreso").readonly=false;
        document.getElementById("salida").readonly=true
        document.getElementById("salida").value=0;
        document.getElementById("label_cantidad").textContent("sldfjlf");
    }
    else{
        document.getElementById("ingreso").readonly=true;
        document.getElementById("salida").readonly=false;
        document.getElementById("ingreso").value=0;
    }
}