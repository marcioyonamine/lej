<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>
 <?php 
 if(isset($_GET['p'])){
	$p = $_GET['p'];	 
}else{
	$p = "insere";	
}
 
?>

<?php 
switch($p){
	case "insere":
	
?>
 
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Nova Ordem de Serviço</h2>
            <p>Preencha todos os campos corretamente </p>
			<p>Os campos "Endereço Meio" não são obrigatórios. Porém, devem ser preenchidos na ordem.</p>
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
        <form method="post" class="form_envia" action="ordem.php?p=os">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Tipo:</strong><br/>
					<select name="tipo_os" id="tipo_os" class="form-control">
                    <option value=0>Escolha o tipo de serviço</option>
                    <option value="1">Chamada</option>
                    <option value="2">Retirada</option>

                    </select>
			</div>
		</div>
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
        <!--
        <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Solicitante:</strong><br/>
			<input type="text" class="form-control" id="Solicitante" name="solicitante" placeholder="Solicitante">
			</div>
		</div>
        
		<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Condutor:</strong><br/>
				<select name="condutor" id="condutor" class="form-control">
                <option>Escolha o Condutor</option>
                <?php geraCondutor(); ?>
                </select>
			</div>
		</div>
    
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data:</strong><br/>
				<input type="text" class="form-control datepicker" id="Numero" name="data" placeholder="Data">
			</div>				  
			<div class=" col-md-4"><strong>Saída:</strong><br/>
					<input type="text" class="form-control hora" id="Complemento" name="saida" placeholder="Complemento">
			</div>
		</div> 

       	<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Anotações:</strong><br/>
				<textarea name="anotacao" class="form-control" rows="10" placeholder=""></textarea>
			</div>
		</div>-->
         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="criarOS" />
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Criar O.S." />      


        </form>


        </div>
        </div>   
         

</div>

        
</section>

    </div> <!-- /container -->


        <script src="../inc/googlemapstrack/js/jquery.min.js"></script>
		
        <!-- Maps API Javascript -->
       		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GLOBALS['google_maps_key'];?>"
			type="text/javascript"></script>
 
        <!-- Arquivo de inicialização do mapa -->
		<script src="../inc/googlemapstrack/js/mapa.js"></script>


<?php break; // fim da case "chamada" ?>

<?php 
	case "os":
	$con = bancoMysqli();
	if(isset($_POST['criarOS'])){
		$tipo_os = $_POST['tipo_os'];
		$pessoa = $_POST['pessoa'];
		$cliente = $_POST['cliente'];
		$sql_insere_os = "INSERT INTO `lej_os` (`id`, `pessoa`, `cliente`, `publicado`) VALUES (NULL, '$pessoa', '$cliente', '1')";
		$query_insere_os = mysqli_query($con,$sql_insere_os);
		if($query_insere_os){
			$men = "Insere ok";
			$id_os = mysqli_insert_id($con);
			$os = recuperaDados("lej_os",$id_os,"id");	
		}
	}
	
	if(isset($_POST['editarOS'])){ 
	$id = $_POST['editarOS'];
	  $solicitante = $_POST['solicitante'];
	  $condutor = $_POST['condutor'];
	  $data = exibirDataMysql($_POST['data']);
	  $saida = $_POST['saida'];
	  $anotacao = $_POST['anotacao'];
	  $minimo = $_POST['Minimo'];
	  $fechamento = $_POST['Fechamento'];
	  $valor_cliente = dinheiroDeBr($_POST['valor_cliente']);
	  $valor_condutor = dinheiroDeBr($_POST['valor_condutor']);
	  
	$sql_update_os = "UPDATE lej_os SET
		solicitante = 	  '$solicitante',
	  condutor = '$condutor',
	  data = '$data', 
	  saida = '$saida',
	  obs = '$anotacao',
	  minimo = '$minimo',
	  fechamento = '$fechamento',
	  valor_cliente = '$valor_cliente',
	  valor_condutor = '$valor_condutor'
	  WHERE id = '$id'";

	$query_update_os = mysqli_query($con,$sql_update_os);
	if($query_update_os){
		$men = "Atualizado com Sucesso";	
	}else{
		$men = $sql_update_os;	
	}	  
	  $os = recuperaDados("lej_os",$id,"id");	
		$cliente = $os['cliente'];
		$pessoa = $os['pessoa'];


		
		
	}
	
	if(isset($_POST['carregarOS'])){
		//$tipo_os = $_POST['tipo_os'];
		$id = $_POST['id_os'];
		$os = recuperaDados("lej_os",$id,"id");	
		$cliente = $os['cliente'];
		$pessoa = $os['pessoa'];

	}
	
	if(isset($_POST['gerarNumeroOS'])){
		$id = $_POST['gerarNumeroOS'];
		$sql_gera = "INSERT INTO lej_numero (os) VALUE ('$id')";
		$query_gera = mysqli_query($con,$sql_gera);
		if($query_gera){
			$num_os = mysqli_insert_id($con);
			$men = "Número de OS $num_os gerado com sucesso.";	
		}

		$os = recuperaDados("lej_os",$id,"id");	
		$cliente = $os['cliente'];
		$pessoa = $os['pessoa'];

	}
	
$num = numOrdem($os['id']);
?>

 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Nova Ordem de Serviço - <?php if($num != NULL){echo "O.S.".$num;} ?></h2>
            <p>Preencha todos os campos corretamente </p>
            <p><?php if(isset($men)){echo $men;}?></p>

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
        <form method="post" class="form_envia" action="ordem.php?p=os">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Informações do cliente:</strong><br/><br />
            <?php 
			if($pessoa == 1){
				$client = recuperaDados("lej_pf",$cliente,"id");
				$end = retornaEndereco($client['cep']);
				?>
                <table class="table-striped">
                <thead>
                      <tr>
			        <th width="30%"></th>
        			<th width="70%">
                    </th>
      				</tr>
                    </thead>
                    <tbody>
                <tr>
                <td>Nome do Cliente</td><td> <?php echo $client['nome'] ?></td>
                </tr>
                <tr>
                <td>Endereço</td> <td><?php echo $end['rua'].", ".$client['numero']." - ".$client['complemento']."<br />".$end['bairro'].", ".$end['cidade']."/".$end['estado'];?></td>
                </tr>
                <tr>
                <td>Telefones</td><td> <?php echo $client['telefone01'] ?> /  <?php echo $client['telefone02'] ?> /  <?php echo $client['telefone03'] ?></td>
                </tr>
                </tbody>
                </table>
				<?php 	
			}
			elseif($pessoa == 2){
				$client = recuperaDados("lej_pj",$cliente,"id");
				$end = retornaEndereco($client['cep']);
				?>
                <p class="cliente">Nome Fantasia: <?php echo $client['nome_fantasia'] ?></p>
                <p class="cliente">Razão Social: <?php echo $client['nome'] ?></p>
                <p class="cliente">Endereço: <?php echo $end['rua'].", ".$client['numero']." - ".$cleint['complemento']."<br />".$end['bairro'].", ".$end['cidade']."/".$end['estado'];?></p>
                <p class ="cliente">Telefones: <?php echo $client['telefone01'] ?> /  <?php echo $client['telefone02'] ?> /  <?php echo $client['telefone03'] ?></p>
	            <p class ="cliente">Contatos: <?php echo $client['contato01'] ?> ( <?php echo $client['cargo01'] ?>) /  <?php echo $client['contato02'] ?> ( <?php echo $client['cargo02'] ?>) / <?php echo $client['contato03'] ?> ( <?php echo $client['cargo03'] ?>)</p>

			<?php }
			
			?>
<br /><Br />
		</div>
        </div>

        <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Solicitante (se não estiver listado nos contatos):</strong><br/>
			<input type="text" class="form-control" id="Solicitante" name="solicitante" placeholder="Solicitante" value="<?php echo $os['solicitante'] ?>">
			</div>
		</div>
        
		<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Condutor:</strong><br/>
				<select name="condutor" id="condutor" class="form-control">
                <option>Escolha o Condutor</option>
                <?php geraCondutor($os['condutor']); ?>
                </select>
			</div>
		</div>
    
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data:</strong><br/>
				<input type="text" class="form-control datepicker" id="Numero" name="data" value="<?php echo exibirDataBr($os['data']) ?>">
			</div>				  
			<div class=" col-md-4"><strong>Saída:</strong><br/>
					<input type="text" class="form-control hora" id="Complemento" name="saida" value="<?php echo $os['saida'] ?>">
			</div>
		</div> 

       	<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Anotações:</strong><br/>
				<textarea name="anotacao" class="form-control" rows="10" placeholder=""><?php echo $os['obs'] ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Mínimo:</strong><br/>
				<input type="text" class="form-control hora" id="Minimo" name="Minimo" value="<?php echo $os['minimo'] ?>">
			</div>				  
			<div class=" col-md-4"><strong>Fechamento:</strong><br/>
					<input type="text" class="form-control hora" id="saida" name="Fechamento" value="<?php echo $os['fechamento'] ?>">
			</div>
		</div> 
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Valor Cliente:</strong><br/>
				<input type="text" class="form-control valor_real" id="valor_cliente" name="valor_cliente" value="<?php echo dinheiroParaBr($os['valor_cliente']) ?>">
			</div>				  
			<div class=" col-md-4"><strong>Valor Condutor:</strong><br/>
					<input type="text" class="form-control valor_real" id="valor_condutor" name="valor_condutor" value="<?php echo dinheiroParaBr($os['valor_condutor']) ?>">
			</div>
		</div>         
         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="editarOS" value="<?php echo $os['id'];?>">
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Gravar O.S." />      


        </form>


        </div>
        </div>   
<?php 
$num = numOrdem($os['id']);

if($num == NULL){
?>
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 
        <form method="post" class="form_envia" action="ordem.php?p=os">

		<input type="hidden" name="gerarNumeroOS" value="<?php echo $os['id'];?>">
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Gerar Número O.S." />      
        </form>


        </div>
        </div>            
<?php } ?>


<?php 
echo $num;
if($num > 0){
?>
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		 <a href="gerar_pdf.php?n=<?php echo $os['id']?>" role="button" class="btn btn-info" target="_blank">Gerar PDF</a>      


        </div>
        </div>            
<?php } ?>
         

</div>

        
</section>

    </div> <!-- /container -->

<?php 
break; // fim de os
?>




<?php } //fim da switch?>

<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


