<?php
//Imprime erros com o banco
@ini_set('display_errors', '1');
error_reporting(E_ALL);

//header( 'Cache-Control: no-cache' );
//header( 'Content-type: application/xml; charset="utf-8"', true );

include "../inc/db.php";
//mysqli_set_charset($con,"utf8");
$con = bancoMysqli();
$pessoa = $_GET['pessoa'];

$cidades = array();
if($pessoa = "fisica"){
	$sql = "SELECT id,nome FROM lej_pf ORDER BY nome";
	$res = mysqli_query($con,$sql);
	
	while ( $row = mysqli_fetch_array( $res ) ) {
		$cidades[] = array(
			'id_cliente'	=> $row['id'],
			'cliente'			=> (utf8_encode($row['nome'])),
		);
	}
}

else if($pessoa = "juridica"){
	$sql = "SELECT id,nome FROM lej_pj ORDER BY nome";
	$res = mysqli_query($con,$sql);
	
	while ( $row = mysqli_fetch_array( $res ) ) {
		$cidades[] = array(
			'id_cliente'	=> $row['id'],
			'cliente'			=> (utf8_encode($row['nome'])),
		);
	}
	
}

echo( json_encode( $cidades ) );

?>