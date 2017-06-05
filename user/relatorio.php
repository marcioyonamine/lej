<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>

<?php 
	switch($_GET['p']){
	case "cliente":
?>


   <div class="container">
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Relatório Cliente</h2>
      </div>
</div>
<section id="contact" class="home-section bg-white">
	<div class="container">

		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">


         </div>
		</div>
		<div class="row">
		<div class="col-md-offset-1 col-md-10">

    
    <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/>
        </div>
        </div>
        <form method="post" class="form_envia" action="relatorio.php?p=gera">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Cliente:</strong><br/>
					<select name="pessoa" id="pessoa" class="form-control">
                    <option value=0>Escolha um tipo de cliente</option>
                    <option value="1">Pessoa Física</option>
                    <option value="2">Pessoa Jurídica</option>

                    </select>
			</div>
		</div>
       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Cliente:</strong><br/>
				<select name="cliente" id="cliente" class="form-control"></select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data Inicio:</strong><br/>
				<input type="text" class="form-control datepicker" id="Minimo" name="data_inicio" >
			</div>				  
			<div class=" col-md-4"><strong>Data Final:</strong><br/>
					<input type="text" class="form-control datepicker" id="saida" name="data_fim" >
			</div>
		</div> 

         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="gerarRelatorioCliente" />
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Gerar Relatório" />      


        </form>


        </div>
        </div>   
         

</div>

        
</section>


    </div> <!-- /container -->


<?php 
break;
case "condutor":
?>

   <div class="container">
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Relatório Condutor</h2>
      </div>
</div>
<section id="contact" class="home-section bg-white">
	<div class="container">

		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">


         </div>
		</div>
		<div class="row">
		<div class="col-md-offset-1 col-md-10">

    
    <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/>
        </div>
        </div>
        <form method="post" class="form_envia" action="relatorio.php?p=gera">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Selecione o condutor:</strong><br/>
					<select name="condutor" id="condutor" class="form-control">
					<?php geraCondutor(); ?>
                    </select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data Inicio:</strong><br/>
				<input type="text" class="form-control datepicker" id="Minimo" name="data_inicio" >
			</div>				  
			<div class=" col-md-4"><strong>Data Final:</strong><br/>
					<input type="text" class="form-control datepicker" id="saida" name="data_fim" >
			</div>
		</div> 

         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="gerarRelatorioCondutor" />
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Gerar Relatório" />      


        </form>


        </div>
        </div>   
         

</div>

        
</section>


    </div> <!-- /container -->


<?php 
break;
case "gera":

$con = bancoMysqli();

if(isset($_POST['gerarRelatorioCondutor'])){
	$titulo = "Relatório Condutor";
	$campo = "Cliente";
	$campo_valor = "Valor condutor";
	$data_inicio = exibirDataMysql($_POST['data_inicio']);
	$data_fim = exibirDataMysql($_POST['data_fim']);
	$id_condutor = $_POST['condutor'];
	$sql_busca = "SELECT * FROM lej_os, lej_numero WHERE data >= '$data_inicio' AND data <= '$data_fim' AND condutor = '$id_condutor' AND lej_os.id = lej_numero.os ORDER BY lej_numero.id DESC";
	$query_busca = mysqli_query($con,$sql_busca);

	// relatório de adiantamento
	
	$sql_busca_adianta = "SELECT * FROM lej_adiantamentos WHERE data >= '$data_inicio' AND data <= '$data_fim' AND funcionario = '$id_condutor' ORDER BY id DESC";
	$query_busca_adianta = mysqli_query($con,$sql_busca_adianta);
	
}

if(isset($_POST['gerarRelatorioCliente'])){
	$titulo = "Relatório Cliente";
	$campo = "Condutor";
	$campo_valor = "Valor cliente";

	$data_inicio = exibirDataMysql($_POST['data_inicio']);
	$data_fim = exibirDataMysql($_POST['data_fim']);
	$id_cliente = $_POST['cliente'];
	$sql_busca = "SELECT * FROM lej_os, lej_numero WHERE data >= '$data_inicio' AND data <= '$data_fim' AND cliente = '$id_cliente' AND lej_os.id = lej_numero.os ORDER BY lej_numero.id DESC";
	$query_busca = mysqli_query($con,$sql_busca);



	
}


?>
  	<section id="list_items">
		<div class="container">
			 <h1><?php echo $titulo; 
			  //echo $sql_busca;
			  ?></h1>
			<div class="table-responsive list_info"><h3>Serviços</h3>
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td><strong>OS</strong></td>
							<td><strong><?php echo $campo; ?></strong></td>
							<td><strong><?php echo $campo_valor; ?></strong></td>
  							<td><strong>Data</strong></td>

						</tr>
					</thead>
					<tbody>
<?php
	$soma = 0;
while($pessoa = mysqli_fetch_array($query_busca)){
if(isset($id_cliente)){
		$valor = $pessoa['valor_cliente'];
		$cond = recuperaDados("lej_funcionarios",$pessoa['condutor'],"id");
		$cliente = $cond['nome'];	

}
if(isset($id_condutor)){
	$valor = $pessoa['valor_condutor'];	
		$valor = $pessoa['valor_cliente'];
	if($pessoa['pessoa'] == 1){
		$cli = recuperaDados("lej_pf",$pessoa['cliente'],"id");	
		$cliente = $cli['nome'];
	}else{
		$cli = recuperaDados("lej_pj",$pessoa['cliente'],"id");	
		$cliente = $cli['nome']."(".$cli['nome_fantasia'].")";

	}	
}

?>
<tr>
<td><?php echo $pessoa['id'] ?></td>
<td><?php echo $cliente; ?></td>
<td><?php echo dinheiroParaBr($valor); ?></td>
<td><?php echo exibirDataBr($pessoa['data']); ?></td>
<?php $soma = $soma + $valor;?>

</tr>

<?php } ?>
<tr>
<td></td>
<td><strong>Total:</strong></td>
<td><?php echo dinheiroParaBr($soma); ?></td>
<td></td>

</tr>
					
					</tbody>
				</table>
			</div>
            			<div class="table-responsive list_info"><h3>Adiantamentos</h3>
                        <?php //echo $sql_busca_adianta; ?>
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td><strong>ID</strong></td>
							<td><strong>valor</strong></td>
							<td><strong>Data</strong></td>
						</tr>
					</thead>
					<tbody>
<?php
	$soma_adianta = 0;
while($pessoa = mysqli_fetch_array($query_busca_adianta)){
?>
<tr>
<td><?php echo $pessoa['id'] ?></td>
<td><?php echo dinheiroParaBr($pessoa['valor']); ?></td>
<td><?php echo exibirDataBr($pessoa['data']); ?></td>
<?php $soma_adianta = $soma_adianta + $pessoa['valor'];?>

</tr>

<?php } ?>
<tr>
<td></td>
<td><strong>Total:</strong></td>
<td><?php echo dinheiroParaBr($soma_adianta); ?></td>
<td></td>

</tr>
					
					</tbody>
				</table>
			</div>
<h3>Do dia <?php echo exibirDataBr($data_inicio); ?> a <?php echo exibirDataBr($data_inicio); ?> há um total de <strong><?php echo dinheiroParaBr($soma) ?></strong> em serviços e <strong><?php echo dinheiroParaBr($soma_adianta) ?></strong> em adiantamentos, totalizando: <strong><?php echo dinheiroParaBr($soma - $soma_adianta); ?> </strong></h3>

		</div>
	</section>



<?php 
break;
default:

?>
   <div class="container">
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Relatório Cliente</h2>
      </div>
</div>
<section id="contact" class="home-section bg-white">
	<div class="container">

		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
		<h2>Não há relatório para exibir. Tente novamente.</h2>

         </div>
		</div>


</div>

        
</section>


    </div> <!-- /container -->

<?php 
break;
?>

<?php } //fim da switch?>


<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


