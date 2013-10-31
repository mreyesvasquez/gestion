<?php
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    $provinciacodigo=$_POST['provinciacodigo'];
    
    $rsdist="select * from distrito where provinciacodigo='$provinciacodigo'";
    $dist = mysql_query($rsdist);
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/Formas.css">
    </head>
    <body>
        <select name="cbodistrito" class="Caja" id="cbodistrito">
            <option value="">Seleccionar</option>
                <?php while ($rsdist=mysql_fetch_array($dist)) {?>
                <option value="<?php echo $rsdist['distritocodigo'] ?>">
                <?php echo $rsdist['distritodescripcion'] ?></option>
                <?php } ?>
        </select>
    </body>
</html>
