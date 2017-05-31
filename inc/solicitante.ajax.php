<?php
//Imprime erros com o banco
@ini_set('display_errors', '1');
error_reporting(E_ALL);

//header( 'Cache-Control: no-cache' );
//header( 'Content-type: application/xml; charset="utf-8"', true );

include "../inc/db.php";
//mysqli_set_charset($con,"utf8");
$con = bancoMysqli();
if(isset($_GET['pf'])){
	$pessoa = 1;
	$id = $_GET['pf'];	
}
if(isset($_GET['pj'])){

	$pessoa = 2;
	$id = $_GET['pj'];
}

$cidades = array();
if($pessoa == 1){
	$sql = "SELECT id,nome FROM lej_pf WHERE id = '$id' ORDER BY nome";
	$res = mysqli_query($con,$sql);
	
	while ( $row = mysqli_fetch_array( $res ) ) {
		$cidades[] = array(
			'id_cliente'	=> $row['id'],
			'cliente'			=> (utf8_encode($row['nome'])),
		);
	}
}

else if($pessoa == 2){
	$sql = "SELECT id,nome,nome_fantasia WHERE id = '$id' FROM lej_pj ORDER BY nome";
	$res = mysqli_query($con,$sql);
	
	while ( $row = mysqli_fetch_array( $res ) ) {
		$cidades[] = array(
			'id_cliente'	=> $row['id'],
			'cliente'			=> (($row['nome']." / ".$row['nome_fantasia'])),
		);
	}
	
}

echo( json_encode( $cidades ) );

?>