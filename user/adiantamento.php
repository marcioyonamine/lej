<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>

<?php 
$con = bancoMysqli();
	switch($_GET['p']){
	case "lista":
	default:
?>

  	<section id="list_items">
		<div class="container">
			 <h1>Adiantamentos</h1>
			<div class="table-responsive list_info">
				<table class="table table-condensed"><script type=text/javascript language=JavaScript src=../js/find2.js> </script>
					<thead>
						<tr class="list_menu">
							<td><strong>id</strong></td>
							<td><strong>Condutor</strong></td>
							<td><strong>Valor</strong></td>
  							<td><strong>Data</strong></td>
  							<td></td>
						</tr>
					</thead>
					<tbody>
<?php

$sql_busca = "SELECT * FROM lej_adiantamentos ORDER BY id DESC";
$query_busca = mysqli_query($con,$sql_busca);
while($ad = mysqli_fetch_array($query_busca)){
	$condutor = recuperaDados("lej_funcionarios",$ad['funcionario'],"id");
?>
<tr>
<td><?php echo $ad['id'] ?></td>
<td><?php echo $condutor['nome']; ?></td>
<td><?php echo dinheiroParaBr($ad['valor']); ?></td>
<td><?php echo exibirDataBr($ad['data']); ?></td>
<td><form action="adiantamento.php?p=edita" method="post">
<input type="hidden" name="carregarAdianta" value="<?php echo $ad['id'] ?>">
<input type="submit" value="editar" class="btn btn-theme btn-lg btn-block">
</form></td>
</tr>

<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
	</section>


<?php 
	break;
	case "insere":
?>
   <div class="container">
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Insere adiantamento</h2>
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
        <form method="post" class="form_envia" action="adiantamento.php?p=edita">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Selecione o condutor:</strong><br/>
					<select name="condutor" id="condutor" class="form-control">
					<?php geraCondutor(); ?>
                    </select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data:</strong><br/>
				<input type="text" class="form-control datepicker" id="Minimo" name="data_inicio" >
			</div>				  
			<div class=" col-md-4"><strong>valor:</strong><br/>
					<input type="text" class="form-control valor_real" id="saida" name="valor" >
			</div>
		</div> 
       	<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Anotações:</strong><br/>
				<textarea name="obs" class="form-control" rows="10" placeholder=""></textarea>
			</div>
		</div>
        

         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="insereAdianta" />
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Gerar adiantamento" />      


        </form>


        </div>
        </div>   
         

</div>

        
</section>
<?php 
	break;
	case "edita":
	$con = bancoMysqli();	
   $condutor = $_POST["condutor"];
   $data = exibirDataMysql($_POST["data_inicio"]);
   $valor = dinheiroDeBr($_POST["valor"]);
   $obs = $_POST["obs"];
	//$
	
	if(isset($_POST['insereAdianta'])){
		$sql_insere = "INSERT INTO `lej_adiantamentos` (`id`, `funcionario`, `valor`, `data`, `obs`) 
		VALUES (NULL, '$condutor', '$valor', '$data', '$obs')";
		$query_insere = mysqli_query($con,$sql_insere);
		if($query_insere){
			$men = "Adiantamento inserido com sucesso";	
			$id = mysqli_insert_id($con);
			$adianta = recuperaDados("lej_adiantamentos",$id,"id");
		}else{
			$men = "Erro";	
		}
	}
	
	if(isset($_POST['editaAdianta'])){
		$id = $_POST['editaAdianta'];
		$sql_update = "UPDATE lej_adiantamentos SET
		funcionario = '$condutor',
 		data = '$data',
		valor = '$valor',
	  	obs = '$obs'
		WHERE id = '$id'";	
		$query_update = mysqli_query($con,$sql_update);
		if($query_update){
			$men = "Adiantamento atualizado com sucesso";
				
		}else{
			$men = "Erro";	
	
		}
		$adianta = recuperaDados("lej_adiantamentos",$id,"id");
		
	}
	
	if(isset($_POST['carregarAdianta'])){
		$id = $_POST['carregarAdianta'];
		$adianta = recuperaDados("lej_adiantamentos",$id,"id");
	}
	
?>

   <div class="container">
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Edita adiantamento</h2>
        <p><?php if(isset($men)){echo $men;} ?></p>
        <p><?php //echo $sql_update; ?></p>
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
        <form method="post" class="form_envia" action="adiantamento.php?p=edita">

       <div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Selecione o condutor:</strong><br/>
					<select name="condutor" id="condutor" class="form-control">
					<?php geraCondutor($adianta['funcionario']); ?>
                    </select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data:</strong><br/>
				<input type="text" class="form-control datepicker" id="Minimo" name="data_inicio" value="<?php echo exibirDataBr($adianta['data']); ?>">
			</div>				  
			<div class=" col-md-4"><strong>valor:</strong><br/>
					<input type="text" class="form-control valor_real" id="saida" name="valor" value="<?php echo dinheiroParaBr($adianta['valor']); ?>">
			</div>
		</div> 
       	<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Anotações:</strong><br/>
				<textarea name="obs" class="form-control" rows="10" placeholder=""><?php echo $adianta['obs']; ?></textarea>
			</div>
		</div>
        

         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 

		<input type="hidden" name="editaAdianta" value="<?php echo $adianta['id']; ?>" />
		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Atualizar adiantamento" />      


        </form>


        </div>
        </div>   
         

</div>

        
</section>

<?php 
	break;

?>

<?php } ?>

<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


