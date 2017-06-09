$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


function disableMotor(){
	var monomotor = document.getElementById('monomotor');
	monomotor.disabled = true;
	monomotor.checked = false;

	var bimotor = document.getElementById('bimotor');

	bimotor.disabled = true;
	bimotor.checked = false;
}

function enableMotor(){
	document.getElementById('monomotor').disabled = false;
	document.getElementById('bimotor').disabled = false;
}

