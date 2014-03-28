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

function splitLinkVideo(urlVideo){
	video = urlVideo.split('v=');
	video = video[1].split('&');
	video = video[0];
    return video;
}

function capturaPrimeiroVideo(){
	linkVideo = $('.carrosel-videos ul li:nth-child(1) a').attr('href');
	//console.log(linkVideo);
	var myFrame = document.createElement("iframe");
	myFrame.width = 573;
	myFrame.height = 410;
	myFrame.src = "//www.youtube.com/embed/"+splitLinkVideo(linkVideo);
	myFrame.frameborder = 0;
	myFrame.allowfullscreen = true;
	
	$('.iframe-video').html(myFrame);
}

function abreVideoFrame(urlVideo, typeOpen){
	if(typeOpen == "iframe"){
		//console.log(splitLinkVideo(urlVideo));
		var myFrame = document.createElement("iframe");
		myFrame.width = 640;
		myFrame.height = 480;
		myFrame.src = "//www.youtube.com/embed/"+splitLinkVideo(urlVideo);
		myFrame.frameborder = 0;
		myFrame.allowfullscreen = true;
		
		$('.container-lightbox').html('')
		$('.container-lightbox').append(myFrame);
		
		$('.lightbox').fadeIn("slow");
	} else if(typeOpen == "div"){
		$('.iframe-video').html('<div class="load-video"></div>');
		var myFrame = document.createElement("iframe");
		myFrame.width = 573;
		myFrame.height = 410;
		myFrame.src = "//www.youtube.com/embed/"+splitLinkVideo(urlVideo);
		myFrame.frameborder = 0;
		myFrame.allowfullscreen = true;
		setTimeout(function(){
			$('.iframe-video').html(myFrame);
		}, 500);
	}
}

$(document).ready(function(){ 
	/*$('#form-busca-empresa').validate({
		submitHandler: function(form) {
			$.ajax({
				url: "json/json_empresas.php",
				type: "post",
				data: form.serialize(),
				success: function(json){
					//
				},
				error: function(jqXHR, textStatus, ex){
					console.log(textStatus + "," + ex + "," + jqXHR.responseText);
				}
			});
		}
	});*/
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
	$('.thumb-video').on('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		var $this = $(this),
		typeOpen = $this.attr('rel'),
		urlVideo = $this.attr('href');
		
		abreVideoFrame(urlVideo, typeOpen);
	});
	$('.lightbox').hide();
	$('.lateral ul li a').click(function(e){
		e.preventDefault();
		//$('.lightbox').fadeIn("slow");
	});

	$('.lightbox').click(function(){
		$(this).fadeOut("slow");
	});

	$('.btn-fechar').click(function(){
		$('.lightbox').fadeOut("slow");
	});
	
	capturaPrimeiroVideo();
	
	function mapaGoogle(lat, long, el){
		var map;
		var latlng = new google.maps.LatLng(lat, long);
		var options = {
			zoom: 5,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		map = new google.maps.Map(el, options);
		return map;
	}
});

$('#selEstado').geo({
	'json' : 'administrator/json/json_estados.php'
});

$('#selEstado').on('change', function(e){
	var estado = $("option:selected", this).val();
	$('#selCidade').geo({
		'estado': estado,
		'json' : 'administrator/json/json_estados.php' 
	});
});