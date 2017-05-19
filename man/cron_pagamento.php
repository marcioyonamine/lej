<?php
/* 

Arquivo de controle das rotinas do sistema

*/

//exibe os erros
@ini_set('display_errors', '1');
error_reporting(E_ALL); 
//require_once("../../wp-load.php");
// Carrega as funções principais
require "../inc/functions.php";
$con = bancoMysqli(); //abre conexão com o banco
set_time_limit(0); //estabelece o tempo máximo para execução do cron / 0 para sem limites

$mensagem = "";
$data = date('Y-m-d H:i:s');
$relatorio = "<h1>Relatório do Sistema</h1>
<p>Gerado em $data</p>
<br />";

$atualiza_usuario = atualizaUsuarioWoo();

if($atualiza_usuario){
	$log = "O sistema atualizou o status dos usuários";
	gravarLog($log, "1");
}else{
	$log = "O sistema NÃO atualizou o status dos usuários";
	gravarLog($log, "1");
}


?>