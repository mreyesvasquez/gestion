<?php 
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");    
}
$Codigopersonal = $_SESSION['Codigopersonal'];
$txtcodigo = $_POST["txtcodigo"];
$cbocategoria = $_POST["cbocategoria"];
$texproblema = $_POST["texproblema"];
$txttipo = $_POST["txttipo"];
?>
<?php
if ($txttipo == "INS") {

    $consultorio = "insert into incidencias (incidenciascodigo,incidenciasdescripcion,
    personalcodigo,categoriascodigo,incidenciasresultado,personalasignado,incidenciasestado) values 
    ('$txtcodigo','$texproblema','$Codigopersonal','$cbocategoria','0','0','NA')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from incidencias";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($txttipo == "UPD") {

    $persona = "UPDATE incidencias SET personalasignado='$cbopersonal',
    where incidenciascodigo='$txtcodigo'";
    $rpersona = mysql_query($persona);
    
    $rscantidad = "select count(*)+1 as total from incidencias";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}
?>
<script type="text/javascript">
    document.getElementById("txtcodigo").value = "RI<?php echo $Cogg ?>";
    NuevoIncidencias();
    //document.getElementById("loadingdni").innerHTML="";
    document.getElementById("divAlert").innerHTML = "Datos Guardados Correctamente.";
    $.colorbox({
        transition: "none",
        inline: true,
        href: "#errVerify",
        overlayClose: false,
        onComplete: function() {
            setTimeout($.colorbox.close, 1000);
        }
    });
</script>
