<?php

/* 

Arquivo de controle das rotinas do sistema

*/

//exibe os erros
@ini_set('display_errors', '1');
error_reporting(E_ALL); 
//require_once("../../wp-load.php");
// Carrega as funções principais
//require "../inc/functions.php";

include "../inc/db.php";
include "../inc/globals.php";

require_once('../inc/phpmailer/class.phpmailer.php');

$con = bancoMysqli(); //abre conexão com o banco
set_time_limit(0); //estabelece o tempo máximo para execução do cron / 0 para sem limites


/* FUNÇÕES INICIO */
function ultObj($id){ //retorna dados do último objetivo
	$con = bancoMysqli();
	$sql = "SELECT * FROM iap_objetivo WHERE usuario = '$id' AND finalizado <> '1' ORDER BY id DESC LIMIT 0,1";
	$query = mysqli_query($con,$sql);
	return mysqli_fetch_array($query);	
		
}

function recuperaDados($tabela,$idEvento,$campo){ //retorna uma array com os dados de qualquer tabela. serve apenas para 1 registro.
	$con = bancoMysqli();
	$sql = "SELECT * FROM $tabela WHERE ".$campo." = '$idEvento' LIMIT 0,1";
	//echo "SQL 117: " . $sql;
	$query = mysqli_query($con,$sql);
	$campo = mysqli_fetch_array($query);
	return $campo;		
}

function retornaSemanas($data, $usuario = NULL){ //está retornando fase
	$inicio = nextMonday($data, $usuario);
	$x[1]['inicio'] = $inicio;
	$x[1]['semana_inicio'] = $inicio;
	$x[1]['fim'] = date('Y-m-d', strtotime($inicio. ' + 6 days'));
	$x[1]['semana_fim'] = $x[1]['fim'];
	$x[1]['fase'] = 1;	
	for($i = 2; $i <= 16; $i++){
	//	$x[$i]['inicio'] = date('Y-m-d', strtotime($x[$i-1]['inicio']. ' + 7 days'));
	//	$x[$i]['fim'] = date('Y-m-d', strtotime($x[$i]['inicio']. ' + 6 days'));
		switch($i){
			case 2:
			case 3:
			case 4:
				$x[$i]['fase'] = $i;
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[$i-1]['inicio']. ' + 7 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[$i]['inicio']. ' + 6 days'));
				$x[$i]['semana_inicio'] = $x[$i]['inicio'];
				$x[$i]['semana_fim'] = $x[$i]['fim'];
				
			break;

			
			case 5:
				$x[$i]['fase'] = 5;
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[4]['inicio']. ' + 7 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));
			break;	
			case 6:
				$x[$i]['fase'] = 5;
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[4]['inicio']. ' + 7 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;
			
			case 7:
				$x[$i]['fase'] = 6;		
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 8:
				$x[$i]['fase'] = 6;			
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[5]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 9:
				$x[$i]['fase'] = 7;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));
				
			break;

			case 10:
				$x[$i]['fase'] = 7;			
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[7]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;
				
			case 11:
				$x[$i]['fase'] = 8;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 12:
				$x[$i]['fase'] = 8;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[9]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));
		
			break;


			case 13:
				$x[$i]['fase'] = 9;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 13 days'));
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 14:
				$x[$i]['fase'] = 9;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[11]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 13 days'));		
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 15:
				$x[$i]['fase'] = 10;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[15]['inicio']. ' + 13 days'));	
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;
	
			case 16:
				$x[$i]['fase'] = 10;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[13]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[15]['inicio']. ' + 13 days'));		
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;
			
			case 17:
				$x[$i]['fase'] = 11;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[15]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[17]['inicio']. ' + 13 days'));		
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

			case 18:
				$x[$i]['fase'] = 11;	
				$x[$i]['inicio'] = date('Y-m-d', strtotime($x[15]['inicio']. ' + 14 days'));
				$x[$i]['fim'] = date('Y-m-d', strtotime($x[17]['inicio']. ' + 13 days'));		
				$x[$i]['semana_inicio'] = date('Y-m-d', strtotime($x[$i-1]['semana_inicio']. ' + 7 days'));
				$x[$i]['semana_fim'] = date('Y-m-d', strtotime($x[$i]['semana_inicio']. ' + 6 days'));

			break;

		}

			
	}
	return $x;
}

function matrizDesafios($obj,$fase){
	$con = bancoMysqli();
	$sql = "SELECT desafio FROM iap_aceite WHERE objetivo = '$obj' AND fase = '$fase'";
	$query = mysqli_query($con,$sql);
	$caixa = array();
	while($x = mysqli_fetch_array($query)){
		array_push($caixa, $x['desafio']);
		
	}
	return $caixa;		
}

