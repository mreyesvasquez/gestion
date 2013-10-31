

function irmodalpersonal()
{
    $("#modalpersonal").dialog("open");
}



function NuevoPersonal() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtdni").value = "";
    document.getElementById("txtnombres").value = "";
    document.getElementById("txtpaterno").value = "";
    document.getElementById("txtmaterno").value = "";
    document.getElementById("txtcelular").value = "";
    document.getElementById("txtemail").value = "";
    document.getElementById("cbosexo").value = "";
    document.getElementById("nacimiento").value = "";
    document.getElementById("cbocivil").value = "";
    document.getElementById("cbodepartamento").value = "";
    document.getElementById("cboprovincia").value = "";
    document.getElementById("cbodistrito").value = "";
    document.getElementById("txtdirec").value = "";
    document.getElementById("cbocargo").value = "";
    document.getElementById("cboareas").value = "";
    document.getElementById("cbosubareas").value = "";
    document.getElementById("id").value = "";

    document.getElementById("divEdit").style.display = "block";
    document.getElementById("divSave").style.display = "block";
    document.getElementById("divCancel").style.display = "block";
}
function CancelarPersonal() {
    document.getElementById("txttipo").value = "INS";
    document.getElementById("txtcodigo").value = "P";
    document.getElementById("txtdni").value = "";
    document.getElementById("txtnombres").value = "";
    document.getElementById("txtpaterno").value = "";
    document.getElementById("txtmaterno").value = "";
    document.getElementById("txtcelular").value = "";
    document.getElementById("txtemail").value = "";
    document.getElementById("cbosexo").value = "";
    document.getElementById("nacimiento").value = "";
    document.getElementById("cbocivil").value = "";
    document.getElementById("cbodepartamento").value = "";
    document.getElementById("cboprovincia").value = "";
    document.getElementById("cbodistrito").value = "";
    document.getElementById("txtdirec").value = "";
    document.getElementById("cbocargo").value = "";
    document.getElementById("cboareas").value = "";
    document.getElementById("cbosubareas").value = "";
    document.getElementById("id").value = "";
}
function verificarCamposPersonal() {
    v1 = document.getElementById("txttipo").value;

    v2 = document.getElementById("txtcodigo").value;  
    v3 = document.getElementById("txtdni").value;
    v4 = document.getElementById("txtnombres").value;
    v5 = document.getElementById("txtpaterno").value;
    v6 = document.getElementById("txtmaterno").value;
    v7 = document.getElementById("txtcelular").value;
    v8 = document.getElementById("txtemail").value;
    v9 = document.getElementById("cbosexo").value;
    v10 = document.getElementById("nacimiento").value;
    v11 = document.getElementById("cbocivil").value;
    v12 = document.getElementById("cbodepartamento").value;
    v13 = document.getElementById("cboprovincia").value;
    v14 = document.getElementById("cbodistrito").value;
    v15 = document.getElementById("txtdirec").value;
    v16 = document.getElementById("cboareas").value;
    v17 = document.getElementById("cbosubareas").value;
    v18 = document.getElementById("cbocargo").value;


    if (v2 == "" || v3 == "" || v4 == "" || v5 == "" || v6 == "" || v7 == "" || v8 == "" || v9 == "" || v10 == "" || v11 == "" || v12 == "" || v13 == "" || v14 == "" || v15 == "" || v16 == "" || v17 == "" || v18 == "") {
        return false;
    }
    else {
        return true;
    }
}
function GuardarPersonal() {
    if (verificarCamposPersonal() == true) {
        var txtcodigo = $("#txtcodigo").val();
        var txtdni = $("#txtdni").val();
        var txtnombres = $("#txtnombres").val();
        var txtpaterno = $("#txtpaterno").val();
        var txtmaterno = $("#txtmaterno").val();
        var txtcelular = $("#txtcelular").val();
        var txtemail = $("#txtemail").val();
        var cbosexo = $("#cbosexo").val();
        var nacimiento = $("#nacimiento").val();
        var cbocivil = $("#cbocivil").val();
        var cbodepartamento = $("#cbodepartamento").val();
        var cboprovincia = $("#cboprovincia").val();
        var cbodistrito = $("#cbodistrito").val();
        var txtdirec = $("#txtdirec").val();
        var cbocargo = $("#cbocargo").val();
        var cboareas = $("#cboareas").val();
        var cbosubareas = $("#cbosubareas").val();

        var txtid = $("#id").val();
        var tipo = $("#txttipo").val();

        $.post("../Operaciones/GuardarPersonal.php", {
            txtcodigo: txtcodigo,
            txtdni: txtdni,
            txtnombres: txtnombres,
            txtpaterno: txtpaterno,
            txtmaterno: txtmaterno,
            txtcelular:txtcelular,
            txtemail: txtemail,
            cbosexo: cbosexo,
            nacimiento: nacimiento,
            cbocivil: cbocivil,
            cbodepartamento: cbodepartamento,
            cboprovincia: cboprovincia,
            cbodistrito: cbodistrito,
            txtdirec: txtdirec,
            cbocargo:cbocargo,
            cboareas: cboareas,
            cbosubareas: cbosubareas,
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

