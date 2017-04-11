<?php 

  $grupo = getContentCategoriesById($pdo,3);
  $conteudo = getContentByCategoryId($pdo,3);

?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$grupo[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-xl-6 offset-xl-1 col-sm-8 offset-sm-1 col-8 offset-1"><?php echo $grupo[0]->getIntro(); ?></p>
  </div>
</div>

<div class="row conteudo conteudo-grupo col-sm-12">
	<div class="separador col-sm-1"></div>
	<div class="col-sm-9 col-lg-9 col-xl-9 offset-sm-1">
		<p><?php echo $conteudo[0]->getIntro(); ?></p>
		
		<div class="col-sm-11 col-lg-11 col-xl-11 "> 
		<?php echo $conteudo[0]->getText(); ?>
		</div>
		
	</div>
</div>