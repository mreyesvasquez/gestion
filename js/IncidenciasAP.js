function AsignarPI(){
 
    var cbopersonal=document.AsignarP.cbopersonal;
    
    if (cbopersonal.value.length==0)
        {alert('Obligatorio Seleccionar Personal'); cbopersonal.focus(); return; }
        
AsignarP.submit(); 
}