function objetivo($objetivo, $usuario = NULL){
	$obj = recuperaDados("iap_objetivo",$objetivo,"id");
	// 1 verifica todas as datas
	$semanas = retornaSemanas($obj['data_inicio'], $usuario);
	for($i = 1; $i <= 16 ;$i ++){
		$semanas[$i]['desafios'] = array();	
		//echo $objetivo." - ".$semanas[$i]['fase']."<br />";
		$semanas[$i]['desafios'] = matrizDesafios($objetivo,$semanas[$i]['fase']);
		
	}
	$x['inicio'] = $obj['data_inicio'];
	$x['datas'] = $semanas;	
	return $x;
}

function verificaSegunda($objetivo,$semana,$usuario = NULL){
	$obj = objetivo($objetivo);
	$diasemana_numero = date('w', strtotime($GLOBALS['hoje']));
	//echo "Contagem matriz: " . count($obj['datas'][$semana]['desafios']);
	//echo $GLOBALS['hoje'];
	
	switch($semana){

	/*
	case 0:
	case NULL:
		if(($obj['datas'][1]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][1]['inicio']," +1") == $GLOBALS['hoje'])
		 ){
			 return TRUE;
		}else{
			return FALSE;
		}
		*/
	
			
	case 1:
	case 2:
	case 3:
	case 4:
	case 5:
	//case 6:
	case 7:
	//case 8:
	case 9:
	//case 10:
	case 11:
	//case 12:
	case 13:
	//case 14:
	case 15:
		
		if(($obj['datas'][$semana]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][$semana]['inicio'],"+1") == $GLOBALS['hoje']) 
		 AND (count($obj['datas'][$semana]['desafios']) == 0)
		 )
		 {
			 return TRUE;
		}else{
			return FALSE;
		}
	break;
	
	//Exceção da regra - possibilidade de implementação
	case 6:
	case 8:
	case 10:
	case 12:
	case 14:
				
		if(($obj['datas'][$semana]['inicio'] == $GLOBALS['hoje'] OR
		 somarDatas($obj['datas'][$semana]['inicio']," +1") == $GLOBALS['hoje'] OR 
		 somarDatas($obj['datas'][$semana]['inicio']," +2") == $GLOBALS['hoje']) 
		 AND (count($obj['datas'][$semana]['desafios']) == 0) AND ($usuario == '8' OR $usuario == '9' OR $usuario == '10')){
			 return TRUE;
		}else{
			return FALSE;
		}
		
	break;
	
	default:
		return FALSE;
	break;
	}
}

function retornaSemana($id, $usuario = NULL){
	$hoje = $GLOBALS['hoje'];
	$ult = recuperaDados("iap_objetivo",$id,"id");
	//echo "<h1>$id ".$ult['data_inicio']."</h1>";
	$semana = retornaSemanas($ult['data_inicio'], $usuario);
	$x = 0;
	for($i = 1; $i <= 16; $i++){
		
		
		//echo strtotime($semana[$i]['inicio'])."(".$semana[$i]['inicio'].") - ".strtotime($hoje)."(".$hoje." - )".strtotime($semana[$i]['fim']) . "(".$semana[$i]['fim'].")<br>";
		//echo ($semana[$i]['inicio'])." - ".($hoje)." - ".($semana[$i]['fim']) . "<br>";
		if(strtotime($semana[$i]['semana_inicio']) <= strtotime($hoje) AND
		 strtotime($semana[$i]['semana_fim']) >= strtotime($hoje)){
			
		$x = $i;
				
		}		
	}
	return $x;
}

function nextMonday($data, $usuario = null){
		
	$diasemana_numero = date('w', strtotime($data)); //data em sql Y-m-d
	switch($diasemana_numero){
		case 0:
			return somarDatas($data,"+ 1");
		break;		
		case 1:
			if($usuario > 60){
				return $data;
			}else{
				return somarDatas($data,"+ 7");
			}			
		break;		
		case 2:
			if($usuario > 60){
				return somarDatas($data,"- 1");
			}else{
				return somarDatas($data,"+ 6");
			}			
		break;
		case 3:
			return somarDatas($data,"+ 5");
		break;		
		case 4:
			return somarDatas($data,"+ 4");
		break;		
		case 5:
			return somarDatas($data,"+ 3");
		break;		
		case 6:
			return somarDatas($data,"+ 2");
		break;		

	}
}

