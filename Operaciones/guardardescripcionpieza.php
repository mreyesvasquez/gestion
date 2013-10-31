<?php
include('../admin/conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['vusuariof'] == "") {
    header("Location: ../acceso.php");
}

            
           

$cbotipopieza = $_POST["cbotipopieza"];
$cbomarca = $_POST["cbomarca"];

$cbomodelo = $_POST["cbomodelo"];

$txtid = $_POST["txtid"];
$tipo = $_POST["tipo"];
?>
<?
if ($tipo == "INS") {


    $consultorio = "insert into descripcion_pieza (nPiCodigo,nMaCodigo,nTpCodigo,nMoCodigo) values
    ('$cbotipopieza','$cbomarca','$cbotipopieza','$cbomodelo')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from modelo";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($tipo == "UPD") {

    $persona = "UPDATE consultorio SET consultoriopiso='$txtpiso',
      consultorioDescripcion='$txtdescripcion',
          ConsultorioEstado='$cboestado'
          where ConsultorioCodigo='$txtid'";
    $rpersona = mysql_query($persona);
}
?>
<script type="text/javascript">


    document.getElementById("txtcodigo").value = "00<? echo $Cogg ?>";
    nuevomodelo();
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
    <?
