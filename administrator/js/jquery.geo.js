/*!
 * jQuery Geo Plugin
 * version: 0.1
 * Requires jQuery v1.5 or later
 * Copyright (c) 2014 Damasio Rafael
 */
/* ESSE PLUGIN FAZ UMA INTEGRACAO COM UM JSONP DE ESTADOS E CIDADES E MONTA OS OPTIONS DE CIDADES DE ACORDO COM O ESTADO ESCOLHIDO */
(function($){
	$.fn.geo = function(settings) {
		var config = {
			'estado': '',
			'json' : 'json/json_estados.php'
		};
		if(settings){
			$.extend(config, settings);
		}
		var insertOptions = this;
		return this.each(function(){
			$.ajax({
				url: config.json,//?product_id='+$this.attr('rel'),
				data: { key : config.estado},
				dataType: 'json',
				success: function(json){
					//code case success
					var optionCities = [], //CRIA UM ARRAY PRA CONTROLE DO JSON
					i, //VARIAVEL DE CONTROLE PRA ITERACAO
					l = json.length; //TAMANHO DO JSON RETORNADO
					if(l < 1){ //SE O JSON VIER COM 0(ZERO) RESGISTRO
						optionCities.push('<option value=""> -- Erro - Tente novamente! -- </option>');
					} else { //SE O JSON VIER COM 1(UM) OU MAIS REGISTROS
						optionCities.push('<option value=""> -- Selecione -- </option>');
						for(i = 0; i < l; i++){
							optionCities.push('<option value="'+json[i].id+'">'+json[i].nome+' - '+json[i].uf+'</option>');
						}
					}
					insertOptions.html(optionCities.join(''));
				},
				error: function(jqXHR, textStatus, ex){
					//code case error
					insertOptions.html('<option value=""> -- Erro - Tente novamente! -- </option>');
					//console.log(textStatus + "," + ex + "," + jqXHR.responseText);
				}
			});
		});
	};
})(jQuery);