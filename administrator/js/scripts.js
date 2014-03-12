//VARIAVEIS GLOBAIS
var thisUrl = window.location;

if(checkClass('body', 'users')){
	chamaAjax(thisUrl.origin+'/getm/administrator/json/json.php', 'users');
}

if(checkClass('body', 'imagens')){
	chamaAjax(thisUrl.origin+'/getm/administrator/json/json.php', 'imagens');
}

if(checkClass('body', 'empresas')){
	chamaAjax(thisUrl.origin+'/getm/administrator/json/json.php', 'empresas');
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

$('.btn-ajax-trash').on('click', function(e){
	e.preventDefault();
	e.stopPropagation();
	var r = confirm("Tem certeza que deseja excluir esse usuário?");
	if (r == true) {
  		var $this = $(this),
		idExclui = $this.parent().parent().attr('class'),
		acao = 'excluirUser',
		dados = 'id='+idExclui+'&acao='+acao;
		$.ajax({
			url: "form-envia.php",
			type: 'post',
			data: dados,
			success: function(txt){
				if(txt == 'success'){
					alert('Usuário excluído com sucesso!');
					window.location=window.location;
				} else if(txt == 'error'){
					alert('Ocorreu um erro, por favor tente novamente!');
				} else {
					alert(txt);
				}
			},
			error: function(jqXHR, textStatus, ex){
	        	console.log(textStatus + "," + ex + "," + jqXHR.responseText);
	    	}
		});
  	} else {
  		return false;
  	}
});

$('.btn-cancela-user').on('click', function(e){
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
		}
	},
	submitHandler: function(form){
		var acao = $('#acao').val();
		if(acao == 'addUser' || acao == 'editaUser'){
			if($('#senha').val() == '' && acao != 'editaUser'){
				alert('Preencha o campo senha!');
				return false;
			}
			urlForm = $(form).find('#url').val();
			acaoForm = $(form).find('#acao').val();
			$(form).parent().parent().find('.el-overlay').fadeIn();
			overlayLoad();
			enviaForm(form, urlForm, acaoForm);
			return false;
		}
		if(acao == 'addImagem'){
			if($('#arquivo').val() == ''){
				alert('Você deve inserir um arquivo nos formatos JPG ou PNG!');
				return false;
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