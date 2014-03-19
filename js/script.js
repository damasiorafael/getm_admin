function showResponse(form){
	dados = $(form).serialize();
	$.ajax({
		url: "contato-envia.php",
		type: "post",
		data: dados,
		beforeSend: function(){
			$('.contato form input[type="submit"]').fadeOut();
			$('.ajax-loader-gif').fadeIn();
		},
		success: function(txt){
			if(txt == "success"){
				alert("Contato enviado com sucesso!");
				document.getElementById("form-contato").reset();
				$('.reload').trigger('click');
			} else {
				alert("Ocorreu um erro, por favor tente novamente!");
			}
		},
		error: function(jqXHR, textStatus, ex){
			console.log(textStatus + "," + ex + "," + jqXHR.responseText);
		},
		complete: function(){
			$('.ajax-loader-gif').fadeOut();
			$('.contato form input[type="submit"]').fadeIn();
		}
	});
}
$(document).ready(function(){ 
	
	/*FORMULÁRIO CONTATO*/
	$('#form-contato').validate({
		errorElement: "span",
		rules:{
			nome: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			departamento: {
				required: true
			},
			msg: {
				required: true
			}
		},
		messages: {
			nome: "Digite o nome",
			departamento: "Selecione o departamento",
			email: {required: "Digite o e-mail", email: "Digite um e-mail válido"},
			msg: "Digite a mensagem",
		},
		submitHandler: function(form) {
			$.ajax({
				url: "captcha-validate.php",
				type: "post",
				data: 'captchaAnswer='+$('#captchaAnswer').val(),
				success: function(txt){
					if(txt == "Success"){
						showResponse(form);
						return true;
					} else {
						alert('Digite o captcha corretamente');
						$('.reload').trigger('click');
						return false;
					}
				},
				error: function(jqXHR, textStatus, ex){
	        		console.log(textStatus + "," + ex + "," + jqXHR.responseText);
				}
			});
		}
	});

	/*CAPTCHA RELOAD*/
	$('.reload').click(function(e){
		e.preventDefault();
		var d = new Date();				            
        $('.img-captcha').attr('src', 'captcha.php?' + d.getTime());
	});

	/*FORMULÁRIO CONTATO MENSAGENS*/
	$('.fechar-msg, .mensagens-formulario').click(function(){
		$('.mensagens-formulario, .sucesso, .erro').hide();
	});

	/*SETAR LARGURA UL PÁGINA MÍDIA*/
	$('.carrosel-videos ul ').width(($('.carrosel-videos ul li').width() + 15) * $('.carrosel-videos ul li').size());

	/*SETAR ALTURA E LARGURA DIV PÁGINA MÍDIA E CONTATO*/
	$('.lightbox').height($(document).height());
	$('.lightbox').width($(document).width());
	$('.mensagens-formulario').height($('body').height());
	$('.mensagens-formulario').width($(document).width());
	$(window).resize(function(){
		$('.lightbox').height($(document).height());
		$('.lightbox').width($(document).width());
		$('.mensagens-formulario').height($('body').height());
		$('.mensagens-formulario').width($(document).width());
	});

	/*LIGHTBOX*/
	$('.lightbox').hide();
	$('.lateral ul li a').click(function(e){
		e.preventDefault();
		$('.lightbox').fadeIn("slow");
	});

	$('.lightbox').click(function(){
		$(this).fadeOut("slow");
	});

	$('.btn-fechar').click(function(){
		$('.lightbox').fadeOut("slow");
	});
});

