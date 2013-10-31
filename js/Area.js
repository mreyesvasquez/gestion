function NuevoArea() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdescripcion").value = "";
   
    document.getElementById("cboestado").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function CancelarArea() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdescripcion").value = "";
    document.getElementById("cboestado").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposArea() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtdescripcion").value;
    v3 = document.getElementById("cboestado").value;


    if (v1 == "" || v2 == "" || v3 == "") {
        return false;
    }
    else {
        return true;
    }
}
function GuardarArea() {
    if (verificarCamposArea() == true) {
        var txtdescripcion = $("#txtdescripcion").val();
        var txtcodigo = $("#txtcodigo").val();
        var cboestado = $("#cboestado").val();
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../Operaciones/GuardarArea.php", {
            txtdescripcion: txtdescripcion,
            txtcodigo: txtcodigo,
            cboestado: cboestado,
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

