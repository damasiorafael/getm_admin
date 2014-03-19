//VARIAVEIS GLOBAIS
var thisUrl = window.location;
//console.log(thisUrl);
var subFolder = (thisUrl.origin.match('localhost')) ? "/getm_admin" : "";

if(checkClass('body', 'users')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'users');
}

if(checkClass('body', 'imagens')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'imagens');
}

if(checkClass('body', 'empresas')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'empresas');
}

if(checkClass('body', 'faq')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'faq');
}

if(checkClass('body', 'socials')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'socials');
}

if(checkClass('body', 'contato')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'contato');
}

if(checkClass('body', 'videos')){
	chamaAjax(thisUrl.origin+subFolder+'/administrator/json/json.php', 'videos');
}

if(checkClass('body', 'table-sorter')){
	incScript('head', 'js/tablesorter/jquery.tablesorter.js');
	incScript('head', 'js/tablesorter/tables.js');
}

if(checkClass('form', 'form-validate')){
	incScript('head', 'js/jquery.validate.min.js');
	incScript('head', 'js/jquery.maskedinput.min.js');
	incScript('head', 'js/jquery.form.js');
}

if($('#fone')[0]){
	//$('#fone').mask('(99) 9999-9999');
	$('#fone').mask("(99) 9999-9999?9").ready(function(event){
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;	
        phone = target.value;
        element = $(target);
        element.unmask();
        if(phone.length > 10) {
            element.mask("(99) 9999-9999?9");
        } else {
            element.mask("(99) 9999-9999");
        }
    });
}

overlayLoad = function(){
	heightParent('.el-overlay');
	marginLeftAbsolute('.progress-bar-form');
	marginLeftAbsolute('.progress-bar-form .progress-bar');
}

