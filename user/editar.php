
<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>
<?php 
if(isset($_GET['p'])){
	$p = $_GET['p'];	
}else{
	$p = "fisica";	
}
?>
<!-- Abrir espaço-->
<div class="col-xs-12" style="height:100px;"></div>
<?php 
switch($p){

	case "juridica":
		$con = bancoMysqli();
	//carrega as variáveis		
	  $razao = $_POST["RazaoSocial"];
  	  $fantasia = $_POST["NomeFantasia"];
	  $cnpj = $_POST["CNPJ"];
	  $inscricao = $_POST["inscricao"];
	  $cep = $_POST["CEP"];
	  $numero = $_POST["Numero"];
	  $complemento = $_POST["Complemento"];
	  
	  $contato01 = $_POST["Contato01"];
	  $cargo01 = $_POST['Cargo01'];
	  $contato02 = $_POST["Contato02"];
	  $cargo02 = $_POST['Cargo02'];
	  $contato03 = $_POST["Contato03"];
	  $cargo03 = $_POST['Cargo03'];	  
	  $tel01 = $_POST["Telefone1"];
	  $tel02 = $_POST["Telefone2"];
	  $tel03 = $_POST["Telefone3"];
	  $email = $_POST["Email"];
	  $obs = $_POST["Observacao"];
	 $ponto = $_POST["Ponto"];
	 $forma = $_POST['Forma'];	
	 $obs = $_POST['Observacao'];
	// cadastra um novo cliente
	if(isset($_POST['cadastrarJuridica'])){
	$ver_doc = verificaDoc($cnpj);
		if($ver_doc == 0){		
			$sql_insert = "INSERT INTO `lej_pj` (`id`, `id_wp`, `funcao`, `nome`,`nome_fantasia`, `cnpj`, `inscricao`, `cep`, `numero`, `complemento`, `email`, `contato01`, `cargo01`, `contato02`, `cargo02`, `contato03`, `cargo03`, `telefone01`, `telefone02`, `telefone03`, `ponto`, `forma_pagamento`, `obs`, `data_atualizacao`) 
			VALUES (NULL, '', '', '$razao', '$fantasia', '$cnpj', '$inscricao', '$cep', '$numero', '$complemento', '$email', '$contato01', '$cargo01', '$contato02', '$cargo02', '$contato03', '$cargo03', '$tel01', '$tel02', '$tel03', '$ponto', '$forma', '$obs', '')";
			$query_insert = mysqli_query($con,$sql_insert);
			if($query_insert){
				$men = "Inserido com sucesso!";
				$id = mysqli_insert_id($con);
				$pessoa = recuperaDados("lej_pj",$id,"id");
			}else{
				$men = "Erro ao inserir";			
			}
		}
		
	}else{
		
	
	}


	// edita um novo cliente
	if(isset($_POST['editarJuridica'])){
		$id = $_POST['editarJuridica'];
		$sql_update = "UPDATE lej_pj SET
		nome = '$razao', 
		cnpj = '$cnpj', 
		cep = '$cep', 
		numero = '$numero', 
		complemento = '$complemento', 
		email = '$email', 
		contato01 = '$contato01', 
		cargo01 = '$cargo01',
		contato02 = '$contato02', 
		cargo02 = '$cargo02',
		contato03 = '$contato03', 
		cargo03 = '$cargo03',
		ponto = '$ponto',
		forma_pagamento = '$forma',
		nome_fantasia = '$fantasia',
		telefone01 = '$tel01', 
		telefone02 = '$tel02', 
		telefone03 = '$tel03',
		obs = '$obs', 
		inscricao = '$inscricao'
		
		WHERE id = '$id';
					
		";
		$query_update = mysqli_query($con,$sql_update);
		if($query_update){
			$men = "Atualizado com sucesso!";
			$pessoa = recuperaDados("lej_pj",$id,"id");
		}else{
			$men = "Erro ao atualizar<br />".$sql_update;			
		}	
		
	}


if(isset($_POST['carregarJuridica'])){
	$pessoa = recuperaDados("lej_pj",$_POST['carregarJuridica'],"id");
}

if($ver_doc == 0){

?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA JURÍDICA</h3>
            <p><?php if(isset($men)){ echo $men;} ?></p>
            </div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=juridica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Razão Social:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="RazaoSocial" placeholder="RazaoSocial" value="<?php echo $pessoa['nome'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome Fantasia:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="NomeFantasia" placeholder="Nome Fantasia" value="<?php echo $pessoa['nome_fantasia'] ?>" >
						</div>
					</div>                    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CNPJ:</strong><br/>
							<input type="text" class="form-control cnpj" id="CNPJ" name="CNPJ" placeholder="CNPJ" value="<?php echo $pessoa['cnpj'] ?>">
						</div>
						<div class="col-md-4"><strong>Inscrição:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="inscricao" placeholder="Inscrição" value="<?php echo $pessoa['inscricao'] ?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CEP *:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP"  value="<?php echo $pessoa['cep'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado" readonly>
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" readonly>
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Complemento:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento'] ?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Contato 01:</strong><br/>
							<input type="text" class="form-control" id="Contato01" name="Contato01" value="<?php echo $pessoa['contato01'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Cargo 01:</strong><br/>
							<input type="text" class="form-control" id="Cargo01" name="Cargo01" value="<?php echo $pessoa['cargo01'] ?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Contato 02:</strong><br/>
							<input type="text" class="form-control" id="Contato02" name="Contato02" value="<?php echo $pessoa['contato02'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Cargo 02:</strong><br/>
							<input type="text" class="form-control" id="Cargo02" name="Cargo02" value="<?php echo $pessoa['cargo02'] ?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Contato 03:</strong><br/>
							<input type="text" class="form-control" id="Contato03" name="Contato03" value="<?php echo $pessoa['contato03'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Cargo 03:</strong><br/>
							<input type="text" class="form-control" id="Cargo03" name="Cargo03" value="<?php echo $pessoa['cargo03'] ?>">
						</div>
					</div>  
                    
                    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone Fixo:</strong><br/>
							<input type="text" class="form-control tel_dd" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone01'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Celular 01:</strong><br/>
							<input type="text" class="form-control cel_dd" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone02'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular 02:</strong><br/>
							<input type="text" class="form-control cel_dd"  name="Telefone3" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone03'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email'] ?>">
						</div>
					</div>
  					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Valor do Ponto:</strong><br/>
							<input type="text" class="form-control valor_real" id="Ponto" name="Ponto" placeholder="Valor do ponto" value="<?php echo $pessoa['ponto'] ?>" >
						</div>
					</div>   
                    					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Forma de pagamento:</strong><br/>
							<input type="text" class="form-control" id="Forma" name="Forma" placeholder="Forma de pagamento" value="<?php echo $pessoa['forma_pagamento'] ?>" >
						</div>
					</div>   
                    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observações:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""><?php echo $pessoa['obs'] ?></textarea>
						</div>
					</div>
					<!-- Botão Gravar -->	
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="editarJuridica" value="<?php echo $pessoa['id']; ?>" />
							<input type="submit" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>	
		</div>		
	</div>
</section>
<?php }else{ ?>
<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA JURÌDICA</h3>
            <p><?php if(isset($men)){echo $men;} ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=juridica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						<p>O CPF <?php echo $cnpj ?> já existe no sistema. Gostaria de editá-lo?</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
                        	
							<input type="hidden" name="carregarJuridica" value="<?php echo $ver_doc; ?>" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="Carregar" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>
<?php } ?>

