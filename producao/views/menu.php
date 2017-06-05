<!-- <nav>
	<div class="navbar navbar-default" role="navigation">
		<a class="navbar-brand" href="index.php"><img src="images/logo.svg"></a> -->

		<!-- hamburguer -->
<!-- 		<div class="navbar-header ">
	     	<button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu">
	     		<div class="spinner-master2">
				  <input type="checkbox" id="spinner-form2" />
				  <label for="spinner-form2" class="spinner-spin2">
				    <div class="spinner2 diagonal part-1"></div>
				    <div class="spinner2 horizontal"></div>
				    <div class="spinner2 diagonal part-2"></div>
				  </label>
				</div>

  			</button>
	  	</div> -->
		<!-- fim hamburguer -->

		<!-- <div class="navbar-collapse collapse hidden-xs hidden-sm">
		    <ul class="nav navbar-nav navbar-right cl-effect-3">
		      <li><a href="aurovitas.php">A AUROVITAS</a></li>
		      <li><a href="grupo.php">O GRUPO</a></li>
		      <li><a href="produtos.php">PRODUTOS</a></li>
		      <li><a href="noticias.php">NOTÍCIAS</a></li>
		      <li><a href="#">CONTACTOS</a></li>
		      <li><i class='fa fa-search'></i> <input type="text" name="search" placeholder="PROCURAR"></li>
		    </ul>
	 	</div>

	</div>
</nav> -->

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" id="trigger-overlay">
    <span class="navbar-toggler-icon"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
  </button>
  <a class="navbar-brand" href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>/images/logo.svg"></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-md-0 justify-content-center">
      <li class="nav-item">
        <a class="nav-link aurovitas" href="<?php echo BASE_URL; ?>/content/a-aurovitas">A AUROVITAS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>/content/grupo">O GRUPO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>/produtos">PRODUTOS</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL; ?>/lista-noticias">NOTÍCIAS</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="#info-contactos">CONTACTOS</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0"  method="post" action="<?php echo BASE_URL."/"?>index.php?area=pesquisa">
    	

      <input class="form-control mr-sm-2" type="text" name="termo" placeholder="PROCURAR" style="color: #242f75;">
    
      <button><i class='fa fa-search'></i></button>


    </form>
  </div>
</nav>

<div class="overlay overlay-contentscale content-scale">
  <button type="button" class="overlay-close">Close</button>
  <nav>
    <ul>
      <li><a href="<?php echo BASE_URL; ?>/content/a-aurovitas">A AUROVITAS</a></li>
      <li><a href="<?php echo BASE_URL; ?>/content/grupo">O GRUPO</a></li>
      <li><a href="<?php echo BASE_URL; ?>/produtos">PRODUTOS</a></li>
     <!--  <li><a href="<?php echo BASE_URL; ?>/lista-noticias#">NOTÍCIAS</a></li> -->
      <li><a href="#info-contactos">CONTACTOS</a></li>

      <form class="form-responsive form-inline my-2 my-lg-0" action="<?php echo BASE_URL."/"?>index.php?area=search">
      <i class='fa fa-search fa-2x'></i>
        <input class="form-control" type="text" placeholder="PROCURARteste" style="color: #ffffff;">
    </form>
    </ul>

  </nav>
</div>