function somarDatas($data,$dias){ 
	$data_final = date('Y-m-d', strtotime("$dias days",strtotime($data)));	
	return $data_final;
}

function emailTreinador($nome, $email = NULL, $teste = NULL){//ENVIA EMAIL DE NOVO RELATÓRIO - TROCAR PRO DO CAIO
		
		$mailer = new PHPMailer();
		$mailer->IsSMTP();
		$mailer->SMTPDebug = 1;
		$mailer->Port = 587; //Indica a porta de conexão para a saída de e-mails. Utilize obrigatoriamente a porta 587.
		 
		$mailer->Host = 'smtp.ialtaperformance.com'; //Onde em 'servidor_de_saida' deve ser alterado por um dos hosts abaixo:
		//Para cPanel: 'localhost';
		//Para Plesk 11 / 11.5: 'smtp.dominio.com.br';
		 
		//Descomente a linha abaixo caso revenda seja 'Plesk 11.5 Linux'
		//$mailer->SMTPSecure = 'tls';
		 
		$mailer->SMTPAuth = true; //Define se haverá ou não autenticação no SMTP
		$mailer->Username = 'sistema@ialtaperformance.com'; //Informe o e-mai o completo
		$mailer->Password = 'caio56iap!'; //Senha da caixa postal
		$mailer->FromName = 'Sistema iAP'; //Nome que será exibido para o destinatário
		$mailer->From = 'sistema@ialtaperformance.com'; //Obrigatório ser a mesma caixa postal indicada em "username"
		//$mailer->AddAddress('destinatario@dominio.com'); //Destinatários
		//$mailer->Subject = 'Teste enviado atraves do PHP Mailer - '.date("H:i").'-'.date("d/m/Y");
		//$mailer->Body = 'Este é um teste realizado com o PHP Mailer';
		
		if($email == NULL){
			$mailer->AddAddress('caio@ialtaperformance.com');
			$mailer->AddAddress('thiagonegro@gmail.com');			
		}else{
			if($teste == 1){
				$mailer->AddAddress('thiagonegro@hotmail.com');
			}else{
				$mailer->AddAddress($email);
			}
			
		}
		
		/*
		if(!$mailer->Send())
		{
		echo "Mensagem nao enviada";
		echo "Erro: " . $mailer->ErrorInfo; exit; }
		print "E-mail enviado!";
		*/
		
		//$headers = "From: sistema@ialtaperformance.com \n";
		
			$mailer->Subject = utf8_decode("Conta pra gente como foi essa fase");			
			$mailer->Body = utf8_decode("Olá, <br><br>Lembre-se de que hoje é dia de começar uma nova fase do seu Treinamento de Alta Performance. <br><br>Nos conte como foi a fase anterior pra saber de que forma podemos te ajudar na expansão da sua consciência pra conquista do seu objetivo.<br><br> <a href=\"https://ialtaperformance.com/login\">Clique aqui para mandar o seu relatório</a>.<br><br> PS: Mande o quanto antes e já pegue os próximos desafios ;)");
			$mailer->IsHTML(true); 
			$mailer->Send();
}


/* FUNÇÕES FINAL */

$mensagem = "";
$data = date('Y-m-d H:i:s');

$diasemana = date('w', strtotime($data));

//echo "Dia da semana: " . $diasemana;
//echo "<br>Aqui é antes de entrar no if";

if($diasemana == 1 || $diasemana == 2){
	$con2 = bancoMysqliWP();
	$sql_select = "SELECT user_email, ID, display_name FROM wp_users WHERE ID IN (SELECT DISTINCT user_id FROM wp_usermeta WHERE meta_key = 'wp_capabilities' AND (meta_value LIKE '%treinamento_flex%' OR meta_value LIKE '%treinamento_grupo%' OR meta_value LIKE '%treinamento_individual%'))";
	$query_select = mysqli_query($con2,$sql_select);
	
	
	/*
	while($ar = mysqli_fetch_array($query_select)){
		print_r($ar);
	}
	 */
	
	
	
	while($user = mysqli_fetch_array($query_select)){
		$id = $user['ID'];
		$objetivo = ultObj($id);
		if (verificaSegunda($objetivo['id'], retornaSemana($objetivo['id'], $id), $id) == TRUE){
			emailTreinador($user['display_name'],$user['user_email'], 1);
		}else{
			echo "não rolou pegar e enviar os emails";
		}
		
		
		/*
		if($user_hawk['finalizado'] == 0){
				
		}
		 *
	 * */
	 
		 
		//sleep(5);
	}
	 
}

