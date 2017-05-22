<!-- The justified navigation menu is meant for single line per list item.
Multiple lines will require custom code not provided by Bootstrap. -->

<?php 
	//include "functions.php";
	$usuario = wp_get_current_user();
	$nome = $usuario->display_name; 
?>

<nav class="navbar navbar-default navbar-fixed-top" style="min-height: 80px !important; border-bottom:0 !important; border-top:solid 10px #ffffff;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <img src="../assets/img/logo_pequeno.png" style="padding-right:20px;" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" style="height:80px !important;" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"' ?>><a class="menu-princ-novo" href="index.php" style="height:80px; text-shadow:none;">Home <span class="sr-only">(current)</span></a></li>

        <li class="dropdown <?php if (basename($_SERVER['PHP_SELF']) == 'cadastro.php?p=fisica' || basename($_SERVER['PHP_SELF']) == 'cadastro.php?p=fisica') echo 'active' ?>">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'cadastro.php?p=fisica') echo 'class="active"' ?>><a href="cadastro.php?p=fisica">Cadastrar Pessoa Física</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'cadastro.php?p=juridica') echo 'class="active"' ?>><a href="cadastro.php?p=juridica" >Cadastrar Pessoa Jurídica</a></li>          
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'cadastro.php?p=juridica') echo 'class="active"' ?>><a href="cadastro.php?p=juridica" >Buscar</a></li>            
          </ul>
        </li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Condutor <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cadastro.php?p=condutor" title="Módulo online">Cadastrar</a></li>
            <li><a href="buscar.php" title="Sugestão de conteúdo" >Buscar</a></li>
          </ul>
        </li>
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comanda <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="comanda.php" title="Comanda">Inserir nova comanda</a></li>
            <li><a href="comanda.php" title="Comanda">Listar comandas</a></li>

            
            <!--
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
            -->
          </ul>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'diario-bordo.php') echo 'class="active"' ?>><a href="diario-bordo.php" title="Meu diário de bordo" style="border: dashed 2px; height:80px;">Entregas em aberto</a></li>
        
      </ul>
      <!--
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#">Link</a></li>-->

        <li class="dropdown <?php if (basename($_SERVER['PHP_SELF']) == 'altera-senha.php') echo 'active' ?>">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $nome; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'altera-senha.php') echo 'class="active"' ?>><a href="altera-senha.php" title="Trocar senha">Alterar senha</a></li>
            <li><a href="contato.php" title="Fale com o treinador">Fale com o treinador</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo wp_logout_url(); ?>" title="Sair">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>