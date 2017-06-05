
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
	  $cnpj = $_POST["CNPJ"];
	  $inscricao = $_POST["inscricao"];
	  $cep = $_POST["CEP"];
	  $numero = $_POST["Numero"];
	  $complemento = $_POST["Complemento"];
	  $contato = $_POST["Contato"];
	  $tel01 = $_POST["Telefone1"];
	  $tel02 = $_POST["Telefone2"];
	  $tel03 = $_POST["Telefone3"];
	  $email = $_POST["Email"];
	  $obs = $_POST["Observacao"];

	// cadastra um novo cliente
	if(isset($_POST['cadastrarJuridica'])){
	$ver_doc = verificaDoc($cnpj);
		if($ver_doc == 0){		
			$sql_insert = "INSERT INTO `lej_pj` (`id`, `id_wp`, `funcao`, `nome`, `cnpj`, `cep`, `numero`, `complemento`, `email`, `contato`, `telefone01`, `telefone02`, `telefone03`, `whatsapp`, `cod_banco`, `agencia`, `conta`, `inscricao`, `data_atualizacao`) 
			VALUES (NULL, '', '', '$razao', '$cnpj', '$cep', '$numero', '$complemento', '$email', '$contato', '$tel01', '$tel02', '$tel03', '', '', '', '', '$inscricao', '')";
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
		contato = '$contato', 
		telefone01 = '$tel01', 
		telefone02 = '$tel02', 
		telefone03 = '$tel03', 
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
            <p><?php if(isset($men)){echo $men;	}?></p>
            </div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=juridica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Razão Social:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="RazaoSocial" placeholder="RazaoSocial" value="<?php echo $pessoa['nome']?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CNPJ:</strong><br/>
							<input type="text" class="form-control cnpj" id="CNPJ" name="CNPJ" placeholder="CNPJ" value="<?php echo $pessoa['cnpj']?>">
						</div>
						<div class="col-md-4"><strong>Inscrição:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="inscricao" placeholder="Inscrição" value="<?php echo $pessoa['inscricao']?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CEP *:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="" value="<?php echo $pessoa['cep']?>">
						</div>				  
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado" readonly >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" readonly>
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero']?>">
						</div>				  
						<div class=" col-md-4"><strong>Complemento:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento']?>">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Bairro *:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" readonly>
						</div>				  
						<div class=" col-md-4"><strong>Cidade *:</strong><br/>
							<input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade" readonly>
						</div>
					</div>  
                    					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Contato:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="Contato" placeholder="Contato" value="<?php echo $pessoa['contato']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone"   name="Telefone1"  value="<?php echo $pessoa['telefone01']?>">
						</div>				  
						<div class=" col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone"  name="Telefone2"  value="<?php echo $pessoa['telefone02']?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone"   name="Telefone3"  value="<?php echo $pessoa['telefone03']?>">
						</div>				  
						<div class=" col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email']?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observações:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""><?php echo $pessoa['obs']?></textarea>
						</div>
					</div>
					<!-- Botão Gravar -->	
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="editarJuridica" value="<?php echo $pessoa['id'] ?>" />
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
  $tipo_doc = $_POST["tipoDocumento"];
  $rg = $_POST["RG"];
  $cpf  = $_POST["CPF"];
  $cnh = $_POST["CCM"];
  $estado_civil = $_POST["IdEstadoCivil"];
  $data_nasc = $_POST["DataNascimento"];
  $nacionalidade = $_POST["Nacionalidade"];
  $cep = $_POST["CEP"];
  //$_POST["Endereco"];
  $numero = $_POST["Numero"];
  $bairro = $_POST["Bairro"];
  $complemento = $_POST["Complemento"];
  $cidade = $_POST["Cidade"];
  $estado = $_POST["Estado"];
  $email = $_POST["Email"];
  $tel01 = $_POST["Telefone1"];
  $tel02 = $_POST["Telefone2"];
  $tel03 = $_POST["Telefone3"];
  $obs = addslashes($_POST["Observacao"]);

//Cadastrar Nova
if(isset($_POST ['cadastrarFisica'])){
	$ver_doc = verificaDoc($cpf);
	if($ver_doc == 0){
		$sql_insert = "INSERT INTO `lej_pf` (`id`, `id_wp`, `funcao`, `nome`, `cpf`,`tipo_doc`, `rg`, `cnh`, `data_nascimento`, `nacionalidade`, `estado_civil`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `whatsapp`, `email`, `cod_banco`, `agencia`, `conta`, `moto_modelo`, `placa`, `obs`) VALUES (NULL, '', '6', '$nome', '$cpf', '$tipo_doc', '$rg', '$cnh', '$data_nasc', '$nacionalidade', '$estado_civil', '$cep', '$numero', '$complemento', '$tel01', '$tel02', '$tel03', '', '$email', '', '', '', '', '', '$obs');";
		
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
  tipo_doc = '$tipo_doc', 
  rg = '$rg', 
  cpf = '$cpf', 
  cnh = '$cnh', 
  estado_civil = '$estado_civil',  
  data_nascimento = '$data_nasc',  
  nacionalidade = '$nacionalidade',  
  cep = '$cep', 
  numero = '$numero', 
  complemento = '$complemento',
  email = '$email',
  telefone01 = '$tel01',
  telefone02 = '$tel02',
  telefone03 = '$tel03',
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
						<div class="col-md-offset-2 col-md-4"><strong>Tipo de documento *:</strong><br/>
							<select class="form-control" id="tipoDocumento" name="tipoDocumento" >
								<?php geraOpcao("tipo_doc",NULL,$pessoa['tipo_doc'])?>
							</select>
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control" id="RG" name="RG" placeholder="Documento" value="<?php echo $pessoa['rg'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF *:</strong><br/>
							<input type="text" class="form-control" id="cpf" name="CPF" placeholder="CPF" value="<?php echo $pessoa['cpf'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>CNH *:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="CCM" placeholder="CCM" value="<?php echo $pessoa['cnh'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Estado civil:</strong><br/>
							<select class="form-control" id="IdEstadoCivil" name="IdEstadoCivil" >
								<?php geraOpcao("estado_civil",NULL,$pessoa['estado_civil']) ?>
							</select>
						</div>				  
						<div class=" col-md-4"><strong>Data de nascimento:</strong><br/>
							<input type="text" class="form-control" id="datepicker01" name="DataNascimento" placeholder="Data de Nascimento" value="<?php echo $pessoa['data_nascimento'] ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Nacionalidade:</strong><br/>
							<input type="text" class="form-control" id="Nacionalidade" name="Nacionalidade" placeholder="Nacionalidade" value="<?php echo $pessoa['nacionalidade'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control" id="CEP" name="CEP" placeholder="CEP" value="<?php echo $pessoa['cep'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" >
						</div>
					</div>
					<div class="form-group">     
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento'] ?>">
						</div>
					</div>		
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Cidade *:</strong><br/>
							<input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade">
						</div>
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado">
						</div>
					</div>		  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>E-mail *:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Telefone #1 *:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone01'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone02'] ?>">
						</div>				  
						<div class="col-md-4"><strong>Telefone #3:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone03'] ?>" >
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
  $nacionalidade = $_POST["Nacionalidade"];
  $cep = $_POST["CEP"];
  $numero = $_POST["Numero"];
  $complemento = $_POST["Complemento"];
  $email = $_POST["Email"];
  $tel01 = $_POST["Telefone1"];
  $tel02 = $_POST["Telefone2"];
  $tel03 = $_POST["Telefone3"];
  $placa = $_POST["Placa"];
  $fixo = dinheiroDeBr($_POST["Fixo"]);
  $obs = $_POST["Observacao"];
  
  if(isset($_POST['cadastrarCondutor'])){
	$ver_doc = verificaDoc($cpf,1);
	if($ver_doc == 0){
	  
	  $sql_insert = "INSERT INTO `lej_pf` (`id`, `id_wp`, `funcao`, `nome`, `cpf`, `tipo_doc`, `rg`, `cnh`, `data_nascimento`, `nacionalidade`, `estado_civil`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `whatsapp`, `email`, `cod_banco`, `agencia`, `conta`, `moto_modelo`, `placa`, `fixo`, `obs`) 
	  VALUES (NULL, '', '7', '$nome', '$cpf', '1', '$rg', '', '', '$nacionalidade', '', '$cep', '$numero', '$complemento', '$tel01', '$tel02', '$tel03', '', '$email', '', '', '','', '$placa', '$fixo', '$obs')";
  
  		$query_insert = mysqli_query($con,$sql_insert);
		if($query_insert){
			$id = mysqli_insert_id($con);
			$pessoa = recuperaDados("lej_pf",$id,"id");
			$men = "Inserito com sucesso!";
		}else{
			$men = "erro ao inserir.<br />$sql_insert";	
		}
  
	}
  }
  
  
  if(isset($_POST['editarCondutor'])){
	  $id = $_POST['editarCondutor'];
	  $sql_update = "UPDATE lej_pf SET
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
  obs = '$obs'
  WHERE id = '$id'";
  $query_update = mysqli_query($con,$sql_update);
  if($query_update){
	  $men = "Atualizado com sucesso!";
   }else{
	   $men = "erro ao atualizar.<br />$sql_update";	
  } 
			$pessoa = recuperaDados("lej_pf",$id,"id");
	  
  }

if(isset($_POST['carregarCondutor'])){
	$pessoa = recuperaDados("lej_pf",$_POST['carregarCondutor'],"id");	

}
  
?>



<?php 
if($ver_doc == 0){

?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE CONDUTORES</h3>
            <p><?php if(isset($men)){echo $men;}?></p>
<p><?php //var_dump($pessoa); ?></p>
<p><?php //echo $sql_update; ?></p>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=condutor" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="nome" placeholder="Nome" value="<?php echo $pessoa['nome'] ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF:</strong><br/>
							<input type="text" class="form-control cpf" id="RG" name="cpf" placeholder="Documento" value="<?php echo $pessoa['cpf'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="rg" placeholder="Documento" value="<?php echo $pessoa['rg'] ?>">
						</div>
					</div>
					<!--
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Estado civil:</strong><br/>
							<select class="form-control" id="IdEstadoCivil" name="IdEstadoCivil" >
								
							</select>
						</div>				  
						<div class=" col-md-4"><strong>Nacionalidade:</strong><br/>
							<input type="text" class="form-control" id="datepicker01" name="DataNascimento" placeholder="Data de Nascimento" >
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Data de nascimento:</strong><br/>
							<input type="text" class="form-control" id="Nacionalidade" name="Nacionalidade" placeholder="Nacionalidade" value="<?php echo $pessoa['nacionalidade'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP" value="<?php echo $pessoa['cep'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero" value="<?php echo $pessoa['numero'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro">
						</div>
					</div>
					<div class="form-group">     
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento" value="<?php echo $pessoa['complemento'] ?>">
						</div>
					</div>		
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Cidade *:</strong><br/>
							<input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade">
						</div>
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado">
						</div>
					</div>		  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>E-mail *:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" value="<?php echo $pessoa['email'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Telefone #1 *:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone01'] ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone02'] ?>" >
						</div>				  
						<div class="col-md-4"><strong>Whatsapp:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" value="<?php echo $pessoa['telefone03'] ?>" >
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Placa:</strong><br/>
							<input type="text" class="form-control" id="DRT" name="Placa"  value="<?php echo $pessoa['placa'] ?>">
						</div>				  
						<div class=" col-md-4"><strong>Fixo:</strong><br/>
							<input type="text" class="form-control valor_real" id="Funcao" name="Fixo" value="<?php echo dinheiroParaBr($pessoa['fixo']) ?>">
						</div>
					</div>  

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observação:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""><?php echo $pessoa['obs'] ?></textarea>
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