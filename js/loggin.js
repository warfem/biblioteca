function loguear() {
    let usuario = document.getElementById("id").value;
    let pass = document.getElementById("password").value;

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("resultado").innerText = this.response;
      }
    };
  xhttp.open("POST", "../loginAJAX.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("usuario="+usuario+"&pass="+pass);
}


