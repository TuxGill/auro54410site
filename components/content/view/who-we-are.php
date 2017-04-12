<?php 

  $aurovitas = getContentCategoriesById($pdo,2);
  $conteudo = getContentByCategoryId($pdo,2);

?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$aurovitas[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1 col-8 offset-1"><?php echo $aurovitas[0]->getIntro(); ?></p>
  </div>
</div>

<!-- FERLIDONA -->
<div class="row conteudo conteudoQuemSomos col-sm-12">

	<div class="col-10 offset-1 col-sm-10 offset-sm-1 txt-intro">
    <p>
      <?php echo $conteudo[0]->getText(); ?>
		</p>

    <h2><?php echo $conteudo[1]->getTitle(); ?></h2>

    <p>
      <?php echo $conteudo[1]->getText(); ?>
    </p>


    <div class="col-sm-12 col-lg-12 col-xl-11 valores">
    <!-- valor -->

    <?php 

      for ($i = 2; $i <= (count($conteudo)-1); $i++) {
      ?>
      <h2 class="col-sm-12 h2Aurovitas"><?php echo $conteudo[$i]->getTitle(); ?></h2>
        <div class="row col-sm-12 marginValores">
          <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 imagens">
            <img src="<?php echo BASE_URL.MEDIA_IMAGES.$conteudo[$i]->getUrlImg(); ?>">
          </div>
          <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
              <img src="<?php echo BASE_URL; ?>/images/line.svg">
          </div>
          <div class="col-sm-12 col-md-6 col-lg-5 col-xl-5 textos">
            <h2><?php echo $conteudo[$i]->getTitle(); ?></h2>
            <div>
              <h3><?php echo $conteudo[$i]->getIntro(); ?></h3>
              <p>
                 <?php echo $conteudo[$i]->getText(); ?>
              </p>
            </div>
          </div>
           <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
              <img src="<?php echo BASE_URL; ?>/images/line.svg">
          </div>
          <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 docIcon row-eq-height">
              <i class="fa fa-check" aria-hidden="true"></i>
          </div>
        </div>
      <?php
      }
    ?>
      
       
   
    <!-- Fim -->

     
    </div>
	</div>
</div>


</div>
