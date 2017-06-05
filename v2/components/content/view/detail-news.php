<?php
//O get diz id mas é o slug
 $slugNoticia = $_GET['id'];

 $noticiaContent = getContentByCategorySlug($pdo, $slugNoticia);

$cat = getContentCategoriesById($pdo, $noticiaContent[0]->getCategory());
 ?>

 <?php 
  $imgC= $noticiaContent[0]->getUrlImg();
  ?>

<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$cat[0]->getUrlImg(); ?>">

</div>

<div class="col-sm-12 conteudo">
	<div class="col-sm-1 offset-sm-9 icon-news-link">
    <!-- fb_share(title, url, photo, desc) -->
    <a name="fb_share" onclick=" fb_share('<?php echo $noticiaContent[0]->getTitle(); ?>', '<?php echo BASE_URL."/detalhe-noticia/".$slugNoticia?>' , '<?php echo BASE_URL.MEDIA_IMAGES.$noticiaContent[0]->getUrlImg(); ?>', '<?php echo $noticiaContent[0]->getIntro(); ?>', '<?php echo BASE_URL ?>' );">
      <i class="fa fa-share-alt fa-lg"></i>
    </a>
  </div>
	<h2 class="col-10 offset-1 col-sm-10 offset-sm-1">
    <?php
        setlocale(LC_ALL, 'pt_PT');
        echo strftime("%B %d, %Y", strtotime($noticiaContent[0]->getTs()) );
      ?>
	</h2>
  <h2 class="col-10 offset-1 col-sm-10 offset-sm-1">    
    <?php echo utf8_encode($noticiaContent[0]->getTitle()) ?>
  </h2>

		<h3 class="col-10 offset-1 col-sm-10 offset-sm-1">
			<?php echo utf8_encode($noticiaContent[0]->getIntro()); ?>
		</h3>

    <div style="width:80%; float: left; margin:0 9%;">
		<p class="col-10 offset-1 col-sm-10 offset-sm-1">
			  <?php echo utf8_encode($noticiaContent[0]->getText()); ?>
            <?php  if($noticiaContent[0]->getPDF()!='') { ?>
              <p>
                <a href="media/pdf/<?php echo $noticiaContent[0]->getPDF(); ?> ">PDF</a>
              </p>
        <?php } ?>
		</p>
    </div>



    
</div>
