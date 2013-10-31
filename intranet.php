<?php
        session_start();
		error_reporting(E_ALL ^ E_NOTICE);
		if ( isset($_SESSION['username']) != ""){
			header("location: index.php");
		}
		else{
			if(isset($_POST['boton'])){
				if ( $idcnx = @mysql_connect('localhost','root',"") ){

					if ( @mysql_select_db('soportempt',$idcnx) ){

						$sql = 'SELECT usuariocodigo, usuariouser, usuariopass  FROM usuario WHERE usuariouser="'. $_POST['login_username'].'" && usuariopass="'.$_POST['login_userpass'].'" && usuarioestado = 1 LIMIT 1';
						if ( @$res = @mysql_query($sql) ){
							if ( @mysql_num_rows($res) == 1 ){

								$user = @mysql_fetch_array($res);

								$_SESSION['usuariouser'] = $user['usuariocodigo'];
								$_SESSION['usuariocodigo']	= $user['usuariouser'];
								$_SESSION['personalcodigo'] = $user['personalcodigo'];
								$_SESSION['perfilcodigo'] = $user['perfilcodigo'];

								header("location: index.php");
							}
							else
								$result = '<p align="justify" class="error"><img src="img/error.png" height="16px" width="16px">Tu nombre de usuario no se ha encontrado. Por favor, póngase en contacto con el administrador para obtener ayuda.</p>';
						}
						else
							$result = '<p align="justify" class="error"><img src="img/error.png" height="16px" width="16px">No se pudo ejecutar la consulta.</p>';
					}
					mysql_close($idcnx);
				}
				else
					$result = '<p align="justify" class="error"><img src="img/error.png" height="16px" width="16px">No se pudo establecer la conexión.</p>';
			}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang=es>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/ico" href="/images/favicon.ico" />
		<title>SISTEMA DE GESTION DE INCIDENCIAS</title>
		 <link href="css/styles.css" type="text/css" rel="stylesheet"/>

		<style type="text/css">
			img, div { behavior: url(iepngfix.htc) }
		</style>
	</head>
	<body id="login" vlink="#fff" alink="#fff">
		<div id="wrappertop"></div>
			<div id="wrapper">
					<div id="content" style="background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.33, #4ECC17),
	color-stop(0.67, #4ECC17)
);">
						<div id="header" style="background: #fff;">
							<h1><a href="index.php"><img src="img/logo.png" width="360" style="margin-top: 15px !important;"></a></h1>
						</div>
						<div id="darkbanner" class="banner320">
							<h2>BIENVENIDO A SISTEMA DE INCIDENCIAS</h2>
						</div>
						<div id="darkbannerwrap">
						</div>
						<form name="frmLogin" action="#" method="POST" style="background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.33, #4ECC17),
	color-stop(0.67, #4ECC17)
);">
						<fieldset class="form">
                                                    <?php echo $result; ?>
                        	                                                                                       <p>
								<label for="user_name">Usuario:</label>
								<input name="login_username" type="text" value="" />
							</p>
							<p>
								<label for="user_password">Contraseña:</label>
								<input name="login_userpass" type="password" />
							</p>
							<button type="submit" class="positive" name="boton" id="boton">
								<img src="img/key.png" alt="Announcement"/>Acceder</button>
                            						</fieldset></form>


						<div id="wrapperbottom_branding" style="background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.33, #4ECC17),
	color-stop(0.67, #4ECC17)
);"><div id="wrapperbottom_branding_text" style="background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.33, #4ECC17),
	color-stop(0.67, #4ECC17)
);">HARDWARE Y <a href="" style='text-decoration:none'>SOTWARE</a> REPRESENTACIONES<a href="" style='text-decoration:none'> GENERALES SAC</a></div></div>
					</div>

				</div>


</body>
</html>
<?php }?>