<?php 
echo "<pre>";
var_dump($_POST);
echo "</pre>";

?>
        <form method="post" action="teste.php">
         <input type="hidden" id="txtEnderecoChegada" name="txtEnderecoChegada" />
         <input type="hidden" id="txtEnderecoPartida" name="txtEnderecoPartida" />
		   <input type="submit" value="Enviar" />      
        </form>