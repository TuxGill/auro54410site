<?php 

  $grupo = getContentCategoriesById($pdo,3);
  $conteudo = getContentByCategoryId($pdo,3);

?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$grupo[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-xl-6 offset-xl-1 col-sm-8 offset-sm-1 col-8 offset-1"><?php echo utf8_encode($grupo[0]->getIntro()); ?></p>
  </div>
</div>

<div class="row conteudo conteudo-grupo col-sm-12">
	<div class="col-10 offset-1 col-sm-10 offset-sm-1">
		<p><?php echo utf8_encode($conteudo[0]->getIntro()); ?></p>
		
		<div class="col-sm-11 col-lg-11 col-xl-11 "> 
		<?php echo utf8_encode($conteudo[0]->getText()); ?>
		</div>
		
	</div>
</div>