<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/Login.css" />
        <script type="text/javascript" src="js/JQuery/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
        <link type="image/x-icon" href="Imagenes/icono.ico" rel="icon" />
        <title>-: Bienvenidos al Sistema de gestion de Incidencias:-</title>
    </head>
    <body>
        <div id="contenedorlogin">
            <div id="cabeceralogin">
                <di id="bannerizquierdalogin">
                </di>
                <div id="bannerderechalogin">
                    <center>
                        AREA DE MANTENIMIENTO ELECTROMECANICO
                    </center>
                </div>
            </div>
            
            <div id="cuadrologin">
                <br><br><br>
                <form  id="formContacto" name="formContacto" >
                    <table width="500" border="2" cellspacing=" 0" cellpadding="0" id="tablasesion">
                        <tr>
                            <td colspan="2"><h5>ACCESO AL SISTEMA DE GESTION DE INCIDENCIAS</h5></td>
                        </tr>
                        <tr>
                            <td width="100" rowspan="1" style="background: white;">
                                <center><img src="Imagenes/Banner/essaludbanner.jpg" ></center>
                            </td>
                            <td>
                                <table border="0" width="100%" cellspacing="0" cellpadding="3" id="tablasesion">
                                    <tr>  <td style="height: 30px;"></td></tr>
                                    <tr>
                                        <td style="width: 30px" rowspan="7"></td>
                                        <td><b>Usuario:</b></td>
                                    </tr>
                                    <tr>
                                        <td><input style="height: 25px; width: 200px" type="text" name="usuario" id="usuario" maxlength="25"/></td>
                                    </tr>
                                    <tr><td style="height: 10px;"></td></tr>
                                    <tr>
                                        <td><b>Clave:</b></td> 
                                    </tr>
                                    <tr>
                                        <td><input style="height: 25px; width: 200px" type="password" name="clave" id="clave"  maxlength="25"/></td>
                                    </tr>
                                    <tr><td style="height: 10px;"></td></tr>
                                    <tr>
                                        <td><input name="Submit" type="button" id="btnIngresar" onclick="verificausuario();" value="Ingresar" onkeyup='fn(this.form,this)'/></td>   
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right" style="color:#F00">
                                           <div id="mensaje" style="height: 45px; text-align: center;font-weight: bold;"></div> 
                                        </td>
                                    </tr> 
                                </table>
                            </td>  
                        </tr>                               
                    </table>
                </form>
            </div>
            <div id="pie"><h5>
            Of. Principal Lima Av. San Borja Sur 474 - San Borja - Lima/ Sucursal Trujillo Prolongacion Union 1350 Trujillo / Teléfono: #721189 - #971150742| Informes </h5>
            </div>
        </div>
    </body>
</html>