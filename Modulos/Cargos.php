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
        <link rel="Stylesheet" type="text/css" href="../css/estilos.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/main.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/Area.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
        <script language="javascript">
        </script>
    </head>
     <?php
    $rscantidad = "select count(*)+1 as total from cargo";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"]; 
    ?>
    
    <body onLoad="NuevoArea();">
        
        <center>
            <fieldset id="titulo">
                REGISTRAR SERVICIOS
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
                <input type="text" id="txtcodigo" class="Caja"readonly readonly value="G<?php echo $Cogg ?>" name="txtcodigo" class="ctrltextos" style="width: 100px;" >

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
                <td bgcolor="#E9F3FE" valign="middle" align="center" colspan="3" style="text-align: center !important">
                    <div id="divSave" style="float: left;margin-left: 35%">
                        <label style="cursor: pointer;" >
                            <input id="btnSave" type="image" src="../images/guardar_1.png" onclick="GuardarArea();">
                            Guardar
                        </label>
                    </div>
                    <div id="divEdit" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnEdit" type="image" src="../images/modificar.png">
                            Modificar
                        </label>
                    </div>
                    <div id="divCancel" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnCancel" type="image" src="../images/limpiar.png" onclick="CancelarArea();">
                            Limpiar
                        </label>
                    </div>
                </td>
            </tr>
           <tr>
            <td colspan="3" align="center">
            <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
                                    <?php
                        $query_count = "select count(*) as total from subareas";
                        $result_count = mysql_query($query_count);
                        $total = mysql_fetch_array($result_count);
                    ?>
                                    <td width="50%" align="left">N de Sub Areas encontradas <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly value="<?= $total['total']?>" style="text-align: center; font-size: 12px;"></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
            </div>
                
            <div id="cabeceraResultado" class="header">
                RELACION de AREAS </div>
                    <div id="frmResultado">
                    
                    <table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
                                    <tr class="cabeceraTabla">
                                            <td width="8%">ITEM</td>
                                            <td width="6%">DESCRIPCION</td>
                                            <td width="13%">ESTADO</td>
                                    </tr>
                                    
                                        <?php
                                            $query = "select * from areas";
                                            $result = mysql_query($query);
                                            
                                            while($area = mysql_fetch_array($result)){?>
                                                <tr>
                                                    <td align="center"><?= $area['areascodigo']?></td>
                                                    <td align="center"><?= $area['areasdescripcion']?></td>
                                                    <td align="center"><?= $area['areasestado']?></td>
                                                </tr>
                                            <?php }
                                        ?>
                                    
                    </table>
                    </div>
                        <input type="hidden" id="iniciopagina" name="iniciopagina">
        		<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
                    <div id="lineaResultado">

					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">

						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>

					</iframe>

					<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">

					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>

					</iframe>

				</div>
            </td>
           </tr>
        </table>
        </center>
        <div style="display:none">
            <div id="modal" style='padding:10px; background:#fff;height: 450px'>
                <div class="mpptitle">B&uacute;squeda de Gerencia</div>
                <div class="mppHead">
                    <div class="mppitem1">Gerencia</div>
                    <div class="mppitem2"><input type="text" id="txtnombresm" onkeyup="pressBuscarModal(event,'','txtnombresm','txtnombresm','divpopup','areas');" style="width: 240px;"></div>
                    <div class="mppitem3"><input type="image" onclick="listarDatosModal('','txtnombresm','txtnombresm','divpopup','areas');" id="ibtnSearchDName" src="../images/search_1.png"/>
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