$('.btn-ajax-edit').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var $this = $(this);
	idSeleciona 		= $this.attr('class').split(' ')[4].split('-')[2];
	editaUserId 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(1)').text();
	editaUserUsuario 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(2)').text();
	editaUserUsername 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(3)').text();
	editaUserEmail	 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(4)').text();
	$('.col-add-edit > h2').text('Editar Usuário')
	$('#formEditUser input#acao').val('editaUser');
	$('#formEditUser input#id').val(editaUserId);
	$('#formEditUser input#nome').val(editaUserUsuario);
	$('#formEditUser input#username').val(editaUserUsername);
	$('#formEditUser input#email').val(editaUserEmail);
	$('.form-group-lojista').fadeOut();
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-add').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar Usuário')
	$('#formEditUser input#acao').val('addUser');
	$('#formEditUser input#id').val('');
	$('#formEditUser input#nome').val('');
	$('#formEditUser input#username').val('');
	$('#formEditUser input#email').val('');
	$('.form-group-lojista').fadeIn();
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-edit-imagem').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var $this = $(this);
	idSeleciona 		= $this.attr('class').split(' ')[4].split('-')[2];
	editaImagemId 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(1)').text();
	editaNomeImagem 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(2)').text();
	editaArquivoImagem 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(3)').html();
	editaImagemDestaque	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(4)');
	editaImagemAtivo	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(5)').html();
	
	$('.col-add-edit > h2').text('Editar Imagem')
	$('#formEditImagem input#acao').val('editaImagem');

	$('#formEditImagem input#id').val(editaImagemId);
	$('#formEditImagem input#nome').val(editaNomeImagem);
	//$('#formEditImagem input#arquivo').val(editaUserUsuario);
	$('#formEditImagem input#editarArquivo').attr('checked', 'checked');
	if($(editaImagemDestaque).find('i').attr('class').match('icon-lojista-green')){
		$('#formEditImagem input#destaque').attr('checked', 'checked');
	} else {
		$('#formEditImagem input#destaque').removeAttr('checked');
	}
	if($(editaImagemAtivo).hasClass('icon-lojista-green')){
		$('#formEditImagem input#ativo').attr('checked', 'checked');
	} else {
		$('#formEditImagem input#ativo').removeAttr('checked');
	}
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-edit-empresa').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var $this = $(this);
	idSeleciona 			= $this.attr('class').split(' ')[4].split('-')[2];
	editaEmpresaId 			= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(1)').text();
	editaNomeEmpresa 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(2)').text();
	editaEnderecoEmpresa 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(3)').text();
	editaFoneEmpresa 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(4)').text();
	editaSiteEmpresa 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(5)').text();
	editaRamoEmpresa 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(6)').text();
	editaLatitudeEmpresa 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(8)').text();
	editaLongitudeEmpresa	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(9)').text();
	editaEmpresaAtivo		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(10)').html();
	
	$('.col-add-edit > h2').text('Editar Empresa')
	$('#formEditEmpresa input#acao').val('editaEmpresa');

	$('#formEditEmpresa input#id').val(editaEmpresaId);
	$('#formEditEmpresa input#nome').val(editaNomeEmpresa);
	$('#formEditEmpresa input#endereco').val(editaEnderecoEmpresa);
	$('#formEditEmpresa input#fone').val(editaFoneEmpresa);
	$('#formEditEmpresa input#site').val(editaSiteEmpresa);
	$('#formEditEmpresa input#ramo_atividade').val(editaRamoEmpresa);
	$('#formEditEmpresa input#latitude').val(editaLatitudeEmpresa);
	$('#formEditEmpresa input#longitude').val(editaLongitudeEmpresa);
	//$('#formEditEmpresa input#arquivo').val(editaUserUsuario);
	$('#formEditEmpresa input#editarArquivo').attr('checked', 'checked');
	
	if($(editaEmpresaAtivo).hasClass('icon-lojista-green')){
		$('#formEditEmpresa input#ativo').attr('checked', 'checked');
	} else {
		$('#formEditEmpresa input#ativo').removeAttr('checked');
	}
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-edit-faq').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var $this = $(this);
	idSeleciona 	= $this.attr('class').split(' ')[4].split('-')[2];
	editaFaqId 		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(1)').text();
	editaPergunta 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(2)').text();
	editaResposta 	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(3)').text();
	editaFaqAtivo	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(4)').html();
	
	$('.col-add-edit > h2').text('Editar FAQ')
	$('#formEditFaq input#acao').val('editaFaq');

	$('#formEditFaq input#id').val(editaFaqId);
	$('#formEditFaq input#pergunta').val(editaPergunta);
	$('#formEditFaq textarea#resposta').val(editaResposta);
	
	if($(editaFaqAtivo).hasClass('icon-lojista-green')){
		$('#formEditFaq input#ativo').attr('checked', 'checked');
	} else {
		$('#formEditFaq input#ativo').removeAttr('checked');
	}
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-edit-socials').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var $this = $(this);
	idSeleciona 		= $this.attr('class').split(' ')[4].split('-')[2];
	editaSocialId		= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(1)').text();
	editaNome 			= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(2)').text();
	editaLink 			= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(3)').text();
	editaSocialAtivo	= $('.table-users').find('tr.'+idSeleciona).find('td:nth-child(4)').html();
	
	$('.col-add-edit > h2').text('Editar Rede Social')
	$('#formEditSocials input#acao').val('editaSocials');

	$('#formEditSocials input#id').val(idSeleciona);
	$('#formEditSocials input#nome').val(editaNome);
	$('#formEditSocials input#link').val(editaLink);
	
	if($(editaSocialAtivo).hasClass('icon-lojista-green')){
		$('#formEditSocials input#ativo').attr('checked', 'checked');
	} else {
		$('#formEditSocials input#ativo').removeAttr('checked');
	}
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-add-imagem').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar Imagem')
	$('#formEditImagem input#acao').val('addImagem');
	$('#formEditImagem input#id').val('');
	$('#formEditImagem input#nome').val('');
	$('#formEditImagem input#destaque').removeAttr('checked');
	$('#formEditImagem input#ativo').attr('checked', 'checked');
	$('.col-add-edit').fadeIn();
	$('.form-group-edit-imagem').fadeOut();
});

