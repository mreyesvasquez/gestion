

function irmodalcargo()
{
    $("#modalcargo").dialog("open");
}



function NuevoAreaSub() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("cboareas").value = "";
    document.getElementById("txtdescripcion").value = "";
    document.getElementById("cboestado").value = "";
   
    
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function CancelarAreaSub() {
    document.getElementById("txttipo").value = "INS";

    document.getElementById("cboareas").value = "";
    document.getElementById("txtdescripcion").value = "";
    document.getElementById("cboestado").value = "";
  
    document.getElementById("id").value = "";
}
function verificarCamposAreaSub() {
    v1 = document.getElementById("txttipo").value;
    v2 = document.getElementById("cboareas").value;
    v3 = document.getElementById("txtdescripcion").value;
    v4 = document.getElementById("cboestado").value;
    if (v1 == "" || v2 == "" || v3 == "" || v4 == "" ) {
        return false;
    }
    else {
        return true;
    }
}
function GuardarAreaSub() {
    if (verificarCamposAreaSub() == true) {
        var txtcodigo = $("#txtcodigo").val();
        var cboareas = $("#cboareas").val();
        var txtdescripcion = $("#txtdescripcion").val();
        var cboestado = $("#cboestado").val();
             
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../Operaciones/GuardarAreaSub.php", {
            txtcodigo: txtcodigo,
            cboareas:cboareas,
            txtdescripcion: txtdescripcion,
            cboestado:cboestado,
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

