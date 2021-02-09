function logout(){   
    let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){

            document.getElementById("resultado").innerHTML = this.response;
            }  
        };
        xhttp.open("GET","../welcome.php?",true);
        xhttp.send();
    }