

function irmodalmodelo()
{
    $("#modalmodelo").dialog("open");
}



function nuevomodelo() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdescripcion").value = "";
   
    document.getElementById("cbotipopieza").value = "";
    document.getElementById("cbomarca").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function cancelarmodelo() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtcodigo").value = "00" + codigo;

    document.getElementById("txtdescripcion").value = "";
    document.getElementById("cbotipopieza").value = "";
     document.getElementById("cbomarca").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposmodelo() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtdescripcion").value;
    v3 = document.getElementById("cbotipopieza").value;
      v4 = document.getElementById("cbomarca").value;


    if (v1 == "" || v2 == "" || v3 == ""|| v4 == "") {
        return false;
    }
    else {
        return true;
    }
}
function guardarmodelo() {
    if (verificarCamposmodelo() == true) {
        var txtdescripcion = $("#txtdescripcion").val();
        var txtcodigo = $("#txtcodigo").val();
       var cbotipopieza = $("#cbotipopieza").val();
        var cbomarca = $("#cbomarca").val();
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../operaciones/guardarmodelo.php", {
            txtdescripcion: txtdescripcion,
            txtcodigo: txtcodigo,
          
            cbotipopieza: cbotipopieza,
            cbomarca:cbomarca,
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




