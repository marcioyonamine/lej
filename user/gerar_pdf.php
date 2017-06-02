<?php 


   // INSTALAÇÃO DA CLASSE NA PASTA FPDF.
	require_once("../inc/lib/fpdf/fpdf.php");
	require_once("../inc/functions.php");

   //CONEXÃO COM BANCO DE DADOS 
   $conexao = bancoMysqli(); 
   
class PDF extends FPDF
	{
	// Page header
	function Header()
	{	
		// Logo
		//$this->Image('../assets/img/logo_pequeno.png',15,10);
    
		// Line break
		//$this->Ln(20);
	}

}

//Infos
$numero = $_GET['n'];
$num_os = numOrdem($_GET['n']);
$dados = recuperaDados("lej_os",$numero,"id");
if($dados['pessoa'] == 1){
	$cliente = recuperaDados("lej_pf",$dados['cliente'],"id");
	$print_cliente = $cliente['nome'];	
}else{
	$cliente = recuperaDados("lej_pj",$dados['cliente'],"id");	
	$print_cliente = $cliente['nome_fantasia'];
}

$end = retornaEndereco($cliente['cep']);
$endereco = $end['rua'].", ".$cliente['numero']." - ".$cliente['complemento'];
$endereco2 = $end['bairro']." - ".$end['cidade']."/".$end['estado']." - ".$cliente['cep'];
$telefone = $cliente['telefone01']."/".$cliente['telefone02']."/".$cliente['telefone03'];
$condutor = recuperaDados("lej_funcionarios",$dados['condutor'],"id");


// Preencher com endereço da empresa
$end_lej01 = "Rua Diogo da Costa, 30 - Vila Mazzei";
$end_lej02 = "Sâo Paulo /SP - (11) 2338-3668 / (11) 94730-7045";






