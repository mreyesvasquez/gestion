<?php
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
$vusuariof = $_POST["usuario"];
$clave = $_POST["clave"];
$variable = ($clave);
$sql = "select u.usuariocodigo, u.usuariouser, u.usuariopass, p.personalcodigo, p.areascodigo,p.subareascodigo,
        a.areasdescripcion,s.subareasdescripcion, pe.perfildescripcion
        from usuario u , personal p, areas a, subareas s, perfil pe where u.personalcodigo=p.personalcodigo 
        and p.areascodigo=a.areascodigo and p.subareascodigo=s.subareascodigo and u.perfilcodigo=pe.perfilcodigo and 
        u.usuariouser='$vusuariof' and u.usuariopass='$variable' and u.usuarioestado='Activo'";
$result = mysql_query($sql);

if ($rsusuario = mysql_fetch_array($result)) {
    $_SESSION['user'] = $vusuariof;
    $_SESSION['codigo'] = $rsusuario["usuariocodigo"];
    $_SESSION['Codigopersonal'] = $rsusuario["personalcodigo"];
    $_SESSION['Codigoareas'] = $rsusuario["areascodigo"];
    $_SESSION['Codigosubareas'] = $rsusuario["subareascodigo"];
    $_SESSION['areas'] = $rsusuario["areasdescripcion"];
    $_SESSION['subareas'] = $rsusuario["subareasdescripcion"];
    $_SESSION['perfil'] = $rsusuario["perfildescripcion"];
//    echo "<script>Administrador();</script>";
    if($_SESSION['perfil'] == "Administrador"){
        echo "<script>Administrador();</script>";
    }
    if($_SESSION['perfil'] == "Usuario"){
        echo "<script>Usuario();</script>";      
    }
    if($_SESSION['perfil'] == "Sistemas"){
        echo "<script>Sistemas();</script>";
    }      
}
else
    echo "Usuario o clave incorrectos";
?>