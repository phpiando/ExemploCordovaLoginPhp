<?php

$Mysqli = new mysqli('localhost', 'root', '351321', 'phpiando');

$request = $_SERVER['REQUEST_METHOD'] == 'GET' ? $_GET : $_POST;

switch ($request['acao']) {
	
	case "LoginWeb":
		$usuario = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);

		$erro = "";
		$erro .= empty($usuario) ? "Informe o seu usuario \n" : "";
		$erro .= empty($senha) ? "Informe a sua senha \n" : "";

		$arr = array();

		if(empty($erro)){
			$query = "select * from usuarios where usuario = '{$usuario}' and senha = '{$senha}'";
			$result = $Mysqli->query($query);

			if($result->num_rows > 0){
				//usuario logado
				$obj = $result->fetch_object();

				$arr['result'] = true;
				$arr['dados']['nome'] = $obj->nome;
			}else{
				$arr['result'] = false;
				$arr['msg'] = "Usuário ou senha incorreto";
			}
		}else{
			$arr['result'] = false;
			$arr['msg'] = $erro;
		}

		echo json_encode($arr);
	break;
}