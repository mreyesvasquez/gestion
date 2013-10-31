<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    $Codigo = $_GET["id"];
    $Codigopersonal = $_SESSION['Codigopersonal'];

    $sql="select i.incidenciascodigo, concat(p.personalnombres,' ',p.personalpaterno,' ',p.personalmaterno) as Personal,
    a.areasdescripcion, s.subareasdescripcion,categoriasdescripcion, i.incidenciasfecha,i.incidenciasdescripcion
    from incidencias i, personal p , areas a, subareas s, categorias c where i.personalcodigo=p.personalcodigo
    and p.areascodigo=a.areascodigo and p.subareascodigo=s.subareascodigo and i.categoriascodigo=c.categoriascodigo
    and i.incidenciascodigo='$Codigo'";
    $result= mysql_query($sql);
    $rincidencias=mysql_fetch_array($result);
    
    $rspersonal="select p.personalcodigo, a.areasdescripcion, concat(p.personalnombres,' ',p.personalpaterno,' ',p.personalmaterno) as Personal
    from  personal p , areas a, subareas s, cargo c where p.areascodigo=a.areascodigo 
    and p.subareascodigo=s.subareascodigo and p.cargocodigo=c.cargocodigo and a.areasdescripcion='Gerencia de Sistemas'
    and p.personalcodigo!='$Codigopersonal'";
    $personal= mysql_query($rspersonal);
        
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>                 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link rel="stylesheet" type="text/css" href="../Stylos/Formas.css">-->
        <script type="text/javascript"  src="../js/funciones.js"></script>
        <script type="text/javascript"  src="../js/IncidenciasAP.js"></script>
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
<!--        <script type="text/javascript"  src="../JavaScrip/RIncidencias.js"></script>-->
<!--        <script language="javascript" src="../JavaScrip/fecha_hora.js" type="text/javascript" ></script>-->
        
        <title>-: Bienvenidos al Sistema :-</title>
<!--        <link rel="shortcut icon" href="www.munitrujillo.com"/>  -->
        <link type="image/x-icon" href="../Imagenes/favicon.ico" rel="icon" />
    </head>
    <body>
        <br>
        <center>
            <fieldset id="titulo">
                ASIGNAR PERSONAL A INCIDENCIA
            </fieldset>
            <form name="AsignarP" action="../Operaciones/GuardarIncidenciasP.php" method="POST" onSubmit="AsignarPI(); return false">
            <fieldset id="datospersonales">
                <legend><b>Incidencia</b></legend>
                    <table border="0" cellpadding="5px">
                        <tr>
                            <td>
                                <input type="hidden" id="txtcodigo" name="txtcodigo" class="Codigo" maxlength="5" readonly readonly value="<?php echo $rincidencias['incidenciascodigo'] ?>">
                                <input type="hidden" id="txttipo" value="UPD">
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #1c94c4"><b>Area</b></td>
                            <td style="background: #F2F2F2">
                                <?php echo $rincidencias['areasdescripcion'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #1c94c4"><b>SubArea</b></td>
                            <td style="background: #F2F2F2">
                                <?php echo $rincidencias['subareasdescripcion'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #1c94c4"><b>Asunto</b></td>
                            <td style="background: #F2F2F2">
                                <?php echo $rincidencias['categoriasdescripcion'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #1c94c4"><b>Descripci&oacute;n</b></td>
                            <td>
                                <textarea style="width: 100%; height: 130px; border: 0px solid skyblue;" name="texproblema" id="texproblema" disabled><?php echo $rincidencias['incidenciasdescripcion'] ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
            </fieldset>
            <br>
            <fieldset id="datospersonales">
                <legend><b>Asignar Personal</b></legend>
                    <table border="0" cellpadding="5px">
                        <tr>
                            <td colspan="2">
                                <select name="cbopersonal" id="cbopersonal">
                                    <option value="">Seleccionar</option>
                                    <?php while ($rspersonal=mysql_fetch_array($personal)) {?>
                                    <option value="<?php echo $rspersonal['personalcodigo'] ?>">
                                    <?php echo $rspersonal['Personal'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </table>
            </fieldset>
            <br>
            <input type="submit" value="Asignar" id="Botones">
            </form>
        </center>
    </body>
</html>
<?php } ?>
