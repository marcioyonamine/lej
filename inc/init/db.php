﻿<?php
/* 
Configuração do Banco do Sistema
*/


function bancoMysqli(){ 
	$servidor = '';
	$usuario = '';
	$senha = '';
	$banco = '';
	$con = mysqli_connect($servidor,$usuario,$senha,$banco); 
	mysqli_set_charset($con,"utf8");
	return $con;
}
