<?php    
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    
    $subarea = $_POST['codigo'];
    $query = "select * from subareas where subareascodigo='$subarea'";
    $result = mysql_query($query);
?>
<html>
<head>
        <!-- Para la ventana modal-->
        <script type="text/javascript" src="../js/jquery.colorbox.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/colorboxadmin.css">
        <script type="text/javascript" src="../js/Model.js"></script>
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/estilos.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/main.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/Area.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
        <script language="javascript">
        </script>
    </head>
<table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-collapse: collapse">
    <?php
        while($subarea = mysql_fetch_array($result)){?>
            <tr>
                <td>Código: </td>
                <td><?= $subarea['subareascodigo']?></td>
            </tr>
            <tr>
                <td>Descripción: </td>
                <td><?= $subarea['subareasdescripcion']?></td>
            </tr>
            <tr>
                <td>Estado: </td>
                <td><?= $subarea['subareasestado']?></td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="Regresar" onclick="AreasSub();"></td>
            </tr>
        <?php }
    ?>
</table>
</html>

