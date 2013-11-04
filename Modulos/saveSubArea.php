<?php
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $codigo = $_POST['codigo'];
    
    echo $descripcion." ".$estado." ".$codigo;
    
    $query = "update subareas set subareasdescripcion = '$descripcion', subareasestado = '$estado' where subareascodigo='$codigo'";
    mysql_query($query);
?>