<?php 

	break;
	
	case "fisica":
  $con = bancoMysqli();
  $nome = $_POST["Nome"];
  $rg = $_POST["RG"];
  $cpf  = $_POST["CPF"];
  $cep = $_POST["CEP"];
  $numero = $_POST["Numero"];
  $bairro = $_POST["Bairro"];
  $complemento = $_POST["Complemento"];
  $cidade = $_POST["Cidade"];
  $estado = $_POST["Estado"];
  $email = $_POST["Email"];
  $tel01 = $_POST["Telefone1"];
  $tel02 = $_POST["Telefone2"];
  $tel03 = $_POST["Telefone3"];
  $ponto = dinheiroDeBr($_POST["Ponto"]);
  $forma = $_POST["Forma"];  
  $obs = addslashes($_POST["Observacao"]);

//Cadastrar Nova
if(isset($_POST ['cadastrarFisica'])){
	$ver_doc = verificaDoc($cpf,6);
	if($ver_doc == 0){
		$sql_insert = "INSERT INTO `lej_pf` (`id`, `id_wp`, `nome`, `cpf`, `rg`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `email`, `fixo`, `forma_pagamento`, `obs`) VALUES (NULL, '', '$nome', '$cpf', '$rg', '$cep', '$numero', '$complemento', '$tel01', '$tel02', '$tel03', '$email', '$ponto', '$forma', '$obs');;";
		
		$query_insert = mysqli_query($con, $sql_insert);
		if($query_insert){
			$idPessoa = mysqli_insert_id($con);
			$pessoa = recuperaDados("lej_pf",$idPessoa,"id");
			$men = "Inserido";	
			
		}else{
			$men = "Erro.<br />$sql_insert";
		}
	}else{
		echo '<meta http-equiv="Location" content="cadastro.php?p=fisica&m=1">';
	}
}
//Editar cadastro
if(isset($_POST['editarFisica'])){
	$id = $_POST['editarFisica'];
	$sql_update = "UPDATE lej_pf SET
  nome = '$nome', 
  rg = '$rg', 
  cpf = '$cpf', 
  cep = '$cep', 
  numero = '$numero', 
  complemento = '$complemento',
  email = '$email',
  telefone01 = '$tel01',
  telefone02 = '$tel02',
  telefone03 = '$tel03',
  fixo = '$ponto',
  forma_pagamento = '$forma',  
  obs = '$obs'
  WHERE id = '$id'";
	$query_update = mysqli_query($con, $sql_update);
	if($query_update){
		$pessoa = recuperaDados("lej_pf",$id,"id");
		$men = "Atualizado";	
		
	}else{
		$men = "Erro.<br />$sql_update";
	}

}

