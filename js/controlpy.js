/*//Estructura Basica de Plugin
(function($){
	$.fn.cargarURI=function(opts){
	return $(this).click(function(evt){
	})
	}
})(jQuery);
*/
//Plugin para Validar Datos de Logueo
(function($){
	$.fn.validar=function(opts){
		return $(this).submit(function(evt){
			evt.preventDefault();//previene ejecucion de envio/reload
			var variables='';
			$(this).find('input').each(function(){
				if($(this).attr("type")!='submit' || $(this).attr("type"!='button')){
					variables+=$(this).attr("id");
					variables+="=";
					variables+=$(this).val();
					variables+="&";
				}
			});
		$.get("admin/validar.php?"+variables,function(data){
			if(data=='yes'){
				$("#mensaje").fadeTo(200,0.1,function(){
					$(this).html('Accediendo <img src="images/ajax-loader.gif">').addClass('messageboxok').fadeTo(900,1,
                        function(){//redireccion a pagina Administracion
                            document.location='admin/admin.php';
                        });
				});
			}else{
				$("#mensaje").fadeTo(200,0.1,function() //Inicia fade Mensaje
				{//agrega mensaje y cambia la clase de la caja y cambia el start faddin
					$(this).html('<a>Datos Incorrectos <img src="images/ajax-loader.gif"></a>').addClass('messageboxerror').fadeTo(900,1);
				});		
			}			
		});
	});
	};
})(jQuery);
(function($){
	$.fn.cargar=function(dv){
		d=dv||'cuerpo';
	return $(this).click(function(evt){
		$(d).html('cargando...<img src="../images/ajax-loader.gif">');
		evt.preventDefault();
		var ref=$(this).attr("href");		
		$.post(ref,{},function(data){$("#"+d).html(data);});
	})
	}
})(jQuery);
(function($){
	$.fn.validsave=function(btn){
		d=btn||'cuerpo';
	return $(this).click(function(evt){
		$(this).find('input').each(function(){
			if($(this).attr("type")!='submit' || $(this).attr("type"!='button')){
				if($(this).val()==''){
					alert("COMPLETA LOS DATOS REQUERIDOS");
				}
			}
		});		
	})
	}
})(jQuery);