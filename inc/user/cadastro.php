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
							<input type="text" class="form-control cnpj" id="CNPJ" name="CNPJ" placeholder="CNPJ" >
						</div>
						<div class="col-md-4"><strong>Inscrição:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="inscricao" placeholder="Inscrição" >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CEP *:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="XXXXX-XXX">
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
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero">
						</div>				  
						<div class=" col-md-4"><strong>Complemento:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento">
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
							<input type="text" class="form-control" id="RazaoSocial" name="Contato" placeholder="Contato" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd" name="Telefone1" placeholder="Exemplo: (11) 98765-4321">
						</div>				  
						<div class=" col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone:</strong><br/>
							<input type="text" class="form-control tel_dd"  name="Telefone3" placeholder="Exemplo: (11) 98765-4321">
						</div>				  
						<div class=" col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail">
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
	default:
?>

<section id="contact" class="home-section bg-white">
	<div class="container">
		<div class="form-group">
        <div class="col-md-offset-2 col-md-8">
			<h3>CADASTRO DE PESSOA FÍSICA</h3>
            </div>
		</div>
	  	<div class="row">
	  		<div class="col-md-offset-1 col-md-10">
				<form class="form-horizontal" role="form" action="editar.php?p=fisica" method="post">
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Nome *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="Nome" placeholder="Nome" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Tipo de documento *:</strong><br/>
							<select class="form-control" id="tipoDocumento" name="tipoDocumento" >
								<?php geraOpcao("tipo_doc");?>
							</select>
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="RG" placeholder="Documento" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>CPF *:</strong><br/>
							<input type="text" class="form-control cpf" id="CPF" name="CPF" placeholder="CPF" value="">
						</div>				  
						<div class=" col-md-4"><strong>CNH *:</strong><br/>
							<input type="text" class="form-control" id="CCM" name="CCM" placeholder="CNH" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Estado civil:</strong><br/>
							<select class="form-control" id="IdEstadoCivil" name="IdEstadoCivil" >
								<?php geraOpcao("estado_civil");?>
							</select>
						</div>				  
						<div class=" col-md-4"><strong>Data de nascimento:</strong><br/>
							<input type="text" class="form-control date" id="datepicker01" name="DataNascimento" placeholder="Data de Nascimento" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Nacionalidade:</strong><br/>
							<input type="text" class="form-control" id="Nacionalidade" name="Nacionalidade" placeholder="Nacionalidade">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Endereço *:</strong><br/>
							<input type="text" class="form-control" id="Endereco" name="Endereco" placeholder="Endereço" readonly >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Número *:</strong><br/>
							<input type="text" class="form-control" id="Numero" name="Numero" placeholder="Numero">
						</div>				  
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" readonly >
						</div>
					</div>
					<div class="form-group">     
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
							<input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento">
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
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" >
						</div>				  
						<div class=" col-md-4"><strong>Telefone #1 *:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>				  
						<div class="col-md-4"><strong>Telefone #3:</strong><br/>
							<input type="text" class="form-control tel_dd" id="telefone" onkeyup="mascara( this, mtel );" maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Observação:</strong><br/>
							<textarea name="Observacao" class="form-control" rows="10" placeholder=""></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-8">
							<input type="hidden" name="cadastrarFisica" value="1" />
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
			<h3>CADASTRO DE CONDUTOR</h3>
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
							<input type="text" class="form-control cpf" id="RG" name="cpf" placeholder="Documento" >
						</div>				  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="rg" placeholder="Documento" >
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
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP">
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
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone #2:</strong><br/>
							<input type="text" class="form-control" id="telefone" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>				  
						<div class="col-md-4"><strong>Telefone #3:</strong><br/>
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Placa:</strong><br/>
							<input type="text" class="form-control" id="DRT" name="Placa"  >
						</div>				  
						<div class=" col-md-4"><strong>Fixo:</strong><br/>
							<input type="text" class="form-control valor_real" id="Funcao" name="Fixo" >
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