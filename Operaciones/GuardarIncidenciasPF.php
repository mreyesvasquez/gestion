<?php
include('../Conexion/Conexion.php');
$cn = Conectarse();
    
$txtcodigo = $_POST["txtcodigo"];
$texresuelto = $_POST["texresuelto"];
    
$incidencias = "update incidencias set incidenciasresultado='$texresuelto', incidenciasestado='A' 
where incidenciascodigo='$txtcodigo'";
$insertar = mysql_query($incidencias);


?>
<html>
    <head>
        <title></title>
        <script type="text/javascript"  src="../js/funciones.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <style type="text/css">
            <!--
            .style3 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 15px; }
            .style4 {font-size: 12px}
            .style5 {color: #CCCCCC}
            -->
        </style>
    </head>
    <body topmargin="0" leftmargin="0">
        <link rel="stylesheet" type="text/css" href="../bruni.css">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr bgcolor="#F2F2F2">
                <td width="13%" height="100px"><span class="style4"></span></td>
                <td width="54%" valign="bottom"><span class="style3">Su registro ha sido actualizado correctamente </span></td>
                <td width="33%"><span class="style4"></span></td>
            </tr>
            <tr>
                <td><span class="style5"></span></td>
                <td><span class="style5"></span></td>
                <td><span class="style5"></span></td>
            </tr>
            <tr>
                <td><span class="style5"></span></td>
                <td><span class="style5"></span></td>
                <td><button id="BtnCerrar" onclick="parent.$.modal().close()">Cerrar</button></td>
            </tr>
        </table>
    </body>
</html>