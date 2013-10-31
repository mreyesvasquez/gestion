<?php 
include('../Conexion/Conexion.php');
session_start();
$cn = Conectarse();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");    
}
$txtcodigo = $_POST["txtcodigo"];
$txtdni = $_POST["txtdni"];
$txtnombres = $_POST["txtnombres"];
$txtpaterno = $_POST["txtpaterno"];
$txtmaterno = $_POST["txtmaterno"];
$txtcelular = $_POST["txtcelular"];
$txtemail = $_POST["txtemail"];
$cbosexo = $_POST["cbosexo"];
$nacimiento = $_POST["nacimiento"];
$cbocivil = $_POST["cbocivil"];
$cbodepartamento = $_POST["cbodepartamento"];
$cboprovincia = $_POST["cboprovincia"];
$cbodistrito = $_POST["cbodistrito"];
$txtdirec = $_POST["txtdirec"];
$cbocargo = $_POST["cbocargo"];
$cboareas = $_POST["cboareas"];
$cbosubareas = $_POST["cbosubareas"];
$txtid = $_POST["txtid"];
$tipo = $_POST["tipo"];
?>
<?php
if ($tipo == "INS") {

    $consultorio = "insert into personal(personalcodigo,personaldni,personalnombres,personalpaterno,personalmaterno,
    personalsexo,personalcelular,personalemail,personalfechanac,personalestadocivil,personaldireccion,
    personalestado,departamentocodigo,provinciacodigo,distritocodigo,cargocodigo,areascodigo,subareascodigo)values
    ('$txtcodigo','$txtdni','$txtnombres','$txtpaterno','$txtmaterno','$cbosexo','$txtcelular','$txtemail','$nacimiento',
     '$cbocivil','$txtdirec','Activo','$cbodepartamento','$cboprovincia','$cbodistrito','$cbocargo','$cboareas','$cbosubareas')";
    $rconsultorio = mysql_query($consultorio);
    
    $rscantidad = "select count(*)+1 as total from personal";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}

if ($tipo == "UPD") {

    $persona = "UPDATE personal SET personaldni='$txtdni',personalnombres='$txtnombres',personalpaterno='$txtpaterno',
    personalmaterno='$txtmaterno',personalsexo='$cbosexo',personalcelular='$txtcelular',personalemail='$txtemail',
    personalfechanac='$nacimiento',personalestadocivil='$cbocivil',personaldireccion='$txtdirec',personalestado='Activo',
    departamentocodigo='$cbodepartamento',provinciacodigo='$cboprovincia',distritocodigo='$cbodistrito',
    cargocodigo='$cbocargo',areascodigo='$cboareas',subareascodigo='$cbosubareas'
    where personalcodigo='$txtcodigo'";
    $rpersona = mysql_query($persona);
    
    $rscantidad = "select count(*)+1 as total from personal";
    $cantidad = mysql_query($rscantidad);
    $rscantidad = mysql_fetch_array($cantidad);
    $Cogg = $rscantidad["total"];
}
?>
<script type="text/javascript">


    document.getElementById("txtcodigo").value = "P<?php echo $Cogg ?>";
    NuevoPersonal();
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