$('.btn-ajax-add-empresa').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar Empresa')
	$('#formEditEmpresa input#acao').val('addEmpresa');
	$('#formEditEmpresa input#id').val('');
	$('#formEditEmpresa input#nome').val('');
	$('#formEditEmpresa input#endereco').val('');
	$('#formEditEmpresa input#fone').val('');
	$('#formEditEmpresa input#site').val('');
	$('#formEditEmpresa input#ramo_atividade').val('');
	$('#formEditEmpresa input#latitude').val('');
	$('#formEditEmpresa input#longitude').val('');
	$('#formEditEmpresa input#ativo').attr('checked', 'checked');
	$('.col-add-edit').fadeIn();
	$('.form-group-edit-imagem').fadeOut();
});

$('.btn-ajax-add-faq').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar FAQ')
	$('#formEditFaq input#acao').val('addFaq');
	$('#formEditFaq input#id').val('');
	$('#formEditFaq input#pergunta').val('');
	$('#formEditFaq textarea#reposta').val('');
	$('#formEditFaq input#ativo').attr('checked', 'checked');
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-add-socials').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar Rede Social')
	$('#formEditSocials input#acao').val('addSocials');
	$('#formEditSocials input#id').val('');
	$('#formEditSocials input#nome').val('');
	$('#formEditSocials textarea#link').val('');
	$('#formEditSocials input#ativo').attr('checked', 'checked');
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-add-videos').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit > h2').text('Adicionar Vídeo')
	$('#formEditSocials input#acao').val('addVideos');
	$('#formEditSocials input#id').val('');
	$('#formEditSocials input#titulo').val('');
	$('#formEditSocials textarea#resumo').val('');
	$('#formEditSocials textarea#link').val('');
	$('#formEditSocials input#ativo').attr('checked', 'checked');
	$('.col-add-edit').fadeIn();
});

$('.btn-ajax-trash').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var r = confirm("Tem certeza que deseja excluir esse registro?");
	if (r == true) {
  		var $this = $(this),
		idExclui = $this.parent().parent().attr('class'),
		acao = $this.attr('rel'),
		dados = 'id='+idExclui+'&acao='+acao;
		$.ajax({
			url: "form-envia.php",
			type: 'post',
			data: dados,
			success: function(txt){
				if(txt == 'success'){
					alert('Registro excluído com sucesso!');
					window.location=window.location;
				} else if(txt == 'error'){
					alert('Ocorreu um erro, por favor tente novamente!');
				} else {
					alert(txt);
				}
			},
			error: function(jqXHR, textStatus, ex){
	        	//console.log(textStatus + "," + ex + "," + jqXHR.responseText);
	    	}
		});
  	} else {
  		return false;
  	}
});

$('.btn-cancela').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	$('.col-add-edit').fadeOut();
});

//function to check file size before uploading.
function beforeSubmit(form){
	$(form).parent().parent().find('.el-overlay').fadeIn();
	overlayLoad();
    //check whether browser fully supports all File API
	if(window.File && window.FileReader && window.FileList && window.Blob){
   		if(!$('#arquivo').val()){//check empty input filed
            //$("#output").html("Are you kidding me?");
            return false;
        }

        var fsize = $('#arquivo')[0].files[0].size;//get file size
        var ftype = $('#arquivo')[0].files[0].type;//get file type

        //allow only valid image file types 
        switch(ftype){
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                alert("Arquivo inválido, tente novamente!");
            	return false;
        }
        
        //Allowed file size is less than 1 MB (1048576)
        if(fsize>1048576){
            alert("Tamanho máximo do arquivo não deve ultrapassar 1MB");
            return false;
        }
    } else {
        //Output error to older unsupported browsers that doesn't support HTML5 File API
        alert("Navegador deve ser atualizado!")
        return false;
    }
}

