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
				success: function (txt) {
					if(txt == "Success"){
						setTimeout(function(){
							form.submit();
						},3000)
						
						$('.mensagens-formulario').show();
						$('.sucesso').show();
					} else { 
						$('.mensagens-formulario').show();
						$('.erro').show();
					}
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
	$('.lightbox').height($('body').height());
	$('.lightbox').width($(document).width());
	$('.mensagens-formulario').height($('body').height());
	$('.mensagens-formulario').width($(document).width());
	$(window).resize(function(){
		$('.lightbox').height($('body').height());
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

