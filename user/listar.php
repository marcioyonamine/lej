<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>
<?php 
$con = bancoMysqli();
switch($_GET['p']){
	case "pf":

?>
  	<section id="list_items">
		<div class="container">
			 <h1>Clientes Pessoas Físicas</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Nome</td>
							<td>CPF</td>
							<td></td>
							<td></td>
							<td></td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_pf ORDER BY nome";
$query_lista = mysqli_query($con,$sql_lista);
while($pessoa = mysqli_fetch_array($query_lista)){
?>
<tr>
<td><?php echo $pessoa['nome'] ?></td>
<td><?php echo $pessoa['cpf'] ?></td>
<td><form action="editar.php?p=fisica" method="post">
<input type="hidden" name="carregarFisica" value="<?php echo $pessoa['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
<td></td>
<td></td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<!--fim_list-->




<?php 
break;
case "pj":

?>
  	<section id="list_items">
		<div class="container">
			 <h1>Clientes Pessoas Jurídicas</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Razão Social</td>
							<td>Nome Fantasia</td>
							<td>CNPJ</td>
							<td></td>
							<td></td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_pj ORDER BY nome";
$query_lista = mysqli_query($con,$sql_lista);
while($pessoa = mysqli_fetch_array($query_lista)){
?>
<tr>
<td><?php echo $pessoa['nome'] ?></td>
<td><?php echo $pessoa['nome_fantasia'] ?></td>
<td><?php echo $pessoa['cnpj'] ?></td>
<td><form action="editar.php?p=juridica" method="post">
<input type="hidden" name="carregarJuridica" value="<?php echo $pessoa['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
<td></td>
<td></td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<!--fim_list-->
<?php 
break;
case "condutor":

?>
  	<section id="list_items">
		<div class="container">
			 <h1>Condutores</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Nome</td>
							<td>CPF</td>
							<td></td>
							<td></td>
							<td></td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_funcionarios ORDER BY nome";
$query_lista = mysqli_query($con,$sql_lista);
while($pessoa = mysqli_fetch_array($query_lista)){
?>
<tr>
<td><?php echo $pessoa['nome'] ?></td>
<td><?php echo $pessoa['cpf'] ?></td>
<td></td>
<td><form action="editar.php?p=condutor" method="post">
<input type="hidden" name="carregarCondutor" value="<?php echo $pessoa['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
<td></td>
<td></td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<?php 
break;
case "os":


?>

  	<section id="list_items">
		<div class="container">
			 <h1>Ordem de Serviço</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Número</td>
   							<td>Pessoa</td>
							<td>Cliente</td>
							<td>Condutor</td>
							<td></td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_os AND publicado = '1' ORDER BY id DESC";
$query_lista = mysqli_query($con,$sql_lista);
while($ar = mysqli_fetch_array($query_lista)){
	if($ar['pessoa'] == 1){
		$cliente = recuperaDados("lej_pf",$ar['cliente'],"id");
		$tipo = "P.F.";	
		$p_cliente = $cliente['nome'];
	}else{
		$cliente = recuperaDados("lej_pj",$ar['cliente'],"id");
		$tipo = "P.J.";	
		$p_cliente = $cliente['nome_fantasia'];
		
	}
	$condutor = recuperaDados("lej_funcionarios",$ar['condutor'],"id");
?>
<tr>
<td><?php echo numOrdem($ar['id']) ?></td>
<td><?php echo $tipo; ?></td>
<td><?php echo $p_cliente; ?></td>
<td><?php echo $condutor['nome']; ?></td>
<td><form action="ordem.php?p=os" method="post">
<input type="hidden" name="carregarOS" value="<?php echo $ar['id'] ?>">
<input type="hidden" name="id_os" value="<?php echo $ar['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
<td></td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<?php 
break;


?>

<?php 
break;
case "os_abertas":
/*
array(3) {
  ["apagarOS"]=>
  string(2) "62"
  ["id_os"]=>
  string(2) "62"
  ["senha"]=>
  string(6) "040717"
}
*/
if(isset($_POST['apagarOS'])){
	if($_POST['senha'] == '040717'){
		$con = bancoMysqli();	
		$id = $_POST['apagarOS'];
		$sql_apagar = "UPDATE lej_os SET publicado = '0' WHERE id = '$id'";
		$query_pagar = mysqli_query($con,$sql_apagar);
		if($query_pagar){
			$mensagem = "O.S. apagada";
		}else{
			$mensagem = "Erro ao apagar O.S.. Tente novamente. ";
		}
	}else{
			$mensagem = "A senha não confere"; 	
	}
	
}

?>

  	<section id="list_items">
		<div class="container">
			 <h1>Ordem de Serviço Abertas</h1>
             <p><?php if(isset($mensagem)){echo $mensagem;}?></p>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Número</td>
   							<td>Pessoa</td>
							<td>Cliente</td>
							<td>Condutor</td>
							<td></td>
   							<td></td>
   							<td>Senha para apagar</td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_os WHERE (valor_cliente = '0' OR valor_condutor = '0')  AND publicado = '1'  ORDER BY id DESC";
$query_lista = mysqli_query($con,$sql_lista);
while($ar = mysqli_fetch_array($query_lista)){
	if($ar['pessoa'] == 1){
		$cliente = recuperaDados("lej_pf",$ar['cliente'],"id");
		$tipo = "P.F.";	
		$p_cliente = $cliente['nome'];
	}else{
		$cliente = recuperaDados("lej_pj",$ar['cliente'],"id");
		$tipo = "P.J.";	
		$p_cliente = $cliente['nome_fantasia'];
		
	}
	$condutor = recuperaDados("lej_funcionarios",$ar['condutor'],"id");
?>
<tr>
<td><?php echo numOrdem($ar['id']) ?></td>
<td><?php echo $tipo; ?></td>
<td><?php echo $p_cliente; ?></td>
<td><?php echo $condutor['nome']; ?></td>
<td><form action="ordem.php?p=os" method="post">
<input type="hidden" name="carregarOS" value="<?php echo $ar['id'] ?>">
<input type="hidden" name="id_os" value="<?php echo $ar['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
<td><form action="listar.php?p=os_abertas" method="post">
<input type="hidden" name="apagarOS" value="<?php echo $ar['id'] ?>">
<input type="hidden" name="id_os" value="<?php echo $ar['id'] ?>">
<input type="submit" value="Apagar" class="btn btn-theme btn-lg btn-block">

</td>
<td>
<input type="password" class="form-control" name="senha" />
</form>
</td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<?php 
break;


?>

<?php 
break;
case "os_fechadas":

?>

  	<section id="list_items">
		<div class="container">
			 <h1>Ordem de Serviço Fechadas</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td>Número</td>
   							<td>Pessoa</td>
							<td>Cliente</td>
							<td>Condutor</td>
							<td></td>

						</tr>
					</thead>
					<tbody>
<?php
$sql_lista = "SELECT * FROM lej_os WHERE valor_cliente <> '0' AND valor_condutor <> '0'  AND publicado = '1'  ORDER BY id DESC";
$query_lista = mysqli_query($con,$sql_lista);
while($ar = mysqli_fetch_array($query_lista)){
	if($ar['pessoa'] == 1){
		$cliente = recuperaDados("lej_pf",$ar['cliente'],"id");
		$tipo = "P.F.";	
		$p_cliente = $cliente['nome'];
	}else{
		$cliente = recuperaDados("lej_pj",$ar['cliente'],"id");
		$tipo = "P.J.";	
		$p_cliente = $cliente['nome_fantasia'];
		
	}
	$condutor = recuperaDados("lej_funcionarios",$ar['condutor'],"id");
?>
<tr>
<td><?php echo numOrdem($ar['id']) ?></td>
<td><?php echo $tipo; ?></td>
<td><?php echo $p_cliente; ?></td>
<td><?php echo $condutor['nome']; ?></td>
<td><?php if($usuario->ID != 6 AND $usuario->ID != 3 ){?><form action="ordem.php?p=os" method="post">
<input type="hidden" name="carregarOS" value="<?php echo $ar['id'] ?>">
<input type="hidden" name="id_os" value="<?php echo $ar['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form><?php }else{ ?>
 <a href="gerar_pdf.php?n=<?php echo $ar['id']?>" role="button" class="btn btn-info" target="_blank">Gerar PDF</a>     

<?php } ?>
</td>
<td></td>

</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>

<?php 
break;


?>

<?php } ?>
<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


