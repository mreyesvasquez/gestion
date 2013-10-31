

function irmodaldescripcionpieza()
{
    $("#modaldescripcionpieza").dialog("open");
}



function nuevodescripcionpieza() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("cbotipopieza").value = "";
    document.getElementById("cbomarca").value = "";
    document.getElementById("cbomodelo").value = "";


    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function cancelardescripcionpieza() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtcodigo").value = "00" + codigo;

    document.getElementById("cbotipopieza").value = "";
    document.getElementById("cbomarca").value = "";
    document.getElementById("cbomodelo").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposdescripcionpieza() {
    v1 = document.getElementById("txttipo").value;
    v2 = document.getElementById("cbotipopieza").value;
    v3 = document.getElementById("cbomarca").value;
    v4 = document.getElementById("cbomodelo").value;



    if (v1 == "" || v2 == ""|| v3 == ""|| v4 == "") {
        return false;
    }
    else {
        return true;
    }
}
function guardardescripcionpieza() {
    if (verificarCamposdescripcionpieza() == true) {
        var cbotipopieza = $("#cbotipopieza").val();
        var txtcodigo = $("#txtcodigo").val();
        var cbomarca = $("#cbomarca").val();
        var cbomodelo = $("#cbomodelo").val();
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../operaciones/guardardescripcionpieza.php", {
            cbotipopieza: cbotipopieza,
            txtcodigo:txtcodigo,
            cbomarca: cbomarca,
            cbomodelo: cbomodelo,
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



