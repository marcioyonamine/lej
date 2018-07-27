<?php 
include "../inc/functions.php";

?>
<?php
$con = bancoMysqli();
$sql_num = "SELECT * FROM lej_numero";
$query_num = mysqli_query($con,$sql_num);
while($x = mysqli_fetch_array($query_num)){
	$num = $x['id'];
	$os = $x['os'];
	$sql_upd = "UPDATE lej_os SET n_os = '$num' WHERE id = '$os'";
	$query_upd = mysqli_query($con,$sql_upd);
	if($query_upd){
		echo "atualizado<br />";
	}
	
	
}


/*

echo "<h1> Maps </h1>";
$total = 0;
$gmaps = new gMaps($GLOBALS['google_maps_key']);
// Pega os dados (latitude, longitude e zoom) do endereço:
$dados_partida =  converterObjParaArray($gmaps->geoLocal($_POST['partida']));
$dados_chegada =  converterObjParaArray($gmaps->geoLocal($_POST['chegada']));


if($_POST['end01'] != ""){
	$dados_end01 = converterObjParaArray($gmaps->geoLocal($_POST['end01']));	
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_end01['lat'], $dados_end01['lng']);	
}else{
	$dados_end01 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end02'] != ""){
	$dados_end02 = converterObjParaArray($gmaps->geoLocal($_POST['end02']));	
	$total = $total + distancia($dados_end01['lat'], $dados_end01['lng'],$dados_end02['lat'], $dados_end02['lng']);	
}else{
	$dados_end02 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end03'] != ""){
	$dados_end03 = converterObjParaArray($gmaps->geoLocal($_POST['end03']));	
	$total = $total + distancia($dados_end02['lat'], $dados_end02['lng'],$dados_end03['lat'], $dados_end03['lng']);	
}else{
	$dados_end03 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end04'] != ""){
	$dados_end04 = converterObjParaArray($gmaps->geoLocal($_POST['end04']));	
	$total = $total + distancia($dados_end03['lat'], $dados_end03['lng'],$dados_end04['lat'], $dados_end04['lng']);	
}else{
	$dados_end04 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end05'] != ""){
	$dados_end05 = converterObjParaArray($gmaps->geoLocal($_POST['end05']));	
	$total = $total + distancia($dados_end04['lat'], $dados_end04['lng'],$dados_end05['lat'], $dados_end05['lng']);	
}else{
	$dados_end05 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}



$dados_gerais = $gmaps->enderecoFormatado($_POST['chegada']);





echo "<pre>";
var_dump($dados_partida);
echo "</pre>";

echo "<pre>";
var_dump($dados_chegada);
echo "</pre>";

echo "<pre>";
var_dump($dados_end01);
echo "</pre>";

echo "<pre>";
var_dump($dados_end02);
echo "</pre>";
echo "<pre>";
var_dump($dados_end03);
echo "</pre>";
echo "<pre>";
var_dump($dados_end04);
echo "</pre>";
echo "<pre>";
var_dump($dados_end05);
echo "</pre>";

echo "<pre>";
var_dump($dados_gerais);
echo "</pre>";


echo "Distância total: ".$total." km";


echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/
?>
