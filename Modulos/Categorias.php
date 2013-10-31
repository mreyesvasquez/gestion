<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();
?>
<html>
    <head>
        <!-- Para la ventana modal-->
        <script type="text/javascript" src="../js/jquery.colorbox.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/colorboxadmin.css">
        <script type="text/javascript" src="../js/Model.js"></script>
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/Categorias.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    </head>
     <?php
    $rscantidad = "select count(*)+1 as total from categorias";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"]; ?>
    
    <body onLoad="NuevoCategoria();">
        <center>
            <fieldset id="titulo">
                REGISTRAR RECURSO INFORMATICO
            </fieldset>
            <fieldset id="datospersonales">
                <table style="font-family: Verdana; font-size: 13px;color:#00408d;" cellpadding="3px">
                    <tr>
                        <td style="padding-bottom: 5px;">
                            <label>Codigo(*)</label>
                            <input type="hidden" id="id">
                            <input type="hidden" id="txttipo" value="INS">
                        </td>
                        <td style="padding-bottom: 5px;">
                             <input type="text" id="txtcodigo" class="Caja"readonly readonly value="C<?php echo $Cogg ?>" name="txtcodigo" class="ctrltextos" style="width: 100px;" >

                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Descripcion(*)</label></td>
                        <td style="padding-bottom: 5px;">
                            <input type="text" id="txtdescripcion" class="Caja" onkeypress="return pressletras(event);"  name="txtdescripcion"  style="width: 230px;" ></td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Estado(*)</label> </td>
                        <td>
                            <select id="cboestado" name="cboestado" class="ctrltextos">
                                <option value="">Estado</option>
                                <option  value="Activo">Activo</option>
                                <option  value="Inactivo">Inactivo</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
        
        <br>
        <table style="text-align: left; margin: 0 auto;color:#F08F01;font-size:11px;">
            <tr>
                <td bgcolor="#E9F3FE">
                    <div id="divSave" style="float: left;">
                        <label style="cursor: pointer;" >
                            <input id="btnSave" type="image" src="../images/guardar_1.png" onclick="GuardarCategorias();">
                            Guardar
                        </label>
                    </div>
                </td>
                <td bgcolor="#E9F3FE">
                    <div id="divEdit" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnEdit" type="image" src="../images/modificar.png">
                            Modificar
                        </label>
                    </div>
                </td>
                <td bgcolor="#E9F3FE">
                    <div id="divCancel" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnCancel" type="image" src="../images/limpiar.png" onclick="CancelarCategorias();">
                            Limpiar
                        </label>
                    </div>
                </td>
            </tr>
        </table>
        </center>
        <div style="display:none">
            <div id="modal" style='padding:10px; background:#fff;height: 450px'>
                <div class="mpptitle">B&uacute;squeda de Categorias</div>
                <div class="mppHead">
                    <div class="mppitem1">Categorias</div>
                    <div class="mppitem2"><input type="text" id="txtnombresm" onkeyup="pressBuscarModal(event,'','txtnombresm','txtnombresm','divpopup','categorias');" style="width: 240px;"></div>
                    <div class="mppitem3"><input type="image" onclick="listarDatosModal('','txtnombresm','txtnombresm','divpopup','categorias');" id="ibtnSearchDName" src="../images/search_1.png"/>
                        <label for="ibtnSearchDName">Buscar</label>
                    </div>
                </div>
                <BR>
                <div id="divpopup" >
                    
                </div>
            </div>
            <div id="errVerify" style='background:#fff;height: 50px; width: 350px'>
                <h3 style=" font-size: 16px;color: #0078a3;padding-top: 30px;"><div id="divAlert" style="text-align: center;"></div></h3>
            </div>
        </div>
    </body>
<html> 
<?php } ?>