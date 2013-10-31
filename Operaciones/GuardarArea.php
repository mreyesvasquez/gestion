<?php 
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");    
}
$txtdescripcion = $_POST["txtdescripcion"];
$txtcodigo = $_POST["txtcodigo"];
$cboestado = $_POST["cboestado"];
$txtid = $_POST["txtid"];
$tipo = $_POST["tipo"];
?>
<?php
if ($tipo == "INS") {

    $consultorio = "insert into areas (areascodigo,areasdescripcion,areasestado) values
    ('$txtcodigo','$txtdescripcion','$cboestado')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from areas";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($tipo == "UPD") {

    $consultorio = "UPDATE areas SET areasdescripcion='$txtdescripcion',areasestado='$cboestado'
    where areascodigo='$txtcodigo'";
    $rconsultorio = mysql_query($consultorio);
}

    $rscantidad = "select count(*)+1 as total from areas";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
?>
<script type="text/javascript">


    document.getElementById("txtcodigo").value = "G<?php echo $Cogg ?>";
    NuevoArea();
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
