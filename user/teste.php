<?php 
include "../inc/functions.php";



$gmaps = new gMaps($GLOBALS['google_maps_key']);
// Pega os dados (latitude, longitude e zoom) do endereço:
$endereco = $_POST['partida'];
$dados =  converterObjParaArray($gmaps->geoLocal($endereco));

$gmaps02 = new gMaps($GLOBALS['google_maps_key']);
// Pega os dados (latitude, longitude e zoom) do endereço:
$endereco02 = $_POST['chegada'];
$dados02 =  converterObjParaArray($gmaps->geoLocal($endereco02));

$x = distancia($dados['lat'], $dados['lng'], $dados02['lat'], $dados02['lng']);

echo "<pre>";
var_dump($dados);
echo "</pre>";

echo "<pre>";
var_dump($dados02);
echo "</pre>";

echo "Distância entre os dois pontos: ".$x." km";


echo "<pre>";
var_dump($_POST);
echo "</pre>";

?>
