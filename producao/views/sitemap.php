<?php 

    $products = getProductByCategoryId($pdo,4);

?>
<div class="mapInfo col-8 offset-2 col-sm-6 col-lg-6 offset-sm-3 col-xl-6">
	<h2>MAPA DO SITE</h2>
	<p class="linha-separador"></p>
	<ul>
		<li class="linha-separador"><a href="<?php echo BASE_URL; ?>">HOME</a></li>
		<li class="linha-separador"><a href="<?php echo BASE_URL; ?>/content/a-aurovitas">A AUROVITAS</a></li>
		<li class="linha-separador"><a href="<?php echo BASE_URL; ?>/content/grupo">O GRUPO</a></li>
		<li class="linha-separador"><a href="<?php echo BASE_URL; ?>/produtos">PRODUTOS</a>		</li>
		<li class="linha-separador"><a href="<?php echo BASE_URL; ?>/lista-noticias">NOTÍCIAS</a></li>
		<li class="linha-separador"><a href="#info-contactos">CONTACTOS</a></li>
	</ul>
</div>	

