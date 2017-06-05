<?php 
include "../inc/functions.php";

?>
<?php





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


echo "Distância total: ".$total." km";


echo "<pre>";
var_dump($_POST);
echo "</pre>";

?>
