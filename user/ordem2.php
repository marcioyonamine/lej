<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>
<?php 


// verifica se o nome se os dados estão ok
if($_POST["pessoa"] == 0 || $_POST["condutor"] == "Escolha o Condutor" || $_POST['data'] == "" || $_POST['saida'] == "" || $_POST["partida"]  == "" ||
  $_POST["chegada"] == "" ){
	?>
    <section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h2>Erro ao inserir nova Comanda</h2>
            <p><?php if(isset($men)){echo $men;} ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						<?php 
						if($_POST["pessoa"] == 0 || $_POST['cliente'] ==  0) { echo "<p>É preciso selecionar um cliente para a comanda.</p>"; }
						if($_POST["condutor"] == "Escolha o Condutor"){ echo "<p>É preciso selecionar um condutor para a comanda.</p>"; }
						if($_POST['data'] == ""){ echo "<p>É preciso determinar uma data para a comanda.</p>"; }
						if($_POST['saida'] == ""){ echo "<p>É preciso determinar uma hora de saída para a comanda.</p>"; }
						if($_POST["partida"]  == ""){ echo "<p>É preciso definir um ponto de partida.</p>"; }
						if($_POST["chegada"] == "" ) { echo "<p>É preciso definir um ponto de chegada.</p>"; }
						
						
						
						echo "<p></p>";
						?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
                        	
							
							<a href="ordem.php" class="btn btn-info" role="button"  > Voltar </a>
						</div>
					</div>
			
	  		</div>	
	  	</div>
	</div>
</section>
    
    
    <?php
	  
	   
}else{



$total = 0;
$gmaps = new gMaps($GLOBALS['google_maps_key']);
// Pega os dados (latitude, longitude e zoom) do endereço:
$dados_partida =  converterObjParaArray($gmaps->geoLocal($_POST['partida']));
$dados_chegada =  converterObjParaArray($gmaps->geoLocal($_POST['chegada']));


if($_POST['end01'] != ""){
	$dados_end01 = converterObjParaArray($gmaps->geoLocal($_POST['end01']));	
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_end01['lat'], $dados_end01['lng']);
	$end01 = $gmaps->enderecoFormatado($_POST['end01']);	
}else{
	$dados_end01 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
	$end01 = "";
}

