

function irmodaltipopieza()
{
    $("#modaltipopieza").dialog("open");
}



function nuevotipopieza() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdescripcion").value = "";
   
    
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function cancelartipopieza() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtcodigo").value = "00" + codigo;

    document.getElementById("txtdescripcion").value = "";
  
    document.getElementById("id").value = "";
}
function verificarCampostipopieza() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtdescripcion").value;
 


    if (v1 == "" || v2 == "") {
        return false;
    }
    else {
        return true;
    }
}
function guardartipopieza() {
    if (verificarCampostipopieza() == true) {
        var txtdescripcion = $("#txtdescripcion").val();
        var txtcodigo = $("#txtcodigo").val();       
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../operaciones/guardaratipopieza.php", {
            txtdescripcion: txtdescripcion,
            txtcodigo: txtcodigo,          
            txtid: txtid,
            tipo: tipo
        }, function(data) {
            $("#divAlert").html(data)
          

        });
    }
    else {
        document.getElementById("divAlert").innerHTML = "Llenar todos los campos obligatorios(*).";
        $.colorbox({
            transition: "none",
            inline: true,
            href: "#errVerify",
            overlayClose: false,
            onComplete: function() {
                setTimeout($.colorbox.close, 1000);
            }
        });
    }
}



