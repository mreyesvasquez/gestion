<?php
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    $departamentocodigo=$_POST['departamentocodigo'];
    
    $rsprov="select * from provincia where departamentocodigo ='$departamentocodigo'";
    $prov = mysql_query($rsprov);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/Formas.css">
        <script type="text/javascript"  src="../js/Filtrar.js"></script>
    </head>
    <body>
        <select name="cboprovincia" class="Caja" id="cboprovincia" onchange="Filtrarcbodistrito();">
            <option value="">Seleccionar</option>
                <?php while ($rsprov=mysql_fetch_array($prov)) {?>
                <option value="<?php echo $rsprov['provinciacodigo'] ?>">
                <?php echo $rsprov['provinciadescripcion'] ?></option>
                <?php } ?>
        </select>
    </body>
</html>