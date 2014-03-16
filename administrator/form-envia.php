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
	$lojista	= anti_injection($_REQUEST['lojista']);
	$arquivo	= $_REQUEST['arquivo'];
	$destaque 	= anti_injection($_REQUEST['destaque']) == '' ? 0 : 1;
	$ativo 		= anti_injection($_REQUEST['ativo']) == '' ? 0 : 1;
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
			array_push($arrayRequest, $senha);
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
			array_push($arrayCampos, 'nome');
			array_push($arrayCampos, 'username');
			array_push($arrayCampos, 'email');
			if($senha != ""){
				array_push($arrayCampos, 'senha');
			}

			array_push($arrayRequest, $nome);
			array_push($arrayRequest, $username);
			array_push($arrayRequest, $email);
			if($senha != ""){
				array_push($arrayRequest, $senha);
			}

			$campos = join($arrayCampos, '|');
			$dados	= join($arrayRequest, '|');

			if(editanobd("users",$campos,$dados,$id)){
				echo "success";
			} else {
				echo "error";
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
		default:
			# code...
			break;
	}
	return true;
?>