if($_POST['end02'] != ""){
	$dados_end02 = converterObjParaArray($gmaps->geoLocal($_POST['end02']));	
	$total = $total + distancia($dados_end01['lat'], $dados_end01['lng'],$dados_end02['lat'], $dados_end02['lng']);	
	$end02 = $gmaps->enderecoFormatado($_POST['end02']);	

}else{
	$end02 = "";
	$dados_end02 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end03'] != ""){
	$dados_end03 = converterObjParaArray($gmaps->geoLocal($_POST['end03']));	
	$total = $total + distancia($dados_end02['lat'], $dados_end02['lng'],$dados_end03['lat'], $dados_end03['lng']);	
	$end03 = $gmaps->enderecoFormatado($_POST['end03']);	

}else{
	$end03 = "";
	$dados_end03 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end04'] != ""){
	$dados_end04 = converterObjParaArray($gmaps->geoLocal($_POST['end04']));	
	$total = $total + distancia($dados_end03['lat'], $dados_end03['lng'],$dados_end04['lat'], $dados_end04['lng']);	
	$end04 = $gmaps->enderecoFormatado($_POST['end04']);	

}else{
	$end04 = "";
	$dados_end04 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

if($_POST['end05'] != ""){
	$dados_end05 = converterObjParaArray($gmaps->geoLocal($_POST['end05']));	
	$total = $total + distancia($dados_end04['lat'], $dados_end04['lng'],$dados_end05['lat'], $dados_end05['lng']);	
	$end05 = $gmaps->enderecoFormatado($_POST['end05']);	

}else{
	$end05 = "";
	$dados_end05 = NULL;
	$total = distancia($dados_partida['lat'], $dados_partida['lng'],$dados_chegada['lat'], $dados_chegada['lng']);	
}

  $pessoa = $_POST["pessoa"];
  $cliente = $_POST["cliente"];
  $condutor = $_POST["condutor"];
  $data = $_POST["data"];
  $saida = $_POST["saida"];
  $obs =  $_POST["anotacao"];
  $partida = $gmaps->enderecoFormatado($_POST["partida"]);
  $chegada = $gmaps->enderecoFormatado($_POST["chegada"]);
  $con = bancoMysqli();


$sql_insere = "INSERT INTO `lej_comanda` (`id`, `pessoa`,`cliente`, `condutor`, `partida`, `chegada`, `meio01`, `meio02`, `meio03`, `meio04`, `meio05`, `distancia`, `valor`, `referencia`, `desconto`, `hora_cadastro`, `hora_aceite`, `hora_ini`, `hora_fin`, `nota_fiscal`, `instrucao_nota`, `instrucao_boleto`, `n_vias`, `obs`, `publicado`) 
			VALUES (NULL, '$pessoa', '$cliente', '$condutor', '$partida', '$chegada', '$end01', '$end02', '$end03', '$end04', '$end05', '$total', '', '', '', '', '', '$saida', '', '', '', '', '', '$obs', '')";
$query_insere = mysqli_query($con,$sql_insere);
if($query_insere){
	$id_comanda = mysqli_insert_id($con);
	$comanda = recuperaDados("lej_comanda",$id_comanda,"id");
}


?>


   <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">Confirmação de Comanda</h1>
        <p class="lead blog-description">Verifique se todas as informações estão corretas.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">Cliente: <?php 
			$client = recuperaCliente($comanda['cliente'],$comanda['pessoa']);
			echo  $client['nome']; ?></h2>
            <p><strong>Doc:</strong> <?php echo  $client['doc']; ?> - <strong>contato/tel/email:</strong> <?php echo $client['contato']; ?> / <?php echo $client['telefone']; ?> / <?php echo $client['email']; ?>  </p>
			<h2>Rota</h2>
            <div class="table-responsive list_info">
				<table class="table table-condensed">
            <tr>
            <td>Início:</td>
            <td> <?php echo $comanda['partida']; ?></td>
            </tr>
			<?php if($comanda['meio01'] != ""){ echo "<tr><td>Ponto #01</td><td> ".$comanda['meio01']."</td></tr>"; } ?>
			<?php if($comanda['meio02'] != ""){ echo "<tr><td>Ponto #02</td><td> ".$comanda['meio02']."</td></tr>"; } ?>
			<?php if($comanda['meio03'] != ""){ echo "<tr><td>Ponto #03</td><td> ".$comanda['meio03']."</td></tr>"; } ?>
			<?php if($comanda['meio04'] != ""){ echo "<tr><td>Ponto #04</td><td> ".$comanda['meio04']."</td></tr>"; } ?>
			<?php if($comanda['meio05'] != ""){ echo "<tr><td>Ponto #05</td><td> ".$comanda['meio05']."</td></tr>"; } ?>            
            
            <tr>
            <td>Chegada:</td>
            <td> <?php echo $comanda['chegada']; ?></td>
            
            </tr>
            <tr><td></td><td>Distância total: <?php echo $total;?> km</td></tr>
            
            	</table>
            
            </div>
            <h2>Anotações / Observações</h2>
			<p><?php echo $comanda['obs']; ?></p>

            <h2 class="blog-post-title">Condutor: <?php 
			$condutor = recuperaCliente($comanda['condutor'],$comanda['pessoa']);
			echo  $condutor['nome']; ?></h2>



          </div><!-- /.blog-post -->

	

        </div><!-- /.blog-main -->

       

      </div><!-- /.row -->

    </div> <!-- /container -->




<?php 
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

?>

<?php } // end if campos vazios?>
<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


