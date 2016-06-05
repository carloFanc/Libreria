$(document).ready(function(e) {
	$("#registra").on('submit', (function(e) {
		e.preventDefault();
		
				var postForm = {
					'name' : $('input[name=form-first-name]').val(),
					'surname' : $('input[name=form-last-name]').val(),
					'mail' : $('input[name=form-email]').val(),
					'pass' : $('input[name=form-pass]').val(),
					'luogo' : $('input[name=form-luogo]').val(),
					'tel' : $('input[name=form-tel]').val()
				};
				$.ajax({
					type : 'POST',
					url : '/Libreria/functions/InsSignUp.php',
					data : postForm,

					success : function(data) {
						if (data == 'ok') {
							BootstrapDialog.show({
								title : 'Registrazione effettuata',
								message : 'Sei stato registrato correttamente',
								buttons : [{
									label : 'Ok',
									action : function(dialog) {

										window.location.href = "index.php";
									}
								}]
							});
						} else {
							BootstrapDialog.show({
								title : 'Registrazione BLOCCATA',
								message : 'Email gia registrata!',
								buttons : [{
									label : 'Chiudi',
									action : function(dialog) {
										dialog.close();
									}
								}]
							});

						}

					}
				});
			
	}));
});
