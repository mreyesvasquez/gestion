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
                <td><input type="text" id="codigo" name="codigo" value="<?= $subarea['subareascodigo']?>" readonly="readonly"></td>
            </tr>
            <tr>
                <td>Descripción: </td>
                <td><input type="text" name="descripcion" id="descripcion" value="<?= $subarea['subareasdescripcion']?>" required="required"></td>
            </tr>
            <tr>
                <td>Estado: </td>
                <td>
                    <select name="estado" id="estado" required="required">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="button" value="Modificar" onclick="saveSubArea();"></td>
            </tr>
        <?php }
    ?>
</table>
</html>


