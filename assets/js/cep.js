$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#CEP').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : '../inc/consulta_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#CEP').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#Endereco').val(data.rua);
                        $('#Bairro').val(data.bairro);
                        $('#Cidade').val(data.cidade);
                        $('#Estado').val(data.estado);
 
                        $('#Numero').focus();
                    }
                }
           });   
   return false;    
   })
});
// JavaScript Document