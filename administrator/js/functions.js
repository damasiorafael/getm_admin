//SCRIPTS GERAIS DO SISTEMA ADMINISTRATIVO
/*
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<script src="js/morris/chart-data-morris.js"></script>
<script src="js/tablesorter/jquery.tablesorter.js"></script>
<script src="js/tablesorter/tables.js"></script>
*/

//FUNCAO PARA AVERIGUAR DETERMINADA CLASSE E RETORNAR TRUE OU FALSE
checkClass = function(elemento, classe){
	var el = elemento,
	cl = classe;
	if($(el).hasClass(cl)){
		return true;
	} else {
		return false;
	}
}

//FUNCAO PARA INCLUIR JAVASCRIPT VIA JQUERY DEPOIS DO DOM CARREGADO
incScript = function(elemento, url){
	var js 	= document.createElement('script');
	el 		= elemento;
	js.type	= 'text/javascript';
	js.src	= url;
	$(el).append(js);
}

//AJAX PARA MONTAR TABELA DE USUARIOS
montaUsers = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="6">Nenhum usuário cadastrado!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].nome+'</td>');
	                divItens.push('<td>'+json.items[i].username+'</td>');
	                divItens.push('<td>'+json.items[i].email+'</td>');
	                var lojista;
	                if(json.items[i].lojista == "1"){
	                	lojista = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	lojista = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+lojista+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirUser"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	//console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="6" class="al-center fa-2x">Nenhum usuário cadastrado!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE IMAGENS
montaImagens = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="6">Nenhum imagem cadastrada!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].nome+'</td>');
	                divItens.push('<td class="al-center"><img src="uploads/images/thumb_'+json.items[i].arquivo+'" /></td>');
	                var destaque;
	                if(json.items[i].destaque == "1"){
	                	destaque = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	destaque = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                var ativo;
	                if(json.items[i].ativo == "1"){
	                	ativo = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	ativo = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+destaque+'</td>');
	                divItens.push('<td class="al-center">'+ativo+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit-imagem ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirImagem"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	console.log(json);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="6" class="al-center fa-2x">Nenhuma imagem cadastrada!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE EMPRESAS
montaEmpresas = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="11">Nenhum empresa cadastrada!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].nome+'</td>');
					divItens.push('<td>'+json.items[i].endereco+'</td>');
					divItens.push('<td>'+json.items[i].fone+'</td>');
					divItens.push('<td>'+json.items[i].site+'</td>');
					divItens.push('<td>'+json.items[i].ramo_atividade+'</td>');
					divItens.push('<td class="al-center"><img src="uploads/images/thumb_'+json.items[i].arquivo+'" /></td>');
					divItens.push('<td>'+json.items[i].latitude+'</td>');
					divItens.push('<td>'+json.items[i].longitude+'</td>');
	                var ativo;
	                if(json.items[i].ativo == "1"){
	                	ativo = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	ativo = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+ativo+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit-empresa ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirEmpresa"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="11" class="al-center fa-2x">Nenhuma empresa cadastrada!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE FAQ
montaFaq = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="11">Nenhuma pergunta cadastrada!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].pergunta+'</td>');
					divItens.push('<td>'+json.items[i].resposta+'</td>');
	                var ativo;
	                if(json.items[i].ativo == "1"){
	                	ativo = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	ativo = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+ativo+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit-faq ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirFaq"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="11" class="al-center fa-2x">Nenhuma pergunta cadastrada!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE REDES SOCIAIS
montaSocials = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="11">Nenhuma rede cadastrada!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].nome+'</td>');
					divItens.push('<td><a style="color: #428BCA;" target="_blank" href="'+json.items[i].link+'" title="'+json.items[i].nome+'">'+json.items[i].link+'</a></td>');
	                var ativo;
	                if(json.items[i].ativo == "1"){
	                	ativo = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	ativo = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+ativo+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit-socials ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirSocials"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	//console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="11" class="al-center fa-2x">Nenhuma pergunta cadastrada!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE CONTATO
montaContato = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="11">Nenhum contato encontrado!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].nome+'</td>');
					divItens.push('<td>'+json.items[i].email+'</td>');
					divItens.push('<td>'+json.items[i].departamento+'</td>');
					divItens.push('<td>'+json.items[i].mensagem+'</td>');
	                var lido;
	                if(json.items[i].lido == "1"){
	                	lido = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	lido = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+lido+'</td>');
	                var respondido;
	                if(json.items[i].respondido == "1"){
	                	respondido = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	respondido = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+respondido+'</td>');
	                divItens.push('</tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	//console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="11" class="al-center fa-2x">Nenhum contato encontrado!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}

//AJAX PARA MONTAR TABELA DE VIDEOS
montaVideos = function(url, type){
	$.ajax({
		url: url,//?product_id='+$this.attr('rel'),
		data: { key : type},
		dataType: 'jsonp',
		crossDomain: false,
		jsonp: false,
		jsonpCallback: 'json',
		cache: true,
		success: function(json){
			var divItens = [],
			i,
			l = json.items.length;
			if(l < 1){
				divItens.push('<tbody><tr><td colspan="11">Nenhum vídeo cadastrado!</td></tr></tbody>');
			} else {
				divItens.push('<tbody>');
				for(i = 0; i < l; i++){
					divItens.push('<tr class="'+json.items[i].id+'"><td class="al-center">'+json.items[i].id+'</td>');
					divItens.push('<td>'+json.items[i].titulo+'</td>');
					divItens.push('<td>'+json.items[i].resumo+'</td>');
					divItens.push('<td>'+json.items[i].link+'</td>');
	                var ativo;
	                if(json.items[i].ativo == "1"){
	                	ativo = '<i class="fa fa-check fa-1x icon-lojista-green"></i>'
	                } else {
	                	ativo = '<i class="fa fa-times fa-1x icon-lojista-red"></i>'
	                }
	                divItens.push('<td class="al-center">'+ativo+'</td>');
	                divItens.push('<td class="al-center">');
	                divItens.push('<a href="#" class="btn btn-default btn-success btn-ajax-edit-videos ajax-edit-'+json.items[i].id+'"><span class="fa fa-edit"></span> Editar</a>');
	                divItens.push('<a href="#" class="btn btn-default btn-danger btn-ajax-trash ajax-trash-'+json.items[i].id+'" rel="excluirSocials"><span class="fa fa-trash-o"></span> Excluir</a>');
	                divItens.push('</td></tr>');
				}
				divItens.push('</tbody>');
			}
			$('.table-users thead').after(divItens.join(''));
		},
		error: function(jqXHR, textStatus, ex) {
        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
        	var divItens = [];
        	divItens.push('<tbody><tr><td colspan="11" class="al-center fa-2x">Nenhum vídeo cadastrado!</td></tr></tbody>');
        	$('.table-users thead').after(divItens.join(''));
    	}
	});
}


//AJAX DE ENVIO DE FORMULARIO
enviaForm = function(el, url, acao){
	var queryString = $(el).serialize(),
	dados 			= queryString;
	$.ajax({
		url: url,
		type: 'post',
		data: dados,
		success: function(txt){
			if(txt == 'success'){
				alert('Dados salvos com sucesso!');
				//console.log(txt);
				window.location=window.location;
			} else if(txt == 'error'){
				alert('Ocorreu um erro, por favor tente novamente!');
			} else {
				alert(txt);
			}
			$(el).parent().parent().fadeOut();
			return false;
		},
		error: function(jqXHR, textStatus, ex){
        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
    	}
	});
	return false;
}

//ESCOLHE QUAL TIPO DE AJAX DEVO CHAMAR
chamaAjax = function(url, type){
	var t 	= type,
	u 		= url;
	switch(t){
		case "users":
			montaUsers(u, t);
			break;
		case "imagens":
			montaImagens(u, t);
			break;
		case "empresas":
			montaEmpresas(u, t);
			break;
		case "faq":
			montaFaq(u, t);
			break;
		case "socials":
			montaSocials(u, t);
			break;
		case "contato":
			montaContato(u, t);
			break;
		case "videos":
			montaVideos(u, t);
			break;
	}
}

//AJUSTA TAMANHO DO ELEMENTO PARA FICAR IGUAL AO PARENT (USADO MUITO EM OVERLAYS DINAMICOS)
heightParent = function(el){
	$(el).each(function(){
		var $this = $(this);
		$this.height($this.parent().height());
	});
}

//COLOCAR MARGIN NEGATIVA PARA ALINHAR NO CENTRO HORIZONTAL
marginLeftAbsolute =function(el){
	$(el).each(function(){
		var $this = $(this);
		$(el).css({
		    'margin-left' : ($this.width()/2)*(-1)
		});
	});
}