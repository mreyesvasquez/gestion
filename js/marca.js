

function irmodalmarca()
{
    $("#modalmarca").dialog("open");
}



function nuevomarca() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdescripcion").value = "";
   
    document.getElementById("cbotipopieza").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function cancelarmarca() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtcodigo").value = "00" + codigo;

    document.getElementById("txtdescripcion").value = "";
    document.getElementById("cbotipopieza").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposmarca() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtdescripcion").value;
    v3 = document.getElementById("cbotipopieza").value;


    if (v1 == "" || v2 == "" || v3 == "") {
        return false;
    }
    else {
        return true;
    }
}
function guardarmarca() {
    if (verificarCamposmarca() == true) {
        var txtdescripcion = $("#txtdescripcion").val();
        var txtcodigo = $("#txtcodigo").val();
       
        var cbotipopieza = $("#cbotipopieza").val();
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../operaciones/guardarmarca.php", {
            txtdescripcion: txtdescripcion,
            txtcodigo: txtcodigo,
          
            cbotipopieza: cbotipopieza,
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




