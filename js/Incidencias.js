

function irmodalincidencias()
{
    $("#modalincidencias").dialog("open");
}
function NuevoIncidencias() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("cbocategoria").value = "";
    document.getElementById("texproblema").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function CancelarIncidencias() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("cbocategoria").value = "";
    document.getElementById("texproblema").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposIncidencias() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("cbocategoria").value;
    v3 = document.getElementById("texproblema").value;


    if ( v2 == "" || v3 == "") {
        return false;
    }
    else {
        return true;
    }
}
function GuardarIncidencias() {
    if (verificarCamposIncidencias() == true) {
        var txtcodigo = $("#txtcodigo").val();
        var cbocategoria = $("#cbocategoria").val();
        var texproblema = $("#texproblema").val();
        var txtid = $("#id").val();
        var txttipo = $("#txttipo").val();

        $.post("../Operaciones/GuardarIncidencias.php", {
            txtcodigo: txtcodigo,
            cbocategoria: cbocategoria,
            texproblema: texproblema,
            txtid: txtid,
            txttipo: txttipo
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

