function validate(email) {
	var ts = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/;
	return ts.test(email);
}

function valname(name) {
	var ts = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
	return ts.test(name);
}

function valphone(phone) {
	var ts = /^[0-9]{8,15}$/;
	return ts.test(phone);
}

function enviarForm() {
	var vn = false, vm = false, vcap = false, vt = false, vs = false, vcb = false;
	var vda = false, vfe = false;
	if (!validate($("#correoE01").val()) || ($("#correoE01").val() !== $("#correoE02").val())) {								
		$("#Email01").attr("class", "form-group has-feedback has-error");
		$("#Email02").attr("class", "form-group has-feedback has-error");
		$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email03").attr("class", "text-center help-block");
		if (!validate($("#correoE01").val())) {
			$("#email03").text("El formato del campo correo es incorrecto");
		}
		else if ($("#correoE01").val() !== $("#correoE02").val()) {
			$("#email03").text("Correos proporcionados no coinciden");
		}
		vm = false;
	}
	else {
		$("#Email01").attr("class", "form-group has-feedback has-success");
		$("#Email02").attr("class", "form-group has-feedback has-success");
		$("#email01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#email03").attr("class", "hidden"); 
		vm = true;
	}

	if (!valname($("#nombre").val()) || !valname($("#appat").val()) || !valname($("#apmat").val())) {
		if (valname($("#nombre").val())) {
			$("#Nombre").attr("class", "form-group has-feedback has-success");
			$("#name01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		}
		else {
			$("#Nombre").attr("class", "form-group has-feedback has-error");
			$("#name01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		}

		if (valname($("#appat").val())) {
			$("#ApellidoP").attr("class", "form-group has-feedback has-success");
			$("#app01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		}
		else {
			$("#ApellidoP").attr("class", "form-group has-feedback has-error");
			$("#app01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		}

		if (valname($("#apmat").val())) {
			$("#ApellidoM").attr("class", "form-group has-feedback has-success");
			$("#apm01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		}
		else {
			$("#ApellidoM").attr("class", "form-group has-feedback has-error");								
			$("#apm01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		}

		$("#apm02").attr("class", "text-center help-block");
		$("#apm02").text("El formato del campo nombre o apellido son incorrectos");
		vn = false;
	}
	else {
		$("#Nombre").attr("class", "form-group has-feedback has-success");
		$("#name01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#ApellidoP").attr("class", "form-group has-feedback has-success");
		$("#app01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#ApellidoM").attr("class", "form-group has-feedback has-success");								
		$("#apm01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#apm02").attr("class", "hidden text-center help-block"); 
		vn = true;
	}

	if (!valphone($("#telefono").val())) {
		$("#Telefono").attr("class", "form-group has-feedback has-error");
		$("#phone01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#phone02").attr("class", "text-center help-block");
		vt = false;
	}
	else {
		$("#Telefono").attr("class", "form-group has-feedback has-success");
		$("#phone01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#phone02").attr("class", "hidden text-center help-block");
		vt = true;
	}

	if ($("#asunto").val() === "") {
		$("#Asunto").attr("class", "form-group has-feedback has-error");
		$("#sub01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#sub02").removeClass("hidden");
		$("#sub02").text("El formato del campo asunto es incorrecto");
		vs = false;
	}
	else {
		$("#Asunto").attr("class", "form-group has-feedback has-success");
		$("#sub01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#sub02").addClass("hidden");
		vs = true;
	}

	if (grecaptcha.getResponse()) {
		$("#recaptcha").addClass("text-success");
		$("#recaptcha").removeClass("text-danger");
		vcap = true;
	}
	else {
		$("#recaptcha").addClass("text-danger");
		$("#recaptcha").removeClass("text-success");
		vcap = false;
	}

	if ($("#date01").val()) {
		$("#fecha").removeClass("has-error");
		$("#fecha").addClass("has-success");
		$("#fecha02").addClass("hidden");
		vfe = true;		
	}
	else {
		$("#fecha").removeClass("has-success");
		$("#fecha").addClass("has-error");
		$("#fecha02").text("Por favor seleccione una opción en este campo");
		$("#fecha02").removeClass("hidden");
		vfe = false;
	}

	if ($(".hora01:checkbox:checked").length > 0) {
		$("#checkboxes01").removeClass("has-error");
		$("#checkboxes01").addClass("has-success");
		$("#hora02").addClass("hidden");
		vcb = true;		
	}
	else {
		$("#checkboxes01").removeClass("has-success");
		$("#checkboxes01").addClass("has-error");
		$("#hora02").removeClass("hidden");
		$("#hora02").text("Por favor seleccione una opción en este campo");
		vcb = false;
	}

	if ($("[name='departamento']").val() == -1){
		$("#Departamento").attr("class", "form-group has-feedback has-error");
		$("#depto01").removeClass("hidden");
		vda = false;
	}
	else {
		$("#Departamento").attr("class", "form-group has-feedback has-success");
		$("#depto01").addClass("hidden");
	}

	if ($("[name='area']").val() == -1) {
		$("#Area").attr("class", "form-group has-feedback has-error");
		$("#area01").removeClass("hidden");
		vda = false;
	}
	else {
		$("#Area").attr("class", "form-group has-feedback has-success");
		$("#area01").addClass("hidden");
		vda = true;
	}

	if (vcap && vm && vn && vs && vt && vcb && vda && vfe) {
		$(window).scrollTop(0);
		$('#process').modal();
		$("#formCita").submit();
	}
	else {
		$(window).scrollTop(0);
		$("#error").modal();		
	}

}

$("#date01").focus(function() {
	$("#datet1").data("DateTimePicker").show();
});