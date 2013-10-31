<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    
    $rscategorias="select * from categorias";
    $categorias = mysql_query($rscategorias);
?>
<html>
    <head>
        <!-- Para la ventana modal-->
        <script type="text/javascript" src="../js/jquery.colorbox.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/colorboxadmin.css">
        <script type="text/javascript" src="../js/Model.js"></script>
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
    `   <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/Incidencias.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    </head>
     <?php
    $rscantidad = "select count(*)+1 as total from incidencias";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"]; 
    ?>
    <body onLoad="NuevoIncidencias();">
        <center>
            <fieldset id="titulo">
                REGISTRAR INCIDENCIA
            </fieldset>
            <fieldset id="datospersonales">
                <table style="font-family: Verdana; font-size: 13px;color:#00408d;" cellpadding="3px">
                    <tr>
                        <td style="padding-bottom: 5px;">
                            <input type="hidden" id="id">
                            <input type="hidden" id="txttipo" value="INS">
                        </td>
                        <td style="padding-bottom: 5px;">
                             <input type="hidden" id="txtcodigo" class="Caja"readonly readonly value="RI<?php echo $Cogg ?>" name="txtcodigo" class="ctrltextos" style="width: 100px;" >

                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Asunto(*)</label></td>
                        <td>
                            <select id="cbocategoria" class="Caja" name="cbocategoria">
                                <option value="">Seleccionar</option>
                                <?php while ($rscategorias=mysql_fetch_array($categorias)) {?>
                                <option value="<?php echo $rscategorias['categoriascodigo'] ?>">
                                <?php echo $rscategorias['categoriasdescripcion'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Descripcion(*)</label></td>
                        <td colspan="3"><textarea style="width: 400px; height: 130px; border: 1px solid skyblue;" name="texproblema" id="texproblema"></textarea></td>
                    </tr>
                </table>
            </fieldset>
        
        <br>
        <table style="text-align: left; margin: 0 auto;color:#F08F01;font-size:11px;">
            <tr>
                <td bgcolor="#E9F3FE">
                    <div id="divSave" style="float: left;">
                        <label style="cursor: pointer;" >
                            <input id="btnSave" type="image" src="../images/guardar_1.png" onclick="GuardarIncidencias();">
                            Guardar
                        </label>
                    </div>
                </td>
<!--                <td bgcolor="#E9F3FE">
                    <div id="divEdit" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnEdit" type="image" src="../images/modificar.png">
                            Modificar
                        </label>
                    </div>
                </td>-->
                <td bgcolor="#E9F3FE">
                    <div id="divCancel" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnCancel" type="image" src="../images/limpiar.png" onclick="CancelarIncidencias();">
                            Limpiar
                        </label>
                    </div>
                </td>
            </tr>
        </table>
        </center>
        <div style="display:none">
            <div id="errVerify" style='background:#fff;height: 50px; width: 350px'>
                <h3 style=" font-size: 16px;color: #0078a3;padding-top: 30px;"><div id="divAlert" style="text-align: center;"></div></h3>
            </div>
        </div>
    </body>
<html> 
<?php } ?>