if(isset($_POST['carregarFisica'])){
	$pessoa = recuperaDados("lej_pf",$_POST['carregarFisica'],"id");
}

if($ver_doc == 0){

?>
<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA FÍSICA</h3>
            <p><?php if(isset($men)){echo $men;} ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=fisica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="Nome" placeholder="Nome" value="<?php echo $pessoa['nome'] ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF *:</strong><br/>
							<input type="text" class="form-control cpf" id="CPF" name="CPF" placeholder="CPF" value="<?php echo $pessoa['cpf'] ?>">
						</div>					  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="RG" placeholder="Documento" value="<?php echo $pessoa['rg'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Email:</strong><br/>
						<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email'] ?>">
                        	
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
                        <input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP" value="<?php echo $pessoa['cep'] ?>">
									
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" readonly >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
                       <input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero'] ?>">					
						
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
                          <input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" readonly >
                      
 							
						</div>
					</div>
	
    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Cidade *:</strong><br/>
                        
                        <input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade" readonly >
						
						</div>
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado" readonly>
						</div>
					</div>		 
                    					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
  <input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento'] ?>">
						</div>
					</div> 
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone Fixo *:</strong><br/>
                        <input type="text" class="form-control tel_dd" id="telefone"  maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 2765-4321" value="<?php echo $pessoa['telefone01'] ?>" >
						</div>				  
						<div class=" col-md-4"><strong>Celular #1:</strong><br/>
						<input type="text" class="form-control cel_dd" id="telefone"  maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone02'] ?>" >	
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular #2:</strong><br/>
					<input type="text" class="form-control cel_dd" id="telefone"  maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone03'] ?>">		
						</div>				  
						<div class="col-md-4"><strong>Valor do ponto:</strong><br/>
						<input type="text" class="form-control valor_real "  maxlength="15" name="Ponto" placeholder="" value="<?php echo dinheiroParaBr($pessoa['fixo']) ?>">		
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Forma de pagamento *:</strong><br/>
							<input type="text" class="form-control" name="Forma" placeholder="" value="<?php echo $pessoa['forma_pagamento'] ?>">
						</div>
					</div> 	
                    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observação:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""><?php echo $pessoa['obs'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="editarFisica" value="<?php echo $pessoa['id']; ?>" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>
<?php 
}else{
?>
<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA FÍSICA</h3>
            <p><?php if(isset($men)){echo $men;} ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=fisica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						<p>O CPF <?php echo $cpf ?> já existe no sistema. Gostaria de editá-lo?</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
                        	
							<input type="hidden" name="carregarFisica" value="<?php echo $ver_doc; ?>" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="Carregar" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>
<?php		
}
?>


<?php 
	break;
	case "condutor":
	default:
	
$con = bancoMysqli();	
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];
  $rg = $_POST["rg"];
  $cnh = $_POST["CNH"];
  $nacionalidade = $_POST["Nacionalidade"];
  $nascimento = $_POST['Nascimento'];
  $cep = $_POST["CEP"];
  $numero = $_POST["Numero"];
  $complemento = $_POST["Complemento"];
  $email = $_POST["Email"];
  $tel01 = $_POST["Telefone1"];
  $tel02 = $_POST["Telefone2"];
  $tel03 = $_POST["Telefone3"];
  $placa = $_POST["Placa"];
   $renavam = $_POST["Renavam"];
  $fixo = dinheiroDeBr($_POST["Fixo"]);
  $ponto = dinheiroDeBr($_POST["Ponto"]);

  $obs = $_POST["Observacao"];
  
  if(isset($_POST['cadastrarCondutor'])){
	$ver_doc = verificaDoc($cpf,1);
	if($ver_doc == 0){
	  
	  $sql_insert = "INSERT INTO `lej_funcionarios` (`id`, `id_wp`, `funcao`, `nome`, `cpf`, `tipo_doc`, `rg`, `cnh`, `data_nascimento`, `nacionalidade`, `estado_civil`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `whatsapp`, `email`, `cod_banco`, `agencia`, `conta`, `moto_modelo`, `placa`, `renavam`, `fixo`, `ponto`, `obs`) 
	  VALUES (NULL, '', '', '$nome', '$cpf', '', '$rg', '$cnh', '$nascimento', '', '', '$cep', '$numero', '$complemento', '$tel01', '$tel02', '$tel03', '', '$email', '', '', '', '', '$placa', '$renavam', '$fixo', '$ponto', '$obs');";
  
  		$query_insert = mysqli_query($con,$sql_insert);
		if($query_insert){
			$id = mysqli_insert_id($con);
			$pessoa = recuperaDados("lej_funcionarios",$id,"id");
			$men = "Inserito com sucesso!";
		}else{
			$men = "erro ao inserir.<br />$sql_insert";	
		}
  
	}
  }
  
  
  if(isset($_POST['editarCondutor'])){
	  $id = $_POST['editarCondutor'];
	  $sql_update = "UPDATE lej_funcionarios SET
  nome = '$nome',
  cpf = '$cpf', 
  rg = '$rg', 
  nacionalidade = '$nacionalidade', 
  cep = '$cep', 
  numero = '$numero',
  complemento = '$complemento',
  email = '$email',
  telefone01 = '$tel01', 
  telefone02 = '$tel02', 
  telefone03 = '$tel03', 
  placa = '$placa', 
  fixo = '$fixo', 
   ponto = '$ponto', 
  renavam = '$renavam', 
  data_nascimento = '$nascimento', 
  obs = '$obs'
  WHERE id = '$id'";
  $query_update = mysqli_query($con,$sql_update);
  if($query_update){
	  $men = "Atualizado com sucesso!";
   }else{
	   $men = "erro ao atualizar.<br />$sql_update";	
  } 
			$pessoa = recuperaDados("lej_funcionarios",$id,"id");
	  
  }

