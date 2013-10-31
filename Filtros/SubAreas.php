<?php
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    $areascodigo=$_POST['areascodigo'];
    $rssubareas="select subareascodigo,subareasdescripcion, areascodigo from subareas
    where areascodigo ='$areascodigo'";
    $subareas = mysql_query($rssubareas);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/Formas.css">
    </head>
    <body>
        <select name="cbosubareas" class="Caja" id="cbosubareas">
            <option value="">Seleccionar</option>
                <?php while ($rssubareas=mysql_fetch_array($subareas)) {?>
                <option value="<?php echo $rssubareas['subareascodigo'] ?>">
                <?php echo $rssubareas['subareasdescripcion'] ?></option>
                <?php } ?>
        </select>
    </body>
</html>

