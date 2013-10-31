<?php 
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");    
}
$txtcodigo = $_POST["txtcodigo"];
$cboareas = $_POST["cboareas"];
$txtdescripcion = $_POST["txtdescripcion"];
$cboestado = $_POST["cboestado"];
$txtid = $_POST["txtid"];
$tipo = $_POST["tipo"];
?>
<?php
if ($tipo == "INS") {

    $consultorio = "insert into subareas (subareascodigo,subareasdescripcion,subareasestado,areascodigo) values
    ('$txtcodigo','$txtdescripcion','$cboestado','$cboareas')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from subareas";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($tipo == "UPD") {

    $persona = "UPDATE subareas SET subareasdescripcion='$txtdescripcion',subareasestado='$cboestado',
    areascodigo='$cboareas' where subareascodigo='$txtcodigo'";
    $rpersona = mysql_query($persona);
}

    $rscantidad = "select count(*)+1 as total from subareas";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
?>
<script type="text/javascript">


    document.getElementById("txtcodigo").value = "SG<?php echo $Cogg ?>";
    NuevoAreaSub();
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
