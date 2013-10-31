function NuevoUsuario() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtpersonal").value = "";
    document.getElementById("txtusuario").value = "";
    document.getElementById("txtclave").value = "";
    document.getElementById("cboestado").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function CancelarUsuario() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtpersonal").value = "";
    document.getElementById("txtusuario").value = "";
    document.getElementById("txtclave").value = "";
    document.getElementById("cboestado").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposUsuario() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtpersonal").value;
    v3 = document.getElementById("txtusuario").value;
    v4 = document.getElementById("txtclave").value;
    v5 = document.getElementById("cboestado").value;
    v6 = document.getElementById("cboperfil").value;

    if (v2 == "" || v3 == "" || v4 == "" || v5 == "" || v6 == "") {
        return false;
    }
    else {
        return true;
    }
}
function GuardarUsuario() {
    if (verificarCamposUsuario() == true) {
        
        var txtcodigo = $("#txtcodigo").val();
        var txtpersonalcodigo = $("#txtpersonalcodigo").val();
        var txtusuario = $("#txtusuario").val();
        var txtclave = $("#txtclave").val();
        var cboestado = $("#cboestado").val();
        var cboperfil = $("#cboperfil").val();
        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../Operaciones/GuardarUsuario.php", {
            txtcodigo: txtcodigo,
            txtpersonalcodigo:txtpersonalcodigo,
            txtusuario:txtusuario,
            txtclave:txtclave,
            cboestado:cboestado,
            cboperfil:cboperfil,
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
