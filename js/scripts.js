(function($) {
    $(document).ready(function() {
        $("a.pagos").addClass("active");
        $(".obj").click(function() {
            $('.obj').removeClass('active');
            $(this).toggleClass('active');
        });
        var complete = 0;
        $("#completar").click(function() {
            if (complete == 0) {
                $("#frmDatos").find(':input.obj').each(function() {
                    obj = $(this);
                    var data = obj.attr("data-plan");
                    obj.val(data);

                });
                complete = 1;
            } else if (complete == 1) {
                $("#frmDatos").find(':input.obj').each(function() {
                    obj = $(this);
                    obj.val("");
                });
                complete = 0;
            }

        });

        $(".cerrar").click(function() {
            $("#anonymous-user").removeClass("active");
        });

    });
})(jQuery);

var ck_CC = /^[1-9]\d{6,8}\-?\d?$/;
var ck_CE = /^[a-zA-Z]*[1-9]\d{3,7}$/;
var ck_NIT = /^\d{3}\-?\d{2}\-?\d{4}$/;

var ck_name = /^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,20}$/;
var ck_surname = /^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,40}$/;

var ck_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
var ck_mobile = /^[0-9]{1,10}$/;
var ck_ciudad = /^[A-Za-z ñÑáéíóúÁÉÍÓÚ]{3,40}$/;
var ck_direccion = /^[A-Za-z 0-9 #-]{3,40}$/;


function validate(form) {

    var name = form.name.value;
    var surname = form.surname.value;
    var email = form.email.value;
    var documenttype = form.documenttype.value;
    var plan = form.plan.value;
    var documents = form.document.value;
    var mobile = form.mobile.value;
    var ciudad = form.ciudad.value;
    var direccion = form.direccion.value;
    var errors = [];

    if (documenttype == "CC") {
        if (!ck_CC.test(documents)) {
            errors[errors.length] = "El documento de identificación no es valido.<br>";
        }
    } else if (documenttype == "CE") {
        if (!ck_CE.test(documents)) {
            errors[errors.length] = "El documento de identificación no es valido.<br>";
        }
    } else if (documenttype == "NIT") {
        if (!ck_NIT.test(documents)) {
            errors[errors.length] = "El documento de identificación no es valido.<br>";
        }
    }

    if (!ck_name.test(name)) {
        errors[errors.length] = "El Nombre ingresado no es valido.<br>";
    }
    if (!ck_surname.test(surname)) {
        errors[errors.length] = "Los Apellidos ingresados no son validos.<br>";
    }

    if (!ck_mobile.test(mobile)) {
        errors[errors.length] = "El Número de celular ingresado no es valido.<br>";
    }

    if (!ck_email.test(email)) {
        errors[errors.length] = "El Email ingresado no es valido.<br>";
    }
    if (documenttype == 0) {
        errors[errors.length] = "Seleccione un tipo de Documento de identificación.<br>";
    }
    if (!ck_direccion.test(direccion)) {
        errors[errors.length] = "La dirección ingresada no es valida.<br>";
    }
    if (!ck_ciudad.test(ciudad)) {
        errors[errors.length] = "La ciudad ingresada no es valida.<br>";
    }
    if (errors.length > 0) {
        reportErrors(errors);
        return false;
    }
    $("input#save-info").val('COMPRA EN PROCESO ...');
    $("input#save-info").attr('disabled', true);
    $("input#save-info").addClass('disabled');
    return true;
}

function reportErrors(errors) {
    var msg = "Los siguientes campos tienen datos erroneos o incompletos ...<br><br>";
    for (var i = 0; i < errors.length; i++) {
        var numError = i + 1;
        msg += "\n" + numError + ". " + errors[i];
    }
    $("#anonymous-user div h3").html(msg);
    $("#anonymous-user").addClass("active");
}