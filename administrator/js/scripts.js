//VARIAVEIS GLOBAIS
var thisUrl = window.location;

if(checkClass('body', 'users')){
	chamaAjax(thisUrl.origin+'/getm/administrator/json/json.php', 'users');
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
	$('#formEditUser input#usuario').val('');
	$('#formEditUser input#username').val('');
	$('#formEditUser input#email').val('');
	$('.form-group-lojista').fadeIn();
	$('.col-add-edit').fadeIn();
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
			equalTo: senha
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
		}
	},
	submitHandler: function(form){
		acao = $('#acao').val();
		if(acao == 'addUser'){
			if($('#senha').val() == ''){
				alert('Preencha o campo senha!');
				return false;
			}
		}
		urlForm = $(form).find('#url').val();
		acaoForm = $(form).find('#acao').val();
		$(form).parent().parent().find('.el-overlay').fadeIn();
		overlayLoad();
		enviaForm(form, urlForm, acaoForm);
		return true;
	}
});