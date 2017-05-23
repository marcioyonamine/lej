<?php

// funcoes sistema lej

include "db.php";
include "globals.php";

function converterObjParaArray($data) { //função que transforma objeto vindo do json em array

    if (is_object($data)) {
        $data = get_object_vars($data);
    }

    if (is_array($data)) {
        return array_map(__FUNCTION__, $data);
    }
    else {
        return $data;
    }
}

function nocache(){
	echo '
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />';

	
}

function saudacao(){ 
	$hora = date('H');
	if(($hora > 12) AND ($hora <= 18)){
		return "Boa tarde";	
	}else if(($hora > 18) AND ($hora <= 23)){
		return "Boa noite";	
	}else if(($hora >= 0) AND ($hora <= 4)){
		return "Boa noite";	
	}else if(($hora > 4) AND ($hora <=12)){
		return "Bom dia";
	}
}

function numeroSemana($date){
	return date("W", strtotime($date)); 
}

//soma(+) ou substrai(-) dias de um date(a-m-d)
function somarDatas($data,$dias){ 
	$data_final = date('Y-m-d', strtotime("$dias days",strtotime($data)));	
	return $data_final;
}

function recuperaDados($tabela,$idEvento,$campo){ //retorna uma array com os dados de qualquer tabela. serve apenas para 1 registro.
	$con = bancoMysqli();
	$sql = "SELECT * FROM $tabela WHERE ".$campo." = '$idEvento' LIMIT 0,1";
	//echo "SQL 117: " . $sql;
	$query = mysqli_query($con,$sql);
	$campo = mysqli_fetch_array($query);
	return $campo;		
}

// Retira acentos das strings
function semAcento($string){
	$newstring = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
	return $newstring;
}

//retorna data d/m/y de mysql/date(a-m-d)
function exibirDataBr($data){ 
	$timestamp = strtotime($data); 
	return date('Y/m/d', $timestamp);
}

//retorna data d/m/y de mysql/date(a-m-d)
function exibirDataBrOrdem($data){ 
	$timestamp = strtotime($data); 
	return date('d/m/Y', $timestamp);
}



function checado($x,$array){
	if (in_array($x,$array)){
		return "checked='checked'";		
	}
}



function select($id,$sel){
	if($id == $sel){
		return "selected";			
	}	
}

	//retorna valor xxx,xx para xxx.xx
	function dinheiroDeBr($valor)
	{
		$valor = str_ireplace(".","",$valor);
		$valor = str_ireplace(",",".",$valor);
		return $valor;
	}
	//retorna valor xxx.xx para xxx,xx
	function dinheiroParaBr($valor)
	{ 
		$valor = number_format($valor, 2, ',', '.');
		return $valor;
	}


function gravarLog($log, $idUsuario){ //grava na tabela ig_log os inserts e updates
		$logTratado = addslashes($log);
		//$idUsuario = $user->ID;
		
		if(isset($_SERVER['REMOTE_ADDR'])){ 
			$ip = $_SERVER["REMOTE_ADDR"];
			}else{
			$ip = "1.1.1.1";
			}
		
		//$ip = $_SERVER['REMOTE_ADDR'];
		
		
		$data = date('Y-m-d H:i:s');
		$sql = "INSERT INTO `iap_log` (`idLog`, `ig_usuario_idUsuario`, `enderecoIP`, `dataLog`, `descricao`) VALUES (NULL, '$idUsuario', '$ip', '$data', '$logTratado')";
		$mysqli = bancoMysqli();
		$mysqli->query($sql);
}


function noResend(){
	$p1 = $_SERVER["HTTP_REFERER"];
	$p2 = $_SERVER["QUERY_STRING"];
	echo $p1;
	header('Location:'.$p1, true, 301);
}

function vGlobais(){
	echo "SERVER";
	echo "<pre>";
	var_dump($_SERVER);
	echo "</pre>";

	if(isset($_POST)){
		echo "POST";
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
	}

	if(isset($_GET)){
		echo "GET";
		echo "<pre>";
		var_dump($_GET);
		echo "</pre>";	
	}
	if(isset($_SESSION)){
		echo "SESSION";
		echo "<pre>";
		var_dump($_SESSION);
		echo "</pre>";	
	}
}

function distancia($lat1, $lon1, $lat2, $lon2) { //Em km

	$lat1 = deg2rad($lat1);
	$lat2 = deg2rad($lat2);
	$lon1 = deg2rad($lon1);
	$lon2 = deg2rad($lon2);
	
	$dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
	$dist = number_format($dist, 2, '.', '');
	return $dist;
}

function geraOpcao($meta,$order = NULL,$select = NULL){ //gera opcoes a partir da tabela _opcoes
	$con = bancoMysqli();
	if($order != NULL){
		$sqlorder = " ORDER BY $order";
	}else{
		$sqlorder = "";	
	}
	
	$sql = "SELECT * FROM lej_opcoes WHERE meta = '$meta' AND publish = '1' $sqlorder";
	$query = mysqli_query($con,$sql);
	while($ar = mysqli_fetch_array($query)){
		echo "<option value='".$ar['id']."'";
		if($select != NULL && $ar['id'] == $select){
			echo " selected='selected' ";	
		}	
		echo " >".$ar['value']."</option>";
	}
}


function verificaDoc($doc){
	$con = bancoMysqli();
	if(strlen($doc) > 14){ // pj
		$sql = "SELECT id FROM lej_pj WHERE cnpj LIKE '$doc'";
		$query = mysqli_query($con,$sql);
		$n = mysqli_num_rows($query);
	}else{ //pf
		$sql = "SELECT id FROM lej_pf WHERE cpf LIKE '$doc'";
		$query = mysqli_query($con,$sql);
		$n = mysqli_num_rows($query);
	}
	if($n > 0){
		$x = mysqli_fetch_array($query);
		return $x['id'];	
	}else{
		return 0;			
	}
}

function geraCondutor(){
	$con = bancoMysqli();
	$sql = "SELECT id,nome FROM lej_pf WHERE funcao = '7' ORDER BY nome";
	$query = mysqli_query($con,$sql);
	while($ar = mysqli_fetch_array($query)){
		echo "<option value='".$ar['id']."'>".$ar['nome']."</option>";	
	}
}


/* ------------- classes --------------- */

/**
 * gMaps Class
 *
 * Pega as informações de latitude, longitude e zoom de um endereço usando a API do Google Maps
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 */
class gMaps {
  private $mapsKey;
  function __construct($key = null) {
    if (!is_null($key)) {
      $this->mapsKey = $key;
    }
  }
  function carregaUrl($url) {
    if (function_exists('curl_init')) {
      $cURL = curl_init($url);
      curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
      $resultado = curl_exec($cURL);
      curl_close($cURL);
    } else {
      $resultado = file_get_contents($url);
    }
	
    if (!$resultado) {
      trigger_error('Não foi possível carregar o endereço: <strong>' . $url . '</strong>');
    } else {
      return $resultado;
    }
  }
  
  function geoLocal($endereco) {
    $url = "https://maps.googleapis.com/maps/api/geocode/json?key={$this->mapsKey}&address=" . urlencode($endereco);
    $data = json_decode($this->carregaUrl($url));
    
    if ($data->status === 'OK') {
      return $data->results[0]->geometry->location;
    } else {
      return false;
    }
  }
}
