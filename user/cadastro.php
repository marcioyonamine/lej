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
						<div class="col-md-offset-2 col-md-8"><strong>Nome Fantasia:</strong><br/>
							<input type="text" class="form-control" id="RazaoSocial" name="NomeFantasia" placeholder="Nome Fantasia" >
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
						<div class="col-md-offset-2 col-md-4"><strong>Contato 01:</strong><br/>
							<input type="text" class="form-control" id="Contato01" name="Contato01" >
						</div>				  
						<div class=" col-md-4"><strong>Cargo 01:</strong><br/>
							<input type="text" class="form-control" id="Cargo01" name="Cargo01" >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Contato 02:</strong><br/>
							<input type="text" class="form-control" id="Contato02" name="Contato02" >
						</div>				  
						<div class=" col-md-4"><strong>Cargo 02:</strong><br/>
							<input type="text" class="form-control" id="Cargo02" name="Cargo02" >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Contato 03:</strong><br/>
							<input type="text" class="form-control" id="Contato03" name="Contato03" >
						</div>				  
						<div class=" col-md-4"><strong>Cargo 03:</strong><br/>
							<input type="text" class="form-control" id="Cargo03" name="Cargo03" >
						</div>
					</div>  
                    
                    
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone Fixo:</strong><br/>
							<input type="text" class="form-control tel_dd" name="Telefone1" placeholder="Exemplo: (11) 98765-4321">
						</div>				  
						<div class=" col-md-4"><strong>Celular 01:</strong><br/>
							<input type="text" class="form-control cel_dd" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular 02:</strong><br/>
							<input type="text" class="form-control cel_dd"  name="Telefone3" placeholder="Exemplo: (11) 98765-4321">
						</div>				  
						<div class=" col-md-4"><strong>E-mail:</strong><br/>
							<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail">
						</div>
					</div>
  					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Valor do Ponto:</strong><br/>
							<input type="text" class="form-control valor_real" id="Ponto" name="Ponto" placeholder="Valor do ponto" >
						</div>
					</div>   
                    					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Forma de pagamento:</strong><br/>
							<input type="text" class="form-control" id="Forma" name="Forma" placeholder="Forma de pagamento" >
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
						<div class="col-md-offset-2 col-md-4"><strong>CPF *:</strong><br/>
							<input type="text" class="form-control cpf" id="CPF" name="CPF" placeholder="CPF" value="">
						</div>					  
						<div class=" col-md-4"><strong>Documento *:</strong><br/>
							<input type="text" class="form-control rg" id="RG" name="RG" placeholder="Documento" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Email:</strong><br/>
						<input type="text" class="form-control" id="Email" name="Email" placeholder="E-mail" >
                        	
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
						<div class="col-md-offset-2 col-md-4"><strong>Cidade *:</strong><br/>
                        
                        <input type="text" class="form-control" id="Cidade" name="Cidade" placeholder="Cidade" readonly >
						
						</div>
						<div class=" col-md-4"><strong>Estado *:</strong><br/>
							<input type="text" class="form-control" id="Estado" name="Estado" placeholder="Estado" readonly>
						</div>
					</div>		 
                    					<div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Complemento *:</strong><br/>
  <input type="text" class="form-control" id="Complemento" name="Complemento" placeholder="Complemento">
						</div>
					</div> 
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Telefone Fixo *:</strong><br/>
                        <input type="text" class="form-control tel_dd" id="telefone"  maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 2765-4321" >
						</div>				  
						<div class=" col-md-4"><strong>Celular #1:</strong><br/>
						<input type="text" class="form-control cel_dd" id="telefone"  maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >	
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular #2:</strong><br/>
					<input type="text" class="form-control cel_dd" id="telefone"  maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" >		
						</div>				  
						<div class="col-md-4"><strong>Valor do ponto:</strong><br/>
						<input type="text" class="form-control valor_real "  maxlength="15" name="Ponto" placeholder="" >		
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-md-offset-2 col-md-8"><strong>Forma de pagamento *:</strong><br/>
							<input type="text" class="form-control" name="Forma" placeholder="" >
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
						<div class="col-md-offset-2 col-md-8"><strong>CNH *:</strong><br/>
							<input type="text" class="form-control" id="Nome" name="CNH" placeholder="CNH" >
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

					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Data de nascimento:</strong><br/>
							<input type="text" class="form-control datepicker" id="Nacionalidade" name="Nacionalidade" placeholder="Nacionalidade">
						</div>				  
						<div class=" col-md-4"><strong>CEP:</strong><br/>
							<input type="text" class="form-control cep" id="CEP" name="CEP" placeholder="CEP">
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
						<div class=" col-md-4"><strong>Bairro:</strong><br/>
							<input type="text" class="form-control" id="Bairro" name="Bairro" placeholder="Bairro" readonly>
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
						<div class=" col-md-4"><strong>Telefone Fixo*:</strong><br/>
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone1" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Celular #1:</strong><br/>
							<input type="text" class="form-control" id="telefone" maxlength="15" name="Telefone2" placeholder="Exemplo: (11) 98765-4321" >
						</div>				  
						<div class="col-md-4"><strong>Celular #2:</strong><br/>
							<input type="text" class="form-control" id="telefone"  maxlength="15" name="Telefone3" placeholder="Exemplo: (11) 98765-4321" >
						</div>
					</div>	  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Placa:</strong><br/>
							<input type="text" class="form-control" id="DRT" name="Placa"  >
						</div>				  
						<div class=" col-md-4"><strong>Renavam:</strong><br/>
							<input type="text" class="form-control " id="Renavam" name="Renavam" >
						</div>
					</div>  
					<div class="form-group">
						<div class="col-md-offset-2 col-md-4"><strong>Valor do Ponto:</strong><br/>
							<input type="text" class="form-control valor_real" id="DRT" name="Ponto"  >
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