function validate(email) {
	var ts = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/;
	return ts.test(email);
}

function enviarForm() {
	var v1 = false, v2 = false,
		v3 = false, v4 = false,
		v5 = false;
	
	var email = $("[name='correoE01']").val();

	if (!validate(email)) {
		$("#email03").text("El formato del campo correo es incorrecto");
		$("#Email01").attr("class", "form-group has-feedback has-error");
		$("#Email02").attr("class", "form-group has-feedback has-error");
		$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email03").attr("class", "text-center help-block");
	}
	else if (email !== $("[name='correoE02']").val()) {
		$("#Email01").attr("class", "form-group has-feedback has-error");
		$("#Email02").attr("class", "form-group has-feedback has-error");
		$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email03").attr("class", "text-center help-block");
		$("#email03").text("Correos proporcionados no coinciden");
	}
	else {
		$("#Email01").attr("class", "form-group has-feedback has-success");
		$("#Email02").attr("class", "form-group has-feedback has-success");
		$("#email01").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-ok form-control-feedback");
		$("#email03").attr("class", "hidden"); 
		v1 = true;
	}

	if ($("[name='departamento']").val() == -1){
		$("#Departamento").attr("class", "form-group has-feedback has-error");
		$("#depto01").removeClass("hidden");
		v2 = false;
	}
	else {
		$("#Departamento").attr("class", "form-group has-feedback has-success");
		$("#depto01").addClass("hidden");
		v2 = true;
	}

	if ($("[name='asunto']").val() == -1){
		$("#Asunto").attr("class", "form-group has-feedback has-error");
		$("#asunto01").removeClass("hidden");
		v3 = false;
	}
	else {
		$("#Asunto").attr("class", "form-group has-feedback has-success");
		$("#asunto01").addClass("hidden");
		v3 = true;
	}

	if ($("[name='comentarios']").val() == ""){
		$("#Comentarios").attr("class", "form-group has-feedback has-error");
		v4 = false;
	}
	else {
		$("#Comentarios").attr("class", "form-group has-feedback has-success");
		v4 = true;
	}

	if (grecaptcha.getResponse()) {
		$("#captcha").addClass("text-success");
		$("#captcha").removeClass("text-danger");
		v5 = true;
	}
	else {
		$("#captcha").addClass("text-danger");
		$("#captcha").removeClass("text-success");
		v5 = false;
	}

	if (v1 && v2 && v3 && v4 && v5)
		$("#informe").submit();
	else {
		$(window).scrollTop(0);
		$("#error").modal();
	}
}