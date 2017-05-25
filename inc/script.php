<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script type="text/javascript" src="../assets/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="../assets/js/jquery-migrate-1.4.1.js"></script>
<script type="text/javascript" src="../assets/js/jquery.masked.js"></script>
<script type="text/javascript" src="../assets/js/cep.js"></script>
<script type="text/javascript" src="../assets/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="../assets/js/jquery.validate.js"></script>

<script type="text/javascript">
jQuery(function($){
$('.date').mask('99/99/9999');
  $('.time').mask('00:00:00');
  $('.hora').mask('99:99');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('99999-999');
  $('.tel').mask('9999-9999');
  $('.tel_dd').mask('(99) 99999-9999');
  $('.cpf').mask('999.999.999-99');
  $('.cnpj').mask('99.999.999/9999-99');
  $(".valor_real").maskMoney({thousands:'.', decimal:',', symbolStay: true});
  $('.datepicker').datepicker();

	$("#form_mapas").validate({
    // Define as regras
    rules:{
      cliente:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 2
      },
      data:{
        // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
        required: true
      },
      saida:{
        // campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true
      }
    },
    // Define as mensagens de erro para cada regra
    messages:{
      cliente:{
        required: "Escolha um cliente"
      },
      data:{
        required: "Escolha uma data"
      },
      saida:{
        required: "Insira um horário"
      }
    }
  });

});

</script>

<script type="application/javascript">
	$(function()
	{
		$('#pessoa').change(function()
		{
			if( $(this).val() )
			{
				$('#cliente').hide();
				$('.carregando').show();
				$.getJSON('../inc/clientes.ajax.php?pessoa=',{pessoa: $(this).val(), ajax: 'true'}, function(j)
				{
					var options = '<option value="0"></option>';	
					for (var i = 0; i < j.length; i++)
					{
						options += '<option value="' + j[i].id_cliente + '">' + j[i].cliente + '</option>';
					}	
					$('#cliente').html(options).show();
					$('.carregando').hide();
				});
			}
			else
			{
				$('#cliente').html('<option value="">-- Escolha um cliente --</option>');
			}
		});
	});
</script>


