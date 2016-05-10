function validateMail(email) {
	var ts = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})$/;
	return ts.test(email);
}

function enviarForm() {
	var v1 = false, v2 = false,
		v3 = false, v4 = false,
		v5 = false, v6 = false;
	
	if (!validateMail($("#correoE01").val()) || ($("#correoE01").val() !== $("#correoE02").val())) {								
		$("#Email01").attr("class", "form-group has-feedback has-error");
		$("#Email02").attr("class", "form-group has-feedback has-error");
		$("#email01").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email02").attr("class", "glyphicon glyphicon-remove form-control-feedback");
		$("#email03").attr("class", "text-center help-block");
		if ($("#correoE01").val() !== $("#correoE02").val()) {
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
	
	if (v1 && v2 && v3 && v4 && v5 && v6)
		$("#informe").submit();
	else {
		$(window).scrollTop(0);
		$("#error").modal();
	}
}