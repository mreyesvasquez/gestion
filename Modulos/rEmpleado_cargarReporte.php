<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
} else {
    include('../Conexion/conexion.php');
    $cn = Conectarse();
}

$txtid = $_POST['cboestado'];
$Pagina = "0";
?>
<script>
  function exel(){
    $(document).ready(function() {
        $("#datos_a_enviar").val($("<div>").append( $("#contenedorcabecera").eq(0).clone()).html());
        $("#frmdatos").submit();
    });
}
</script>
<script type="text/javascript" src="../js/funciones.js"></script>
<div  style="width: 120px; height: 35px; margin-left: 20px;margin-top: 5px">
 <form action="re_ficheroExcel.php" method="post" target="_blank" id="frmdatos">
       
        <label onclick="imprimirSelec('contenedorcabecera');"><img src="../images/impresora.png" alt="Imprimir" title="Imprimir"  style="cursor: pointer"  /></label>&nbsp;

        <label onclick="exel();"><img src="../images/excel.png" alt="Exportar a Excel" title="Exportar a Excel"  style="cursor: pointer"  /></label>&nbsp;
        <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
    </form>
</div>


<div  id="contenedorcabecera" >

       <div id="hola"  style="width:16cm;padding-top: 0.5cm;margin-left: 0.9cm;margin-right: 1cm; color:#444444;" >
       
        <div style="height:0.6cm;width:18cm;margin:auto;"> </div>


         <script>
            window.onload = cargarlistaEmpleado(<?php echo $txtid ?>,<?php echo $Pagina ?>);
        </script>

        <div id="corte"  >
        </div>
    </div>
   


</div>

    


