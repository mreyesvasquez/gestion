function verificausuario()
{
    var usuario=$("#usuario").val();
    var clave=$("#clave").val();
    document.getElementById("mensaje").innerHTML="<img src='Imagenes/cargando.gif'> Cargando..";
    $.post("Modulos/Validar.php",{
     usuario:usuario,
     clave:clave
       },
  function(data){
   $("#mensaje").html(data)
    });
}

function setFocusCodigo() {
    $("#userName").focus();
}
function setFocusCodigoRenaes() {
    $("#txtrenaes").focus();
}

function Administrador(){
    window.location = "Modulos/GAdministrador.php";
}
function Usuario(){
    window.location = "Modulos/GUsuario.php";
}
function Sistemas(){
    window.location = "Modulos/GSistemas.php";
}
function pressNumeros1(e) {
    code = (e.keyCode ? e.keyCode : e.which);
    return isNumber1(code);
}
function isNumber1(k) {
    if (k == 0 || (k >= 48 && k <= 57) || k == 8 || k == 9 || k == 46 || k == 37 || k == 39) return true;
    return false;
}
function pressletras(evt) {
  vt = (evt) ? evt : event;
var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
((evt.which) ? evt.which : 0));
if ( (charCode >= 48 && charCode<= 57) && charCode > 31 && (charCode < 64 || charCode > 90) && (charCode < 97 || charCode > 122))
{
return false;
}
return true;
}
function pressNumeros(e) {
    code = (e.keyCode ? e.keyCode : e.which);
    return isNumber(code);
}
function isNumber(k) {
    if (k == 0 || (k >= 48 && k <= 57) || k == 8 || k == 9  || k == 37 || k == 39) return true;
    return false;
}
function pressBuscarModal(e,pagina, idorigen,idorigen2,iddestino,tipo) {
    code = (e.keyCode ? e.keyCode : e.which);
    if (code ==13){
        listarDatosModal(pagina, idorigen,idorigen2,iddestino,tipo);
    }
}
function pressBuscarTexto(e,idorigen,idorigen2,iddestino,tipo) {
    code = (e.keyCode ? e.keyCode : e.which);
    if (code ==13){
        mostrarResultadoBuscarTexto(idorigen,idorigen2,iddestino,tipo);
    }
}
function CerrarSesion()
{
    window.location = "CerrarSesion.php";
}
function Areas()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Areas.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}
function Cargo()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Cargo.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function AreasSub()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/AreasSub.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function Personal()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Personal.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function CrearUsuarios()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/CrearUsuario.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function Incidencias()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Incidencias.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}
function IncidenciasA()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/IncidenciasA.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function IncidenciasT()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/IncidenciasT.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function Categorias()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Categorias.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function Reportes()
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/Reportes.php",
    {
        },function(data){
            $("#subnivel").html(data);
        }
        );
}

