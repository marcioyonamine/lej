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
?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA JURÍDICA</h3>
            </div>
		</div>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=juridica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Razão Social:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="RazaoSocial" placeholder="RazaoSocial" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CNPJ:</strong><br/>
							<input type="text" readonly class="form-control" id="CNPJ" name="CNPJ" placeholder="CNPJ" value=<?php echo $_POST['busca'] ?> >
						</div>
						<div class="col-md-4"><strong>CNH:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="CCM" placeholder="CCM" >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CEP *:</strong><br/>
							<input type="text" class="form-control" id="CEP" name="CEP" placeholder="XXXXX-XXX">
						</div>				  
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero">
						</div>				  
						<div class=" col-md-4"><strong>Complemento:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento">
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Bairro *:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro">
						</div>				  
						<div class=" col-md-4"><strong>Cidade *:</strong><br/>
							<input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade">
						</div>
					</div>  
					<div class="form-group">
						<div class=" col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail">
						</div>
						<div class=" col-md-4"><strong>Telefone #1</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321">
						</div>				  
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #3</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321">
						</div>				  

					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observações:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""></textarea>
						</div>
					</div>
					<!-- Botão Gravar -->	
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="cadastrarJuridica" value="1" />
							<input type="submit" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
			</div>	
		</div>		
	</div>
</section>
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
	$sql_insert = "INSERT INTO `lej_pf` (`id`, `id_wp`, `funcao`, `nome`, `cpf`,`tipo_doc`, `rg`, `cnh`, `data_nascimento`, `nacionalidade`, `estado_civil`, `cep`, `numero`, `complemento`, `telefone01`, `telefone02`, `telefone03`, `whatsapp`, `email`, `cod_banco`, `agencia`, `conta`, `moto_modelo`, `placa`, `obs`) VALUES (NULL, '', '', '$nome', '$cpf', '$tipo_doc', '$rg', '$cnh', '$data_nasc', '$nacionalidade', '$estado_civil', '$cep', '$numero', '$complemento', '$tel01', '$tel02', '$tel03', '', '$email', '', '', '', '', '', '$obs');";
	
	$query_insert = mysqli_query($con, $sql_insert);
	if($query_insert){
		$idPessoa = mysqli_insert_id($con);
		$pessoa = recuperaDados("lej_pf",$idPessoa,"id");
		$men = "Inserido";	
		
	}else{
		$men = "Erro.<br />$sql_insert";
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
								<?php geraOpcao("tipo_doc",$pessoa['tipo_doc'])?>
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
								<?php geraOpcao("estado_civil",$pessoa['estado_civil']) ?>
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
	break;
	case "condutor":
	default:
?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE CONDUTORES</h3>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=condutor" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="nome" placeholder="Nome" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF:</strong><br/>
							<input type="text" class="form-control" id="RG" name="cpf" placeholder="Documento" >
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control" id="RG" name="rg" placeholder="Documento" >
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
							<input type="text" class="form-control" id="Nacionalidade" name="Nacionalidade" placeholder="Nacionalidade">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control" id="CEP" name="CEP" placeholder="CEP">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero">
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro">
						</div>
					</div>
					<div class="form-group">     
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento">
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
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" >
						</div>				  
						<div class=" col-md-4"><strong>Telefone #1 *:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>				  
						<div class="col-md-4"><strong>Whatsapp:</strong><br/>
							<input type="text" class="form-control" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Placa:</strong><br/>
							<input type="text" class="form-control" id="DRT" name="DRT" placeholder="DRT" >
						</div>				  
						<div class=" col-md-4"><strong>Fixo:</strong><br/>
							<input type="text" class="form-control" id="Funcao" name="Funcao" placeholder="Função">
						</div>
					</div>  

					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observação:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="cadastrarCondutor" value="1" />
							<input type="hidden" name="Sucesso" id="Sucesso" />
							<input type="submit" value="GRAVAR" class="btn btn-theme btn-lg btn-block">
						</div>
					</div>
				</form>
	  		</div>	
	  	</div>
	</div>
</section>

<?php break; ?>
<?php } ?>

<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>