function showResponse(responseText, statusText, xhr, $form){
	if(responseText == "success"){
		alert("Dados salvos com sucesso!");
		window.location = window.location;
	} else {
		alert(responseText);
		//console.log(responseText);
		$($form).parent().parent().find('.el-overlay').fadeOut();
	}
	//alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + '\n\nThe output div should have already been updated with the responseText.');
}

$('.form-validate').validate({
	errorElement: "span",
	rules: {
		usuario: {
			required: true
		},
		username: {
			required: true
		},
		email: {
			required: true,
			email: true
		},
		confirmaSenha: {
			equalTo: '#senha'
		},
		nome: {
			required: true
		},
		endereco: {
			required: true
		},
		fone: {
			required: true
		},
		ramo_atividade: {
			required: true
		},
		pergunta: {
			required: true
		},
		resposta: {
			required: true
		},
		link: {
			required: true
		},
		titulo: {
			required: true
		},
		resumo: {
			required: true
		}
	},
	messages: {
		usuario: {
			required: "Campo não pode ser vazio"
		},
		username: {
			required: "Campo não pode ser vazio"
		},
		email: {
			required: "Campo não pode ser vazio",
			email: "Preencha corretamente"
		},
		confirmaSenha: {
			equalTo: "Senhas não conferem"
		},
		nome: {
			required: "Campo não pode ser vazio"
		},
		endereco: {
			required: "Campo não pode ser vazio"
		},
		fone: {
			required: "Campo não pode ser vazio"
		},
		ramo_atividade: {
			required: "Campo não pode ser vazio"
		},
		pergunta: {
			required: "Campo não pode ser vazio"
		},
		resposta: {
			required: "Campo não pode ser vazio"
		},
		link: {
			required: "Campo não pode ser vazio"
		},
		titulo: {
			required: "Campo não pode ser vazio"
		},
		resumo: {
			required: "Campo não pode ser vazio"
		}
	},
	submitHandler: function(form){
		var acao = $('#acao').val();
		if(acao == 'addUser' || acao == 'editaUser' || acao == 'addFaq' || acao == 'editaFaq' || acao == 'addSocials' || acao == 'editaSocials' || acao == 'addVideos' || acao == 'editaVideos'){
			if($('#senha').val() == '' && acao != 'editaUser'){
				alert('Preencha o campo senha!');
				return false;
			}
			//console.log(acao);
			urlForm = $(form).find('#url').val();
			acaoForm = $(form).find('#acao').val();
			//$(form).parent().parent().find('.el-overlay').fadeIn();
			//overlayLoad();
			enviaForm(form, urlForm, acaoForm);
			return false;
		}
		if(acao == 'addImagem' || acao == 'editaImagem' || acao == 'addEmpresa' || acao == 'editaEmpresa'){
			if(acao == 'addImagem' || acao == 'editaImagem' && $('#editarArquivo').is(':checked')){
				if($('#arquivo').val() == ''){
					alert('Você deve inserir um arquivo nos formatos JPG ou PNG!');
					return false;
				}
			}
			if(acao == 'addEmpresa' || acao == 'editaEmpresa' && $('#editarArquivo').is(':checked')){
				if($('#arquivo').val() == ''){
					alert('Você deve inserir um arquivo nos formatos JPG ou PNG!');
					return false;
				}
			}
			
			var options = { 
	            target: '#output',//target element(s) to be updated with server response 
	            beforeSubmit: beforeSubmit(form),//,//pre-submit callback 
	            success: showResponse
	            //resetForm: true //reset the form after successful submit 
	        };

            $(form).ajaxSubmit(options);//Ajax Submit form
            //return false to prevent standard browser submit and page navigation
            return false;
		}
		return false;
	}
});