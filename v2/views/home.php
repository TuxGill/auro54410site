<?php 
  $home = getContentCategoriesById($pdo,4);
  $destaque = getContentByCategoryId($pdo,4);
?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$home[0]->getUrlImg(); ?>">

  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1 col-8 offset-1"><?php echo $home[0]->getIntro(); ?></p>
    <a class="col-sm-6 offset-sm-1 col-6 offset-1" href="<?php echo BASE_URL; ?>/content/a-aurovitas">SABER MAIS</a>
  </div>
</div>

<div class="row conteudo col-sm-12 col-12">

     <div class="row col-10 offset-1 col-sm-10 col-lg-10 offset-sm-1 col-xl-10">
      <div class="col-12 col-sm-5 col-md-4 col-lg-4 col-xl-4 destaque">
        <img src="<?php echo BASE_URL.MEDIA_IMAGES.$destaque[0]->getUrlImg(); ?>">
      </div>

      <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
        <img src="<?php echo BASE_URL; ?>/images/line.svg" onerror="this.onerror=null; this.src='line.png'">
      </div>

      <div class="col-12 col-sm-5 col-lg-4 col-xl-4 texto">
        <p class="title-destaque"><?php echo $destaque[0]->getTitle(); ?></p>
        <p class="txt-destaque"><?php echo $destaque[0]->getText(); ?></p>
      </div>


      <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
        <img src="<?php echo BASE_URL; ?>/images/line.svg" onerror="this.onerror=null; this.src='line.png'">
      </div>

      <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
        <a href="<?php echo $destaque[0]->getLink1(); ?>">
          <span class="icon-stack">
           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
          </span>
        </a>
      </div>
  </div>


</div>



