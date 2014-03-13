// *********************************************
//                  BANNER
// *********************************************

$(document).ready(function(){ 
// 	function mudaImg(index){
// 		imgAtiva = $('.wrapper-banner li.ativo').index();
// 		$('.wrapper-banner li').removeClass('ativo'); 
// 		$('.wrapper-banner li').fadeOut(500);

// 		if(index != null){
// 			$('.wrapper-banner li').eq(index).addClass('ativo');
// 			$('.wrapper-banner li').eq(index).fadeIn(1000);
// 		} else {
// 			if(imgAtiva+1 >= $('.wrapper-banner li').size()){
// 				$('.wrapper-banner li').eq(0).addClass('ativo');
// 				$('.wrapper-banner li').eq(0).fadeIn(1000);
// 			} else {
// 				$('.wrapper-banner li').eq(imgAtiva+1).addClass('ativo'); 
// 				$('.wrapper-banner li').eq(imgAtiva+1).fadeIn(1000);
// 			}
// 		}
// 	}

// 	function mudaBanner(index){
// 		thumbAtivo = $('.wrapper-thumb a.thbAtivo').index();
// 		if(index != null){
// 			$('.wrapper-thumb a').removeClass('thbAtivo');
// 			$('.wrapper-thumb a').eq(index).addClass('thbAtivo');
// 				mudaImg(index);
// 		} else {
// 			if($('.wrapper-thumb a').hasClass('thbAtivo')){
// 				$('.wrapper-thumb a').removeClass('thbAtivo');
// 				if(thumbAtivo+1 >= $('.wrapper-thumb a').size()){
// 					$('.wrapper-thumb a').eq(0).addClass('thbAtivo');
// 				} else {
// 					$('.wrapper-thumb a').eq(thumbAtivo+1).addClass('thbAtivo');
// 				}
// 			}
// 			mudaImg();
// 		}
// 		clearInterval(slideAuto);
// 		slideAuto = setInterval(function(){
// 			mudaBanner();
// 		}, 3000);
// 	} 

// 	$('.wrapper-thumb li').click(function(event){
// 		event.preventDefault();
// 		var x = $(this),
// 		indice = x.index();
// 		mudaBanner(indice);
// 	});
// 	//$('.wrapper-banner li').fadeOut(1000);
// 	$('.wrapper-thumb a').eq(0).addClass('thbAtivo');
// 	$(".wrapper-banner > ul > li:gt(0)").hide();
// 	$('.wrapper-banner li').eq(0).addClass('ativo').fadeIn(1000, function(){
// 		slideAuto = setInterval(function(){
// 			mudaBanner();
// 		}, 3000); 
// 	});
	
	
	/*MASCARA TELEFONE*/
	// $('#tel').focusout(function(){
	// 	var phone, element;
	// 	element = $(this);
	// 	element.unmask();
	// 	phone = element.val().replace(/\D/g, '');
	// 	if(phone.length > 10) {
	// 		element.mask("(99) 99999-999?9");
	// 	} else {
	// 		element.mask("(99) 9999-9999?9");
	// 	}
	// }).trigger('focusout');

	
	
});

