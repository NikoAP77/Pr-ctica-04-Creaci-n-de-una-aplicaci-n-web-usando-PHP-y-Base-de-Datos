function buscarPorCorreo() {
    var correo = document.getElementById("buscar").value;
    if (correo == "") {
        location.href = "index.php"
        document.getElementById("buscar").value;
    } else {
        if (window.XMLHttpRequest) {
            //code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            //code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("info").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../controladores/user/buscarre.php?correo=" + correo, true);
        xmlhttp.send();
    }
    return false;
}