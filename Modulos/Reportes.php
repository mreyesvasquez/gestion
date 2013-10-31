<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    
?>
<html>
    <head>
        <!-- Para la ventana modal-->
   
        <link rel="stylesheet" type="text/css" href="../css/colorboxadmin.css">
       
        <link rel="Stylesheet" type="text/css" href="../css/admin.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/tabla.css"/>
        <link rel="Stylesheet" type="text/css" href="../css/jquery-ui.css"/>
  
        <link rel="stylesheet" type="text/css" href="../css/formularios.css">
          <script type="text/javascript" src="../js/funciones.js"></script>
        <link href="../css/Modal/styles/modal-window.css" type="text/css" rel="stylesheet" />
      
    </head>    
    <body onLoad="NuevoIncidenciaA();">
        <center>
            <fieldset id="tituloP">
                REPORTES DE INCIDENCIA
            </fieldset>
            <fieldset id="datospersonalesP">
                
                 <script>

                        function cargarreporteEmpleado() {
                            var cboestado = $("#cboestado").val();


                            document.getElementById("loadingdni").innerHTML = "<img src='../imagenes/loading.gif'> Cargando..";
                            $.post("../Modulos/rEmpleado_cargarReporte.php", {
                                cboestado: cboestado

                            }, function(data) {
                                $("#loadingdni").html(data);
                            });


                        }


                    </script>
                  <div class="pformu1re">
                        <div style=" font-family: arial;font-family: arial;" class="pmidle1" >
                            <table>
                                <tr>
                                    <td>
                                        <label style="color: #444444;
                                               font-size: 12px;
                                               margin-left: 30px;
                                               margin-top: 40px;
                                               padding-right: 10px;
                                               text-align: right;
                                               width: 30%;"  >Buscar: </label>
                                        <select id='cboestado' style=" width: 150px; height: 25px;" name='cboestado' class="ctrltextosre" >
                                            <option value="0">Todos</option>
                                            <option value="3">Activo</option>
                                            <option value="4">Inactivo</option>

                                        </select>
                                        <label onclick="cargarreporteEmpleado();">
                                            <img style="cursor: pointer" alt=""  src="../images/search_1.png" id="btnBuscarDni" class='btnBuscarDni'>
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="loadingdni" ></div>

                    </div>
            </fieldset>
        </center>
    </body>
<html> 
<?php }?>