// GERANDO O PDF:
$pdf = new PDF('P','mm','A4'); //CRIA UM NOVO ARQUIVO PDF NO TAMANHO A4
$pdf->AliasNbPages();
$pdf->AddPage();

   
$x=20;
$l=7; //DEFINE A ALTURA DA LINHA   
		// Logo
		//$pdf->Image('../assets/img/logo_pequeno.png',15,10);
   		//$pdf->Ln(20);
		
   $pdf->SetXY( $x , 40 );// SetXY - DEFINE O X (largura) E O Y (altura) NA PÁGINA

   $pdf->SetXY(113, 15);
   $pdf->SetFont('Arial','', 20);
   $pdf->Cell(10,$l,utf8_decode('O.S. Nº '.$num_os),0,0,'L');


   $pdf->SetXY($x, 15);
   $pdf->SetFont('Arial','', 20);
   $pdf->Cell(53,$l,utf8_decode("L&J Transportes"),0,0,'L');
   
   $pdf->SetXY($x, 22);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(53,$l,utf8_decode($end_lej01),0,0,'L');

   $pdf->SetXY($x, 27);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(53,$l,utf8_decode($end_lej02),0,0,'L');

   $pdf->SetXY(113, 25);
   $pdf->SetFont('Arial','', 13);
   $pdf->Cell(53,$l,utf8_decode(exibirDataBr($dados['data'])),0,0,'L');

   
   $pdf->SetXY($x, 30);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("____________________________________________________________________________"),0,0,'L');
   
   $pdf->SetXY($x, 37);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("Cliente:"),0,0,'L');
   
   $pdf->SetXY($x, 43);
   $pdf->SetFont('Arial','', 15);
   $pdf->Cell(68,$l,utf8_decode($print_cliente),0,0,'L');

   $pdf->SetXY($x, 49);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($endereco),0,0,'L');

   $pdf->SetXY($x, 54);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($endereco2),0,0,'L');
      $pdf->SetXY($x+20, 62);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($dados['obs']),0,0,'L');

	// Condutor

   $pdf->SetXY($x, 85);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("Condutor:"),0,0,'L');
   
   $pdf->SetXY($x, 92);
   $pdf->SetFont('Arial','', 13);
   $pdf->Cell(68,$l,utf8_decode($condutor['nome']),0,0,'L');
   $pdf->Cell(40,$l,utf8_decode("RG: ".$condutor['rg']),0,0,'L');
   $pdf->Cell(40,$l,utf8_decode("PLACA: ".$condutor['placa']),0,0,'L');


   //$pdf->SetXY($x, 98);
   //$pdf->SetFont('Arial','', 10);
   //$pdf->Cell(57,$l,utf8_decode($condutor['telefone02']." / ".$condutor['telefone03']),0,0,'L');

   $pdf->SetXY($x, 105);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("Início: ".substr($dados['saida'],0,5)),0,0,'L');
   $pdf->Cell(57,$l,utf8_decode("Término: _______ "),0,0,'L');
   
    $pdf->SetXY(100, 120);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("____________________________ "),0,0,'L');
   
    $pdf->SetXY(100, 128);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("Sr(a). ".$dados['solicitante']."- Visto"),0,0,'L');
   

     $pdf->SetXY($x, 140);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("_____________________________________________________________________"),0,0,'L');  
   
   //Inicio da cópia
	$c = 140;

   $pdf->SetXY(113, 15+$c);
   $pdf->SetFont('Arial','', 20);
   $pdf->Cell(10,$l,utf8_decode('O.S. Nº '.$num_os),0,0,'L');


   $pdf->SetXY($x, 15+$c);
   $pdf->SetFont('Arial','', 20);
   $pdf->Cell(53,$l,utf8_decode("L&J Transportes"),0,0,'L');
   
   $pdf->SetXY($x, 22+$c);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(53,$l,utf8_decode($end_lej01),0,0,'L');

   $pdf->SetXY($x, 27+$c);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(53,$l,utf8_decode($end_lej02),0,0,'L');

   $pdf->SetXY(113, 25+$c);
   $pdf->SetFont('Arial','', 13);
   $pdf->Cell(53,$l,utf8_decode(exibirDataBr($dados['data'])),0,0,'L');

   
   $pdf->SetXY($x, 30+$c);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("____________________________________________________________________________"),0,0,'L');
   
   $pdf->SetXY($x, 37+$c);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("Cliente:"),0,0,'L');
   
   $pdf->SetXY($x, 43+$c);
   $pdf->SetFont('Arial','', 15);
   $pdf->Cell(68,$l,utf8_decode($print_cliente),0,0,'L');

   $pdf->SetXY($x, 49+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($endereco),0,0,'L');

   $pdf->SetXY($x, 54+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($endereco2),0,0,'L');
      $pdf->SetXY($x+20, 62+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode($dados['obs']),0,0,'L');

	// Condutor

   $pdf->SetXY($x, 85+$c);
   $pdf->SetFont('Arial','', 10);
   $pdf->Cell(160,$l,utf8_decode("Condutor:"),0,0,'L');
   
   $pdf->SetXY($x, 92+$c);
   $pdf->SetFont('Arial','', 13);
   $pdf->Cell(68,$l,utf8_decode($condutor['nome']),0,0,'L');
   $pdf->Cell(40,$l,utf8_decode("RG: ".$condutor['rg']),0,0,'L');
   $pdf->Cell(40,$l,utf8_decode("PLACA: ".$condutor['placa']),0,0,'L');


   //$pdf->SetXY($x, 98+$c);
   //$pdf->SetFont('Arial','', 10);
   //$pdf->Cell(57,$l,utf8_decode($condutor['telefone02']." / ".$condutor['telefone03']),0,0,'L');

   $pdf->SetXY($x, 105+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("Início: ".substr($dados['saida'],0,5)),0,0,'L');
   $pdf->Cell(57,$l,utf8_decode("Término: _______ "),0,0,'L');
   
    $pdf->SetXY(100, 120+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("____________________________ "),0,0,'L');
   
    $pdf->SetXY(100, 128+$c);
   $pdf->SetFont('Arial','', 12);
   $pdf->Cell(57,$l,utf8_decode("Sr(a). ".$dados['solicitante']."- Visto"),0,0,'L');



ob_start ();
$pdf->Output();

   
?>   