function ContentR() {
        element = document.getElementById("opcpersonal");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    
function ContentD() {
        element = document.getElementById("opcderivar");
        check1 = document.getElementById("check1");
        if (check1.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }


function listarDatosModal(pagina, idorigen, idorigen2, iddestino, tipo) {
    var rnd = Math.random() * 11;
    var codigo = $("#" + idorigen).val();
    var codigo2 = $("#" + idorigen2).val();
    document.getElementById(iddestino).innerHTML = "<center><img src='../Imagenes/preload.gif'> </center>";
    $.post("../Busquedas/Busquedamodal.php", {
        rnd: rnd,
        pagina: pagina,
        codigo: codigo,
        codigo2: codigo2,
        tipo: tipo,
        idorigen: idorigen,
        idorigen2: idorigen2,
        iddestino: iddestino
    }, function(data) {
        $("#" + iddestino).html(data);
    });
}

function sendDatosOperaciones(id, cod1, cod2, cod3, cod4, cod5, cod6, cod7, cod8, cod9, cod10, cod11, cod12, cod13, cod14, cod15, cod16, cod17, cod18, tipo) {
    if (tipo == 'areas')
    {
        NuevoArea();
        document.getElementById("id").value = id;
        document.getElementById("txttipo").value ='UPD';
        document.getElementById("txtcodigo").value = cod1;
        document.getElementById("txtdescripcion").value = cod2;
        document.getElementById("cboestado").value = cod3;
        parent.$('#modal').colorbox.close();
    }


    else if (tipo == 'subareas')
    {
        NuevoAreaSub();
        document.getElementById("id").value = id;
        document.getElementById("txttipo").value = 'UPD';
        document.getElementById("txtcodigo").value = cod1;
        document.getElementById("cboareas").value = cod5;
        document.getElementById("txtdescripcion").value = cod2;
        document.getElementById("cboestado").value = cod4;
        parent.$('#modal').colorbox.close();
    }
    else if (tipo == 'personal')
    {
        NuevoPersonal();
        document.getElementById("id").value = id;
        document.getElementById("txttipo").value = 'UPD';
        document.getElementById("txtcodigo").value = cod1;
        document.getElementById("txtdni").value = cod2;
        document.getElementById("txtnombres").value = cod3;
        document.getElementById("txtpaterno").value = cod4;
        document.getElementById("txtmaterno").value = cod5;
        document.getElementById("txtcelular").value = cod7;
        document.getElementById("txtemail").value = cod8;
        document.getElementById("cbosexo").value = cod6;
        document.getElementById("nacimiento").value = cod9;
        document.getElementById("cbocivil").value = cod10;
        document.getElementById("cbodepartamento").value = cod13;
        document.getElementById("cboprovincia").value = cod14;
        document.getElementById("cbodistrito").value = cod15;
        document.getElementById("txtdirec").value = cod11;
        document.getElementById("cboareas").value = cod17;
        document.getElementById("cbosubareas").value = cod18;
        document.getElementById("cbocargo").value = cod16;
        parent.$('#modal').colorbox.close();
    }
    else if (tipo == 'categorias')
    {
        NuevoCategoria();
        document.getElementById("id").value = id;
        document.getElementById("txttipo").value = 'UPD';
        document.getElementById("txtcodigo").value = cod1;
        document.getElementById("txtdescripcion").value = cod2;
        document.getElementById("cboestado").value = cod3;
        parent.$('#modal').colorbox.close();
    }
    else if (tipo == 'usuarios')
    {
//        NuevoUsuario();
        document.getElementById("txtpersonal").value = cod2 +" "+ cod3 +" "+ cod4;
        document.getElementById("txtpersonal").disabled = true;
        document.getElementById("txtpersonalcodigo").value = cod1;
        parent.$('#modal').colorbox.close();
    }
    else if (tipo == 'usuariosopcionesnew')
    {
        nuevoprivilegios();
        document.getElementById("txtdni").disabled = true;
        document.getElementById("txtuser").disabled = true;
        document.getElementById("txtdni").value = cod1;
        document.getElementById("txtuser").value = cod2;
        document.getElementById("txttipo").value = "INS";
        document.getElementById("id").value = id;
        parent.$('.btnEdit').colorbox.close();
    }

    else if (tipo == 'rpieza')
    {


        nuevoregistro_pieza();
        document.getElementById("id").value = id;
        document.getElementById("tipo").value = "UPD";
        document.getElementById("txtcodigo").value = "PIE-00" + id;
        document.getElementById("cbopieza").value = cod1;
        document.getElementById("txtserie").value = cod2;
        document.getElementById("txtpatrimonio").value = cod3;
        document.getElementById("txtfecha").value = cod4;
        document.getElementById("txtcapacidad").value = cod7;
        document.getElementById("txtarea").value = cod6;
        document.getElementById("cboestado").value = cod5;
        parent.$('#btnEdit').colorbox.close();
    }

    else if (tipo == 'busqueda_pieza')
    {

        var elementos = $("#grilla tbody").find("tr").length;
        var j = 0;
        var r = 0;
        var g = 0;
        var ciex = "";
        for (i = 0; i < elementos; i++) {
            if (id == $("#grilla tbody").find("tr").eq(i).find("td").eq(0).html())
            {
                j = j + 1;
            }
        }

        if (j != 0)
        {
            document.getElementById("divAlert").innerHTML = "Esta Pieza ya ha sido seleccionada";
            $.colorbox({
                transition: "none",
                inline: true,
                href: "#errVerify",
                overlayClose: false,
                onComplete: function() {
                    setTimeout($.colorbox.close, 1000);
                }
            });
        } else {


            cadena = "<tr>";
            cadena = cadena + "<td>" + id + "</td>";
            cadena = cadena + "<td>" + cod1 + " - " + cod8 + "</td>";
            cadena = cadena + "<td>" + cod2 + "</td>";
            cadena = cadena + "<td>" + cod3 + "</td>";
            cadena = cadena + "<td>" + cod7 + "</td>";
            cadena = cadena + "<td>" + cod5 + "</td>";
            cadena = cadena + "<td><a class='elimina'><img src='../images/delete.png' /></a></td></tr>";
            $("#grilla tbody").append(cadena);
            fn_dar_eliminar();
        }

    }

    else if (tipo == 'equipo')
    {

        nuevoregistro_equipo();
        document.getElementById("id").value = id;
        document.getElementById("tipo").value = "UPD";
        document.getElementById("txtcodigo").value = "PIE-00" + id;
        document.getElementById("cboarea").value = cod1;
        document.getElementById("txtequipo").value = cod2;
        document.getElementById("txtpatrimonio").value = cod5;
        document.getElementById("txtfecha").value = cod6;
        document.getElementById("cboestado").value = cod4;
       

        var id = id;
        document.getElementById("grilla").innerHTML = "<img src='../images/preload1.gif'> Cargando..";
        $.post("tabla.php", {
            id: id
        }, function(data) {
            $("#grilla").html(data);
        });

        parent.$('#btnEdit').colorbox.close();
    }
}

function cargarlistaEmpleado(txtid,pagina){
    document.getElementById("corte").innerHTML='';
    $.post("../modulos/rEmpleado_cargalistado.php",{
        cbocontrato:txtid,
        pagina:pagina
    }, function(data){
        $("#corte").html(data)
    });
}
function imprimirSelec(id)
{
    var ficha = document.getElementById(id);//almacenamos en variable los datos del div a imprimir
    var ventimp = window.open(' ', 'Impresion');//aqui se genera una pagina temporal
    ventimp.document.write( ficha.innerHTML );//aqui cargamos el contenido del div seleccionado
    ventimp.document.close();//cerramos el documento
    ventimp.print( );//enviamos los datos a la impresora
    ventimp.close();//cerramos ventana temporal
}
function exel(){
    $(document).ready(function() {
        $("#datos_a_enviar").val($("<div>").append( $("#contenedorcabecera").eq(0).clone()).html());
        $("#frmdatos").submit();
    });
}

function editArea(area)
{
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/editarArea.php", 
    {codigo: area},
    function(data){
            $("#subnivel").html(data);
        }
        );
}

function saveArea(){
    var vdescripcion = $("#descripcion").val();
    var vestado = $("#estado option:selected").val();
    var vcodigo = $("#codigo").val();
    
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    
    $.post
    ("../Modulos/saveArea.php", 
    {descripcion: vdescripcion, estado: vestado, codigo: vcodigo},
    function(){
            Areas();
        }
        );
}

function viewArea(area){
    document.getElementById("subnivel").innerHTML="<img src='../Imagenes/carga.gif'> Cargando...";
    $.post
    ("../Modulos/verArea.php", 
    {codigo: area},
    function(data){
            $("#subnivel").html(data);
        }
        );
}

function deleteArea(area){
    var r=confirm("¿Desea eliminar area?");
    if (r==true)
      {
      $.post
    ("../Modulos/eliminarArea.php", 
    {codigo: area},
    function(){
            Areas();
        }
        );
      }
}