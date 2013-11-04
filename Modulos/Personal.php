<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();    
    $rsdepar="select * from departamento";
    $depar = mysql_query($rsdepar);
    $rsprov="select * from provincia";
    $prov = mysql_query($rsprov);
    $rsdist="select * from distrito";
    $dist = mysql_query($rsdist);
    $rscargo="select * from cargo";
    $cargo = mysql_query($rscargo);
    $rsareas="select * from areas";
    $areas = mysql_query($rsareas);
    $rssubareas="select * from subareas";
    $subareas = mysql_query($rssubareas);
?>
<html>
    <head>
        <!-- Para la ventana modal-->
        <script type="text/javascript" src="../js/jquery.colorbox.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/colorboxadmin.css">
        <script type="text/javascript" src="../js/Model.js"></script>
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/estilos.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <script type="text/javascript"  src="../js/Filtrar.js"></script>
        <script type="text/javascript" src="../js/Personal.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
    </head>
    <?php
    $rscantidad = "select count(*)+1 as total from personal";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
    ?>
    <body onLoad="NuevoPersonal();">
        <center>
        <fieldset id="tituloP">
            REGISTRAR PERSONAL
        </fieldset>
        <fieldset id="datospersonalesP">
            <legend>Datos Personales</legend>
            <table border="0" style="font-family: Verdana; font-size:13px;width:100%;color:#00408d;" cellpadding="3px">
                <tr>
                    <td style="padding-bottom: 5px;">
                        <label>Codigo(*)</label>
                        <input type="hidden" id="id">
                        <input type="hidden" id="txttipo" value="INS">
                    </td>
                    <td style="padding-bottom: 5px;">
                        <input type="text" id="txtcodigo" readonly readonly value="P<?php echo $Cogg ?>" name="txtcodigo" class="ctrltextos" style="width: 100px;" >
                    </td>
                    <td><label style="padding-bottom: 5px;">DNI(*)</label></td>
                        <td><input type="text" class="Caja" id="txtdni" name="txtdni" maxlength="8" onkeypress="return pressNumeros(event);"></td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                        
                        <td><label style="padding-bottom: 5px;">Nombres(*)</label></td>
                        <td><input type="text" class="Caja" id="txtnombres" name="txtnombres" onkeypress="return pressletras(event);"></td>
                        <td><label style="padding-bottom: 5px;">Apt. Paterno(*)</label></td>
                        <td><input type="text" class="Caja" id="txtpaterno" name="txtpaterno" onkeypress="return pressletras(event);"></td>
                        <td><label style="padding-bottom: 5px;">Apt. Materno(*)</label></td>
                        <td><input type="text" class="Caja" id="txtmaterno" name="txtmaterno" onkeypress="return pressletras(event);"></td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Celular(*)</label></td>
                        <td><input type="text" class="Caja" id="txtcelular" name="txtcelular" maxlength="12" onkeypress="return pressNumeros(event);"></td>
                        <td><label style="padding-bottom: 5px;">Email(*)</label></td>
                        <td><input type="text" class="Caja" id="txtemail" name="txtemail"></td>
                        <td><label style="padding-bottom: 5px;">Sexo(*)</label></td>
                        <td>
                            <select class="Caja" id="cbosexo" name="cbosexo">
                                <option value="">Seleccionar</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Fecha Nac.(*)</label></td>
                        <td>
                            <input type="text" class="Caja" id="nacimiento" name="nacimiento">
                        </td>
                        <td><label style="padding-bottom: 5px;">Estado Civil(*)</label></td>
                        <td>
                            <select class="Caja" id="cbocivil" name="cbocivil">
                                <option value="">Seleccionar</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                            </select>
                        </td>
                        <td colspan="2"></td>
                    </tr>
            </table>
        </fieldset>
        <br>
            <fieldset id="datospersonalesP">
                <legend><b>Direcci&oacute;n Actual</b></legend>
                <table style="font-family: Verdana; width:100%;  font-size: 13px;color:#00408d;" cellpadding="3px">
                    <tr>
                        <td><label style="padding-bottom: 5px;">Departamento(*)</label></td>
                        <td>
                            <select class="Caja" id="cbodepartamento" name="cbodepartamento" onchange="Filtrarcboprovincia();">
                                <option value="">Seleccionar</option>
                                <?php while ($rsdepar=mysql_fetch_array($depar)) {?>
                                <option value="<?php echo $rsdepar['departamentocodigo'] ?>">
                                <?php echo $rsdepar['departamentodescripcion'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td><label style="padding-bottom: 5px;">Provincia(*)</label></td>
                        <td>
                            <div id="Provincia" style="width:auto; float:left">
                                <select class="Caja" id="cboprovincia" name="cboprovincia">
                                    <option value="">Seleccionar</option>
                                    <?php while ($rsprov=mysql_fetch_array($prov)) {?>
                                    <option value="<?php echo $rsprov['provinciacodigo'] ?>">
                                    <?php echo $rsprov['provinciadescripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div><div id="CargandoPV" style="width:auto; float:left"></div>
                        </td>
                        <td><label style="padding-bottom: 5px;">Distrito(*)</label></td>
                        <td>
                            <div id="Distrito" style="width:auto; float:left">
                                <select class="Caja" id="cbodistrito" name="cbodistrito">
                                    <option value="">Seleccionar</option>
                                    <?php while ($rsdist=mysql_fetch_array($dist)) {?>
                                    <option value="<?php echo $rsdist['distritocodigo'] ?>">
                                    <?php echo $rsdist['distritodescripcion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div><div id="CargandoDT" style="width:auto; float:left"></div>
                        </td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Direccion(*)</label></td>
                        <td colspan="5"><input type="text" id="txtdirec" name="txtdirec" style="width: 400px; height: 20px; border: 1px solid skyblue;" ></td>
                    </tr>   
                </table>
            </fieldset>
            <br>
            <fieldset id="datospersonalesP">
                <legend><b>Cargo</b></legend>
                <table  style="font-family: Verdana; width:100%;  font-size: 13px;color:#00408d;" cellpadding="3px">
                    <tr>
                        <td><label style="padding-bottom: 5px;">Gerencia(*)</label></td>
                        <td>
                            <select name="cboareas" id="cboareas" class="Caja" onchange="FiltrarSubGerencias();">
                                <option value="">Seleccionar</option>
                                <?php while ($rsareas=mysql_fetch_array($areas)) {?>
                                <option value="<?php echo $rsareas['areascodigo'] ?>">
                                <?php echo $rsareas['areasdescripcion'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">SubGerencia(*)</label></td>
                            <td>
                                <div id="SubAreas" style="width:auto; float:left">
                                    <select class="Caja" name="cbosubareas" id="cbosubareas">
                                        <option value="">Seleccionar</option>
                                        <?php while ($rssubareas=mysql_fetch_array($subareas)) {?>
                                        <option value="<?php echo $rssubareas['subareascodigo'] ?>">
                                        <?php echo $rssubareas['subareasdescripcion'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div><div id="CargandoSG" style="width:auto; float:left"></div>
                            </td>
                        
                    </tr>
                    <tr>
                        <td><label style="padding-bottom: 5px;">Cargo(*)</label></td>
                        <td>
                            <select class="Caja" id="cbocargo" name="cbocargo">
                                <option value="">Seleccionar</option>
                                <?php while ($rscargo=mysql_fetch_array($cargo)) {?>
                                <option value="<?php echo $rscargo['cargocodigo'] ?>">
                                <?php echo $rscargo['cargodescripcion'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </fieldset>
        <br>
        <table style="text-align: left; margin: 0 auto;color:#F08F01;font-size:11px;">
            <tr>
                <td>
                    <div id="divSave" style="float: left;margin-left: 35%">
                        <label style="cursor: pointer;" >
                            <input id="btnSave" type="image" src="../images/botonaceptar.jpg" onclick="GuardarArea();">
                         </label>
                    </div>
                     <div id="divCancel" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnCancel" type="image" src="../images/botonlimpiar.jpg" onclick="CancelarArea();">
                        </label>
                    </div>
                     <div id="divCancel" style="float: left;">
                        <label  style="cursor: pointer;">
                            <input id="btnCancel" type="image" src="../images/botonimprimir.jpg" onclick="CancelarArea();">
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
                        $query_count = "select count(*) as total from Personal";
                        $result_count = mysql_query($query_count);
                        $total = mysql_fetch_array($result_count);
                    ?>
                                    <td width="50%" align="left">N de Personas encontradas <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly value="<?= $total['total']?>" style="text-align: center; font-size: 12px;"></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
            </div>
                
            <div id="cabeceraResultado" class="header">
                RELACION de PERSONAL </div>
                    <div id="frmResultado">
                    
                    <table class="fuente8" width="930px" cellspacing=0 cellpadding=2 border=0 ID="Table1">
                                    <tr class="cabeceraTabla">
                                            <td width="2%">ITEM</td>
                                            <td width="3%">DNI</td>
                                            <td width="10%">NOMBRES</td>
                                            <td width="10%">AP. PATERNO</td>
                                            <td width="10%">AP. MATERNO</td>
                                            <td width="5%">CELULAR</td>
                                            <td width="8%">EMAIL</td>
                                            <td width="13%">DIRECCION</td>
                                            <td width="13%">ACCIONES</td>
                                    </tr>
                                    
                                        <?php
                                            $query = "select * from personal";
                                            $result = mysql_query($query);
                                            
                                            while($area = mysql_fetch_array($result)){?>
                                                <tr>
                                                    <td align="center"><?= $area['personalcodigo']?></td>
                                                    <td align="center"><?= $area['personaldni']?></td>
                                                    <td align="center"><?= $area['personalnombres']?></td>
                                                    <td align="center"><?= $area['personalpaterno']?></td>
                                                    <td align="center"><?= $area['personalmaterno']?></td>
                                                    <td align="center"><?= $area['personalcelular']?></td>
                                                    <td align="center"><?= $area['personalemail']?></td>
                                                    <td align="center"><?= $area['personaldireccion']?></td>
                                                    <td align="center">
                                                        <a href="#" onclick="editArea('<?= $area['areascodigo']?>');"><img src="../Imagenes/edit.png" width="24"></a>-<a href="#" onclick="viewArea('<?= $area['areascodigo']?>');"><img src="../Imagenes/view.png" width="24"></a>-<a href="#" onclick="deleteArea('<?= $area['areascodigo']?>');"><img src="../Imagenes/delete.png" width="24"></a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php }
                                        ?>
                                    
                    </table>
                    </div>
                       
                    
            </td>
           </tr>
        </table>
        </center>
        <div style="display:none">
            <div id="modal" style='padding:10px; background:#fff;height: 450px'>
                <div class="mpptitle">B&uacute;squeda del Personal</div>
                <div class="mppHead">
                    <div class="mppitem1">Personal</div>
                    <div class="mppitem2"><input type="text" id="txtnombresm" onkeyup="pressBuscarModal(event, '', 'txtnombresm', 'txtnombresm', 'divpopup', 'personal');" style="width: 240px;"></div>
                    <div class="mppitem3"><input type="image" onclick="listarDatosModal('', 'txtnombresm', 'txtnombresm', 'divpopup', 'personal');" id="ibtnSearchDName" src="../images/search_1.png"/>
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