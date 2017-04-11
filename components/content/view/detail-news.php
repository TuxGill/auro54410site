<?php
//O get diz id mas é o slug
 $slugNoticia = $_GET['id'];

 $noticiaContent = getContentByCategorySlug($pdo, $slugNoticia);

 ?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$noticiaContent[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1"><?php echo $noticiaContent[0]->getTitle(); ?></p>
  </div>
</div>
<div class="col-sm-12 conteudo">
	<div class="col-sm-1 offset-sm-9 icon-news-link">
    <!-- fb_share(title, url, photo, desc) -->
    <a name="fb_share" onclick=" fb_share('<?php echo $noticiaContent[0]->getTitle(); ?>', '<?php echo BASE_URL."/detalhe-noticia/".$slugNoticia?>' , '<?php echo $noticiaContent[0]->getUrlImg(); ?>', '<?php echo $noticiaContent[0]->getIntro(); ?>' );">
      <i class="fa fa-share-alt fa-lg"></i>
    </a>
  </div>
	<h2 class="col-sm-8 offset-sm-2">
    <?php
        setlocale(LC_ALL, 'pt_PT');
        echo strftime("%B %d, %Y", strtotime($noticiaContent[0]->getTs()) );
      ?>
	</h2>

		<h3 class="col-sm-8 offset-sm-2">
			<?php echo $noticiaContent[0]->getIntro(); ?>
		</h3>

		<p class="col-sm-8 offset-sm-2">
			  <?php echo $noticiaContent[0]->getText(); ?>
		</p>
</div>