if(isset($_POST['carregarCondutor'])){
	$pessoa = recuperaDados("lej_funcionarios",$_POST['carregarCondutor'],"id");	

}
  
?>



<?php 
if($ver_doc == 0){

?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE CONDUTOR</h3>
            <p><?php if(isset($men)){ echo $men; }?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=condutor" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="nome" placeholder="Nome" value="<?php echo $pessoa['nome']; ?>" >
						</div>
					</div>
                   	<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>CNH *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="CNH" placeholder="CNH" value="<?php echo $pessoa['cnh']; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF:</strong><br/>
							<input type="text" class="form-control cpf" id="RG" name="cpf" placeholder="Documento" value="<?php echo $pessoa['cpf']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="rg" placeholder="Documento" value="<?php echo $pessoa['rg']; ?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Data de nascimento:</strong><br/>
							<input type="text" class="form-control datepicker" id="Nacionalidade" name="Nascimento" placeholder="Nacionalidade" value="<?php echo $pessoa['data_nascimento']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP" value="<?php echo $pessoa['cep']; ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" readonly>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" readonly>
						</div>
					</div>
					<div class="form-group">     
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento']; ?>">
						</div>
					</div>		
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Cidade *:</strong><br/>
							<input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade" readonly>
						</div>
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado" readonly>
						</div>
					</div>		  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>E-mail *:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>Telefone Fixo*:</strong><br/>
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone01']; ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular #1:</strong><br/>
							<input type="text" class="form-control" id="telefone" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone02']; ?>" >
						</div>				  
						<div class="col-md-4"><strong>Celular #2:</strong><br/>
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone03']; ?>">
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Placa:</strong><br/>
							<input type="text" class="form-control" id="DRT" name="Placa"  value="<?php echo $pessoa['placa']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>Renavam:</strong><br/>
							<input type="text" class="form-control " id="Renavam" name="Renavam" value="<?php echo $pessoa['renavam']; ?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Valor do Ponto:</strong><br/>
							<input type="text" class="form-control valor_real" id="" name="Ponto"  value="<?php echo $pessoa['ponto']; ?>">
						</div>				  
						<div class=" col-md-4"><strong>Fixo:</strong><br/>
							<input type="text" class="form-control valor_real" id="Funcao" name="Fixo" value="<?php echo $pessoa['fixo']; ?>">
						</div>
					</div>  


					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observação:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""><?php echo $pessoa['obs']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="editarCondutor" value="<?php echo $pessoa['id']; ?>" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>
<?php }else{ ?>
<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE CONDUTOR</h3>
            <p><?php if(isset($men)){echo $men;} ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=condutor" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
						<p>O CPF <?php echo $cpf ?> já existe no sistema. Gostaria de editá-lo?</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
                        	
							<input type="hidden" name="carregarCondutor" value="<?php echo $ver_doc; ?>" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="Carregar" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>
<?php } ?>

<?php break; ?>
<?php } ?>

<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>