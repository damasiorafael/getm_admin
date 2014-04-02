<?php
	//<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	// Conexão com o banco de dados
	include("includes/config.php");
	include("includes/phpmailer/class.phpmailer.php");
	
	// Recebendo as variavéis do formulário
	$nome				= anti_injection($_REQUEST["nome"]);
	$email				= anti_injection($_REQUEST["email"]);
	$departamento		= anti_injection($_REQUEST["departamento"]);
	$mensagem			= anti_injection($_REQUEST["mensagem"]);	
	
	$_SESSION["nome"]			= $nome;
	$_SESSION["email"]			= $email;
	$_SESSION["departamento"]	= $departamento;
	$_SESSION["mensagem"]		= $mensagem;

	$departamento = explode("-", $departamento);
	$mail_departamento = $departamento[1];
	$nome_departamento = $departamento[0];

	// Mandando e-mail
	$msg = "";
	$msg .='<style type="text/css">body,td { color:#352E62; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; }</style>

	<div style="font:11px/1.35em Verdana, Arial, Helvetica, sans-serif;">
		<table cellspacing="0" cellpadding="0" border="0" width="98%" style="margin-top:10px; font:11px/1.35em Verdana, Arial, Helvetica, sans-serif; margin-bottom:10px;">
			<tr>
				<td align="center" valign="top">
					<table cellspacing="0" cellpadding="0" border="0" width="650">
						<tr>
							<td valign="top">
								<p><a href="http://www.getm.com.br" style="color:#352E62; background: url(http://www.getm.com.br/images/logo2.png) no-repeat -220px 0; display: block; width: 297px; height: 110px;"></a></p></td>
						</tr>
					</table>
					<table cellspacing="0" cellpadding="0" border="0" width="650">
						<tr>
							<td valign="top">
								<h2 style="font-size: 14px; margin-top: 15px;">GETM CONTATO</h2>
								<strong>Nome:</strong> '.$nome.'<br>
								<strong>E-mail:</strong> '.$email.'<br>
								<strong>Departamento:</strong> '.$nome_departamento.'<br>
								<strong>Mensagem:</strong> '.$mensagem.'<br>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>';

	$mailer = new PHPMailer();
	$mailer->IsSMTP();
	$mailer->SMTPDebug = 1;
	$mailer->SMTPAuth = true;
	$mailer->SMTPSecure = "tls";
	$mailer->Port = "587"; //  Indica a porta de conexao para a saida de e-mails
	$mailer->Host = "smtp.live.com";
	$mailer->Username = "suporte@getm.com.br"; //Informe o e-mail o completo
	$mailer->Password = "6mRDe7iy"; //Senha da conta de email
	$mailer->FromName = "GETM - Contato"; //Nome que sera exibido para o destinatario
	$mailer->From = "suporte@getm.com.br"; //Obrigatorio ser a mesma caixa postal indicada em "Username"
	$mailer->AddAddress($mail_departamento,"GETM - Contato");
	$mailer->AddAddress($email,"GETM - Contato");
	$mailer->AddBcc("damasio@komeia.com","GETM - Contato");
	$mailer->Subject = "GETM - CONTATO";
	$mailer->Body = $msg;
	$mailer->IsHTML(true);
	
	if($mailer->Send()){
		//Gravando os dados do usuário no banco de dados.
		$sql_contato = "INSERT INTO contato (nome, email, departamento, mensagem) VALUES ('$nome', '$email', '$nome_departamento',  '$mensagem')";	  
		if($query_contato = mysql_query($sql_contato)){
			session_destroy();
			session_start();
			echo "success";
			//$_SESSION["envio_contato_sucesso"] = "Envio contato efetuado com sucesso! Aguarde que em breve responderemos!";
		}
	} else {
		session_destroy();
		session_start();
		$_SESSION["erro_envio_email_contato"] = "Não foi possível enviar seu formulário, por favor tente novamente!";
		echo "error";
	}
?>