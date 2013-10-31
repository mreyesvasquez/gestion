<?php 
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");    
}
$txtcodigo = $_POST["txtcodigo"];
$txtpersonalcodigo = $_POST["txtpersonalcodigo"];
$txtusuario = $_POST["txtusuario"];
$txtclave = $_POST["txtclave"];
$cboestado = $_POST["cboestado"];
$cboperfil = $_POST["cboperfil"];

$txtid = $_POST["txtid"];
$tipo = $_POST["tipo"];
?>
<?php
if ($tipo == "INS") {

    $consultorio = "insert into usuario (usuariocodigo,usuariouser,usuariopass,usuarioestado,
    personalcodigo,perfilcodigo) values
    ('$txtcodigo','$txtusuario','$txtclave','$cboestado','$txtpersonalcodigo','$cboperfil')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from usuario";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($tipo == "UPD") {

    $consultorio = "UPDATE areas SET usuariouser='$txtusuario',usuariopass='$txtclave',usuarioestado
    where personalcodigo='$txtcodigo'";
    $rconsultorio = mysql_query($consultorio);
}
?>
<script type="text/javascript">


    document.getElementById("txtcodigo").value = "U<?php echo $Cogg ?>";
    NuevoUsuario();
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
