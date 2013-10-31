<?php
session_start();
if ($_SESSION['user'] == "") {
    header("Location: ../login.php");
}else{
    include('../Conexion/conexion.php');
    $cn = Conectarse();
    $UserCodigo = $_SESSION['codigo'];
    
    $sql="select concat(p.personalnombres,' ',p.personalpaterno,' ',personalmaterno) as Personal 
    from usuario u inner join personal p on u.personalCodigo = p.personalcodigo where u.usuariocodigo='$UserCodigo'";
    $result= mysql_query($sql);
    $rpersonal=mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/menuprincipal.css">

        <script type="text/javascript"  src="../js/funciones.js"></script>
        <script type="text/javascript"  src="../js/jquery-1.7.1.min.js"></script>
        <script language="javascript" src="../js/fecha_hora.js" type="text/javascript" ></script>
        
        <link rel="stylesheet" type="text/css" href="../css/Menu.css">
        <script type="text/javascript" src="../js/JQuery/jquery.accordionMenu.js"></script>
<!--        <script type="text/javascript"  src="../js/Jquery/jquery-1.7.1.min.js"></script> 
        <script type="text/javascript" src="../js/Jquery/jquery-1.9.1.min.js"></script>-->
        
        <title>-: Bienvenidos al Sistema de Gestion de Incidencias :-</title>
        <link rel="shortcut icon" href="www.munitrujillo.com"/>
    </head>
    <script>
            jQuery(function() {
                    jQuery("#acdnmenu").accordionMenu();
            });
    </script>
    <body>

        <div id="contenedor">
            <div id="cabecera">
                <di id="bannerizquierda">
                </di>
                <div id="bannerderecha">
                    <img src='../Imagenes/calendario.jpg' style="width: 20px; height: 20px">&nbsp;&nbsp;
                    <script> fecha();</script> 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <img src='../Imagenes/hora.png' style="width: 20px; height: 20px">&nbsp;&nbsp;
                    Hora: <label id="hora"></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
            </div>
            <div id="separacion"> 
                <div id="inicio">
                    <a href='Administrador.php'><img src="../Imagenes/Inicio.gif"></a>
                </div>
                <div id="subopciones">
<!--                    Usted tiene acceso al siguiente perfil -->
                    GERENCIA DE INGENIERIA CLINICA Y HOSPITALARIA |
                     <!--<?php echo $_SESSION['areas'] ?> | &nbsp;&nbsp;&nbsp;&nbsp;-->
                    OFICINA DE INGENIERIA HOSPITALARIA RALL
                    <!-- <?php echo $_SESSION['subareas'] ?> |-->
                </div> 
            </div>
            <div id="sep">
                    <img src='../Imagenes/persona.png' style="width: 15px; height: 15px">&nbsp;
                    <b>HOLA:</b>&nbsp;<?php echo $rpersonal['Personal'] ?> | &nbsp;&nbsp;
                    
                    <img src='../Imagenes/usuario.png' style="width: 15px; height: 15px">&nbsp;
                    <b>USUARIO:</b>&nbsp;<?php echo $_SESSION['user'] ?> | &nbsp;&nbsp;
                    
<!--                    <img src='../Imagenes/actulizar.png' style="width: 15px; height: 15px">&nbsp;
                    <a onclick="CambiarClave();" style=" cursor: pointer;">CAMBIAR CLAVE</a> &nbsp; | &nbsp;&nbsp;
                    
                    <img src='../Imagenes/buscar.png' style="width: 15px; height: 15px">&nbsp;
                    <a onclick="DatosPersonal();" style=" cursor: pointer;">MIS DATOS</a> &nbsp; | &nbsp;&nbsp;-->
                    
                    <img src='../Imagenes/cancelar.png' style="width: 15px; height: 15px">&nbsp;
                    <a onclick="CerrarSesion();" style=" cursor: pointer;">CERRAR SESION</a> &nbsp;&nbsp;  
            </div>
            <div id="cuerpo">

                <div id="cuerpo_izquierda">
                    <div id="menu">
                        <nav>
                            <div id="acdnmenu" style="width:100%;height:100%; padding: 0px 0px 0px 0px;">
                                <ul>
                                    <li>PROCESOS
                                        <ul>
                                            <li><a onclick="IncidenciasT();">Atender Incidencias</a></li>
                                        </ul>
                                    </li>
<!--                                    <li>REPORTES
                                        <ul>
                                            <li><a onclick="Reportes();">Consultar</a></li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </div>
                        </nav>
                    </div>


                </div>
                <div id="cuerpo_derecha">
                    <div id="subnivel">

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php } ?>
