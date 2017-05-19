<!-- The justified navigation menu is meant for single line per list item.
Multiple lines will require custom code not provided by Bootstrap. -->

<?php 
	//include "functions.php";
	$usuario = wp_get_current_user();
	$nome = $usuario->display_name; 
?>

<nav class="navbar navbar-default navbar-fixed-top" style="min-height: 50px !important; border-bottom:0 !important; border-top:solid 10px #ffffff;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="https://ialtaperformance.com/sistema_hawk/user/" style="margin-right:40px;"><img src="https://ialtaperformance.com/wp-content/uploads/2017/04/iap_logo_digital_com_borda_branco.png" alt="Instituto de Alta Performance" title="Instituto de Alta Performance" width="200" /></a>-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" style="height:80px !important;" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"' ?>><a class="menu-princ-novo" href="index.php" style="height:80px; text-shadow:none;">Home <span class="sr-only">(current)</span></a></li>
        <!--<li><a href="index.php">Home</a></li>-->
        <li class="dropdown <?php if (basename($_SERVER['PHP_SELF']) == 'objetivo.php' || basename($_SERVER['PHP_SELF']) == 'desafio.php' || basename($_SERVER['PHP_SELF']) == 'relatorios.php' || basename($_SERVER['PHP_SELF']) == 'pontuacao.php') echo 'active' ?>">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meu treinamento <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'objetivo.php') echo 'class="active"' ?>><a href="objetivo.php" title="Meu objetivo">Meu objetivo</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'desafio.php') echo 'class="active"' ?>><a href="desafio.php" title="Meus desafios">Meus desafios</a></li>            
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'relatorios.php') echo 'class="active"' ?>><a href="relatorios.php" title="Meus relatórios">Meus relatórios</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'pontuacao.php') echo 'class="active"' ?>><a href="pontuacao.php" title="Minha pontuação">Minha pontuação</a></li>
            <li <?php if (basename($_SERVER['PHP_SELF']) == 'agenda.php') echo 'class="active"' ?>><a href="agenda.php" title="Agenda" style="text-shadow:none;">Agenda</a></li>
            <!--
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
            -->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" style="height:80px; text-shadow:none;" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Complementar <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://ialtaperformance.com/courses/alta-performance/lessons/definicao/" title="Módulo online">Módulo online</a></li>
            <li><a href="https://docs.google.com/spreadsheets/d/15U0bOItK_oltuMT5z_OxOElVOcK2jZ5phFyd0K6wsPA/edit#gid=456464551" title="Sugestão de conteúdo" target="_blank">Sugestão de conteúdo</a></li>
            
            <!--
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
            -->
          </ul>
        </li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'contato.php') echo 'class="active"' ?>><a href="contato.php" title="Fale com o Treinador" style="height:80px; text-shadow:none;">Contato treinador</a></li>
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'diario-bordo.php') echo 'class="active"' ?>><a href="diario-bordo.php" title="Meu diário de bordo" style="border: dashed 2px; height:80px;">Meu diário de bordo</a></li>
        
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
        <li <?php if (basename($_SERVER['PHP_SELF']) == 'indicacao.php') echo 'class="active"' ?>><a href="indicacao.php" title="indique um amigo" style="background-color: #ffffff;color:#183F76 !important; border:solid;height:79px;">Indique um amigo</a></li>
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


<!-- MENU ANTIGO -->

<!--
<div class="bs-example">
    <ul class="nav nav-pills">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Inbox</a></li>
                <li><a href="#">Drafts</a></li>
                <li><a href="#">Sent Items</a></li>
                <li class="divider"></li>
                <li><a href="#">Trash</a></li>
            </ul>
        </li>
        <li class="dropdown pull-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li class="divider"></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="masthead">
    <nav>
        <ul class="nav nav-justified">
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"' ?>>
                <a href="index.php">Home</a>
            </li>
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'objetivo.php') echo 'class="active"' ?>>
                <a href="objetivo.php">Objetivo</a>
            </li>
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'desafio.php') echo 'class="active"' ?>>
                <a href="desafio.php">Desafios</a>
            </li>
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'pontuacao.php') echo 'class="active"' ?>>
                <a href="pontuacao.php">Pontuação</a>
            </li>
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'relatorios.php') echo 'class="active"' ?>>
                <a href="relatorios.php">Relatórios</a>
            </li>
            <li <?php #if (basename($_SERVER['PHP_SELF']) == 'agenda.php') echo 'class="active"' ?>>
                <a href="agenda.php">Agenda</a>
            </li>
            <li>
                <a href="http://ialtaperformance.com/courses/alta-performance/lessons/definicao/">Módulo Online</a>
            </li>
            
        </ul>
    </nav>
</div>
-->