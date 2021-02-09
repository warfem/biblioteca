

/*Para mostrar el libro en AJAX*/ 
function sugLibro(str){
    if(str.length == 0){ //si no hemos escrito nada en el input, las sugerencias nos van a salir vacías.
        document.getElementById('salida').innerHTML = '';
    } else {
        // AJAX REQ
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('salida').innerHTML = this.responseText; //modificamos la etiqueta con la ID salida para que nos salga la respuesta obtenida
            }
        }
        xmlhttp.open("GET","buscadorAJAX.php?buscarLibro="+str, true);
        xmlhttp.send();
    }
}


/*Para buscar autor y mostrar en el parrafo*/ 
function sugAutor(strAutor){
    if(strAutor.length == 0){ //si no hemos escrito nada en el input, las sugerencias nos van a salir vacías.
        document.getElementById('salida').innerHTML = '';
    } else {
        // AJAX REQ
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById('salida').innerHTML = this.responseText; //modificamos la etiqueta con la ID salida para que nos salga la respuesta obtenida
            }
        }
        xmlhttp.open("GET", "buscadorAJAX.php?buscarLibro="+strAutor, true);
        xmlhttp.send();
    }
}

