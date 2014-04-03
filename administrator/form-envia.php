<?php
	include('inc/config.php');
	$acao = anti_injection($_REQUEST["acao"]);

	$arrayRequest 	= array();
	$arrayCampos	= array();

	$id 		= anti_injection($_REQUEST['id']);
	$nome	 	= anti_injection($_REQUEST['nome']);
	$username	= anti_injection($_REQUEST['username']);
	$email 		= anti_injection($_REQUEST['email']);
	$senha 		= anti_injection($_REQUEST['senha']);
	$senhaatual	= anti_injection($_REQUEST['senhaatual']);
	$novasenha	= anti_injection($_REQUEST['novasenha']);
	$lojista	= anti_injection($_REQUEST['lojista']);
	$arquivo	= $_REQUEST['arquivo'];
	$destaque 	= anti_injection($_REQUEST['destaque']) == '' ? 0 : 1;
	$ativo 		= anti_injection($_REQUEST['ativo']) == '' ? 0 : 1;

	$pergunta	= anti_injection($_REQUEST['pergunta']);
	$resposta	= anti_injection($_REQUEST['resposta']);

	$titulo		= anti_injection($_REQUEST['titulo']);
	$resumo		= anti_injection($_REQUEST['resumo']);

	$link		= anti_injection($_REQUEST['link']);

	switch($acao){
		case 'addUser':
			array_push($arrayCampos, 'nome');
			array_push($arrayCampos, 'username');
			array_push($arrayCampos, 'email');
			array_push($arrayCampos, 'senha');
			array_push($arrayCampos, 'lojista');

			array_push($arrayRequest, $nome);
			array_push($arrayRequest, $username);
			array_push($arrayRequest, $email);
			array_push($arrayRequest, SHA1($senha));
			array_push($arrayRequest, $lojista);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');
			if($senha != ''){
				if(selectdbcount('users','username',$username) < 1 && selectdbcount('users','username',$email) < 1){
					if(gravanobd('users',$campos,$dados)){
						echo "success";
					} else {
						echo "error";
					}
				} else {
					echo "Já existe um usuário cadastrado com esses dados, verifique!";
				}
			} else {
				echo "Digite uma senha!";
			}
			$arrayRequest 	= array();
			$arrayCampos 	= array();
			break;
		case 'editaUser':
			if(checaUserAlterSenha('users',$id,$senhaatual)){
				array_push($arrayCampos, 'senha');
				
				array_push($arrayRequest, SHA1($novasenha));
	
				$campos = join($arrayCampos, '|');
				$dados	= join($arrayRequest, '|');
	
				if(editanobd("users",$campos,$dados,$id)){
					echo "success";
				} else {
					echo "error";
				}
			} else {
				echo "Senha não confere, tente novamente!";
			}
			break;
		case 'excluirUser':
			if(deletadb('users', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirImagem':
			if(deletadb('imagens', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirEmpresa':
			if(deletadb('empresas', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'addFaq':
			array_push($arrayCampos, 'pergunta');
			array_push($arrayCampos, 'resposta');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $pergunta);
			array_push($arrayRequest, $resposta);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');
			if(gravanobd('faq',$campos,$dados)){
				echo "success";
			} else {
				echo "error";
			}
			$arrayRequest 	= array();
			$arrayCampos 	= array();
			break;
		case 'editaFaq':
			array_push($arrayCampos, 'pergunta');
			array_push($arrayCampos, 'resposta');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $pergunta);
			array_push($arrayRequest, $resposta);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');

			if(editanobd("faq",$campos,$dados,$id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirFaq':
			if(deletadb('faq', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'addSocials':
			array_push($arrayCampos, 'nome');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $nome);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');
			if(gravanobd('redes_sociais',$campos,$dados)){
				echo "success";
			} else {
				echo "error";
			}
			$arrayRequest 	= array();
			$arrayCampos 	= array();
			break;
		case 'editaSocials':
			array_push($arrayCampos, 'nome');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $nome);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');

			if(editanobd("redes_sociais",$campos,$dados,$id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirSocials':
			if(deletadb('redes_sociais', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'addVideo':
			array_push($arrayCampos, 'titulo');
			array_push($arrayCampos, 'resumo');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $titulo);
			array_push($arrayRequest, $resumo);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');
			if(gravanobd('videos',$campos,$dados)){
				echo "success";
			} else {
				echo "error";
			}
			$arrayRequest 	= array();
			$arrayCampos 	= array();
			break;
		case 'editaVideo':
			array_push($arrayCampos, 'titulo');
			array_push($arrayCampos, 'resumo');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $titulo);
			array_push($arrayRequest, $resumo);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');

			if(editanobd("videos",$campos,$dados,$id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirVideo':
			if(deletadb('videos', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'addVideoLinha':
			array_push($arrayCampos, 'titulo');
			array_push($arrayCampos, 'resumo');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $titulo);
			array_push($arrayRequest, $resumo);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');
			if(gravanobd('videos_linha',$campos,$dados)){
				echo "success";
			} else {
				echo "error";
			}
			$arrayRequest 	= array();
			$arrayCampos 	= array();
			break;
		case 'editaVideoLinha':
			array_push($arrayCampos, 'titulo');
			array_push($arrayCampos, 'resumo');
			array_push($arrayCampos, 'link');
			array_push($arrayCampos, 'ativo');

			array_push($arrayRequest, $titulo);
			array_push($arrayRequest, $resumo);
			array_push($arrayRequest, $link);
			array_push($arrayRequest, $ativo);

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');

			if(editanobd("videos_linha",$campos,$dados,$id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		case 'excluirVideoLinha':
			if(deletadb('videos_linha', $id)){
				echo "success";
			} else {
				echo "error";
			}
			break;
		default:
			# code...
			break;
	}
	return true;
?>