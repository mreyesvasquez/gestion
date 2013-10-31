function FiltrarSubGerencias()
{
    var areascodigo=document.getElementById("cboareas").value;
    $("#CargandoSG").show();
    document.getElementById("CargandoSG").innerHTML='<div align=center><img src=../Imagenes/carga.gif /></div>';
    $.post("../Filtros/SubAreas.php",{

    areascodigo:areascodigo
   },
   function(data){

    $("#SubAreas").html(data);
    $("#CargandoSG").hide();
      });
}
function Filtrarcboprovincia()
{
    var departamentocodigo=document.getElementById("cbodepartamento").value;
    $("#CargandoPV").show();
    document.getElementById("CargandoPV").innerHTML='<div align=center><img src=../Imagenes/carga.gif /></div>';
    $.post("../Filtros/Provincia.php",{

    departamentocodigo:departamentocodigo
   },
   function(data){

    $("#Provincia").html(data);
    $("#CargandoPV").hide();
      });
}

function Filtrarcbodistrito()
{
    var provinciacodigo=document.getElementById("cboprovincia").value;
    $("#CargandoDT").show();
    document.getElementById("CargandoDT").innerHTML='<div align=center><img src=../Imagenes/carga.gif /></div>';
    $.post("../Filtros/Distrito.php",{

    provinciacodigo:provinciacodigo
   },
   function(data){

    $("#Distrito").html(data);
    $("#CargandoDT").hide();
      });
}

