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
        <link rel="Stylesheet" type="text/css" href="../css/tabla.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
        <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
        
        <link href="../css/Modal/styles/modal-window.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="../css/Modal/scripts/jquery-1.3.2.min.js"></script>
        <script type="text/javascript" language="javascript" src="../css/Modal/scripts/modal-window.min.js"></script>
    </head>    
    <body onLoad="NuevoIncidenciaA();">
        <center>
            <fieldset id="tituloP">
                ASIGNAR INCIDENCIA
            </fieldset>
<!--            <fieldset id="datospersonalesP">
                <table style="font-family: Verdana; font-size: 13px;color:#00408d;" cellpadding="3px">
                    <tr>
                        <td style="padding-bottom: 5px;">
                            <label>Buscar</label>
                            <input type="hidden" id="id">
                            <input type="hidden" id="txttipo" value="INS">
                        </td>
                        <td style="padding-bottom: 5px;">
                            <input type="hidden" id="txtcodigo" class="Caja" readonly readonly class="ctrltextos" style="width: 100px;" >
                        </td>
                        <td style="padding-bottom: 5px;">
                            <input type="search" id="txtbuscar" class="Caja" style="width: 100px;" >
                        </td> 
                    </tr>
                </table>
            </fieldset>-->
            <fieldset id="datospersonalesP">
                 <?php
                    $rsincidencias="select i.incidenciascodigo, concat(p.personalnombres,' ',p.personalpaterno,' ',p.personalmaterno) as Personal,
                    a.areasdescripcion, s.subareasdescripcion,c.categoriasdescripcion, i.incidenciasfecha,i.incidenciasdescripcion,
                    i.incidenciasestado from incidencias i, personal p , areas a, subareas s, categorias c 
                    where i.personalcodigo=p.personalcodigo and p.areascodigo=a.areascodigo and p.subareascodigo=s.subareascodigo 
                    and i.categoriascodigo=c.categoriascodigo and i.incidenciasestado='NA'";
                    $incidencias = mysql_query($rsincidencias);
                    ?>
                    <div id="ContieneTabla">
                        <table style="width: 100%;">
                            <tr style="height: 30px;">
                                <th class="th"></th>
                                <th class="th">PERSONAL</th>
                                <th class="th">AREA</th>
                                <th class="th">SUB AREA</th>
                                <th class="th">ASUNTO</th>
                                <th class="th">Fecha</th>
                            </tr>
                            <?php
                            while ($rsincidencias = mysql_fetch_array($incidencias)){
                            ?>
                            <tr class="tr" style="background: #f0f0f0;">
                                <td class="td">
                                    <a href="IncidenciasAP.php?id=<?php echo $rsincidencias["incidenciascodigo"] ?>" onclick="$(this).modal({width:1033, height:583}).open(); return false;"><img src='../Imagenes/edi.gif' style="width: 20px; height: 20px"></a>
                                </td>
                                <td class="td"><?php echo $rsincidencias["Personal"] ?></td>
                                <td class="td"><?php echo $rsincidencias["areasdescripcion"] ?></td>
                                <td class="td"><?php echo $rsincidencias["subareasdescripcion"] ?></td>
                                <td class="td"><?php echo $rsincidencias["categoriasdescripcion"] ?></td>
                                <td class="td"><?php echo $rsincidencias["incidenciasfecha"] ?></td>
                            <?php } ?>
                            </tr>
                        </table>
                    </div>
            </fieldset>
            
            </div>
        </center>
    </body>
<html> 
<?php }?>