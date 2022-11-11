<?php
    require_once("conexion.php");
    
    if(isset($_POST["register"])){
        if(strlen($_POST["nombre"]) >= 1 && strlen($_POST["apellido"]) >= 1 && strlen($_POST["email"]) 
        >= 1 && strlen($_POST["password"]) >= 1 && strlen($_POST["passwordR"]) >= 1) {
            $nombre = trim($_POST["nombre"]);
            $email = trim($_POST["email"]);
            $apellido = trim($_POST["apellido"]);
            $email = trim($_POST["email"]);
            $contrasena = trim($_POST["password"]);
            $repetircontrasena = trim($_POST["passwordR"]);
            $fecha = date("d / m / y");
            $consulta = "INSERT INTO datos(Nombre, Apellido, Email, Contrasena, RepetirContrasena, Fecha) 
            VALUES ('$nombre','$apellido','$email','$contrasena','$repetircontrasena','$fecha')";
            if($resultado){
                ?>
                    <h3>Usuario registrado exitosamente</h3>
                <?php
            }else{
                ?>
                    <h3>Usuario no registrado</h3>
                <?php
            }
        }else{
            ?>
                <h3>Por Favor complete las campos</h3>
            <?php
        }

    }

    function verificar_email($email){
        if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
            return true;
        }
    return false;
    }

    function verificar_password_strenght($password){
        if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password))
            echo "Su password es seguro.";
        else
            echo "Su password no es seguro.";
    }

    function verificar_ip($ip){
        return preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])" .
        "(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $ip );
    }
?>