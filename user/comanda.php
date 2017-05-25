<?php include '../inc/header.php'; ?>
<?php include '../inc/menu-admin.php'; ?>
 <link rel="stylesheet" type="text/css" href="../inc/googlemapstrack/css/estilo.css">
   <div class="container">
      <div class="blog-header">
        <h2 class="blog-title">Nova Comanda</h2>
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
            <form method="post" class="form_mapas" name="form_mapas" action="comanda.php">

                    <legend>Definir Rota</legend>
                        <label for="txtEnderecoPartida">Endereço de partida:</label>
                        <input type="text" class="form-control" id="txtEnderecoPartida" name="txtEnderecoPartida" />
                         <label for="txtEnderecoMeio01">Endereço Meio #01:</label>
                        <input type="text" class="form-control" id="txtEnderecoMeio01" name="txtEnderecoMeio01" />
                          <label for="txtEnderecoMeio02">Endereço Meio #02:</label>
                        <input type="text" class="form-control" id="txtEnderecoMeio02" name="txtEnderecoMeio02" />
                          <label for="txtEnderecoMeio03">Endereço Meio #03:</label>
                        <input type="text" class="form-control" id="txtEnderecoMeio03" name="txtEnderecoMeio03" />
                          <label for="txtEnderecoMeio04">Endereço Meio #04:</label>
                        <input type="text" class="form-control" id="txtEnderecoMeio04" name="txtEnderecoMeio04" />
                          <label for="txtEnderecoMeio05">Endereço Meio #05:</label>
                        <input type="text" class="form-control" id="txtEnderecoMeio05" name="txtEnderecoMeio05" />

                        <label for="txtEnderecoChegada">Endereço de chegada:</label>
                        <input type="text" class="form-control" id="txtEnderecoChegada" name="txtEnderecoChegada" />
                        <br />
                        <input type="submit" class="form_mapas btn btn-theme btn-lg btn-block" id="btnEnviar" name="btnEnviar" value="Traçar Rota" />

            </form>
            </div>
			</div>


        
            <div id="mapa"></div>
            
            <div id="trajeto-texto"></div>


    
    <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/>
        </div>
        </div>
        <form method="post" class="form_envia" action="confirma.php">

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
			<div class="col-md-offset-2 col-md-8"><strong>Condutor:</strong><br/>
				<select name="condutor" id="condutor" class="form-control">
                <option>Escolha o Condutor</option>
                <?php geraCondutor(); ?>
                </select>
			</div>
		</div>
    
		<div class="form-group">
			<div class="col-md-offset-2 col-md-4"><strong>Data:</strong><br/>
				<input type="text" class="form-control datepicker" id="Numero" name="data" placeholder="Numero">
			</div>				  
			<div class=" col-md-4"><strong>Saída:</strong><br/>
					<input type="text" class="form-control hora" id="Complemento" name="saida" placeholder="Complemento">
			</div>
		</div> 

       	<div class="form-group">
			<div class="col-md-offset-2 col-md-8"><strong>Anotações:</strong><br/>
				<textarea name="anotacao" class="form-control" rows="10" placeholder=""></textarea>
			</div>
		</div>
        
        
        
        
        

         
          <div class="form-group">
		<div class="col-md-offset-2 col-md-8"><br/> 
         <input type="hidden" id="partida" name="partida" />
         <input type="hidden" id="chegada" name="chegada" />
         <input type="hidden" class="form-control" id="end01" name="end01" />
         <input type="hidden" class="form-control" id="end02" name="end02" />
         <input type="hidden" class="form-control" id="end03" name="end03" />
         <input type="hidden" class="form-control" id="end04" name="end04" />
         <input type="hidden" class="form-control" id="end05" name="end05" />

		 <input type="submit" class="form_envia btn btn-theme btn-lg btn-block" value="Confirma Rota" />      

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




<!-- Site footer -->
<?php include '../inc/footer.php'; //echo date("d-m-Y H:i:s"); ?>


