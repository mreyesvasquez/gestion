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
                <div id="bannerderechalogin" class="userNav">
                    <ul>
                        <li>
                            <a><img src="images/userPic.png" alt="" />
                                    <span>Administrador</span></a>
                            </li></ul>
                </div>
            </div>
            
            <div id="cuadrologin">
                <br><br><br>
                <form  id="formContacto" name="formContacto" >
                    <table width="300" border="0" cellspacing=" 0" cellpadding="0" id="tablasesion">
                        
                        <tr>
                            <td align="center"><img src="images/files.png" alt="" style="float:left;margin-left: 32%;margin-top: 12px;" /><h5 style="float: left">Panel de Usuario</h5><p style="clear:both"></p></td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" width="100%" cellspacing="0" cellpadding="3" id="tablasesion">
                                    <tr>  <td style="height: 20px;"></td></tr>
                                    <tr>
                                        <td style="width: 20px" rowspan="7"></td>
                                        <td><b>Usuario:</b></td>
                                    </tr>
                                    <tr>
                                        <td><input style="height: 20px; width: 200px" type="text" name="usuario" id="usuario" maxlength="25" placeholder="Ingrese Nombre de Usuario" /></td>
                                    </tr>
                                    <tr><td style="height: 10px;"></td></tr>
                                    <tr>
                                        <td><b>Clave:</b></td> 
                                    </tr>
                                    <tr>
                                        <td><input style="height: 20px; width: 200px" type="password" name="clave" id="clave"  maxlength="25" placeholder="Ingrese Contraseña" /></td>
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
            
        </div>
    </body>
</html>