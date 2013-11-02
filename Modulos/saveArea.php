<?php
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $codigo = $_POST['codigo'];
    
    echo $descripcion." ".$estado." ".$codigo;
    
    $query = "update areas set areasdescripcion = '$descripcion', areasestado = '$estado' where areascodigo='$codigo'";
    mysql_query($query);
?>
