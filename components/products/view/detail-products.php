<?php
//O get diz id mas corresponde ao slug
 $slugProduto = $_GET['id'];
 $productContent = getProductDetailBySlug($pdo, $slugProduto);
 ?>

 <?php if(isset($productContent[0]->getVideo()) && $productContent[0]->getVideo()!='' ) { ?>
<div class="slider">
  <div class="videoWrapper">
    <!-- TODO: BACKOFFICE - SE FOR YOUTUBE -->
    <!-- <iframe id="ytplayer" type="text/html" width="1920" height="1080"
    src="https://www.youtube.com/embed/1Hl5GIN8NRE"
    frameborder="0"></iframe> -->

    <!-- TODO: BACKOFFICE - SE FOR MEDIA -->
    <video src="<?php echo BASE_URL.MEDIA_VIDEOS.$productContent[0]->getVideo(); ?>" autoplay loop poster="media/images/poster_video_decubal.jpg">
    </video>
  </div>
</div>
<?php } ?>
<!-- PRODUTO -->
<div class="row conteudo conteudoProd col-sm-12">
 
	<div class="col-10 offset-1 col-sm-10 offset-sm-1 txt-intro">
    <img class="logoProd" src="<?php echo BASE_URL.MEDIA_IMAGES.$productContent[0]->getLogo(); ?>" alt="">

    <div>
      <?php echo $productContent[0]->getText(); ?>
		</div>
    <?php
        //SE FOR FERLIDONA - ID 7
        if ($productContent[0]->getId() == 7) {

          $produtosFerlidona = getProductByCategoryId($pdo, 5);
    ?>
          <div class="gamaProd gamaFerlidona">
          <?php
            for ($i=0; $i <= (count($produtosFerlidona)-1); $i++) {
          ?>
                <!-- Produto ferlidona -->
                <div class="row col-sm-12 prodFer">
                  <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 imagens">
                    <img src="<?php echo BASE_URL.MEDIA_IMAGES.$produtosFerlidona[$i]->getUrlImg(); ?>">
                  </div>
                  <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
                      <img src="../images/line.svg">
                  </div>
                  <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6 textos">
                    <h2 style="color:<?php echo $produtosFerlidona[$i]->getColor(); ?>">
                      <?php echo $produtosFerlidona[$i]->getTitle(); ?>
                    </h2>
                    <h3>
                      <?php echo $produtosFerlidona[$i]->getIntro(); ?>
                    </h3>
                    <p>
                        <?php echo $produtosFerlidona[$i]->getText(); ?>
                    </p>
                  </div>
                   <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
                      <img src="../images/line.svg">
                  </div>
                  <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 docIcon row-eq-height">
                      <a target="_blank" href="<?php echo BASE_URL.MEDIA_PDF.$produtosFerlidona[$i]->getPdf(); ?>">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                      </a>
                  </div>
                </div>
                <!-- Fim Produto ferlidona -->
          <?php
            }
           ?>
          </div>
    <?php
        //SE FOR BEACITA E DECUBAL
        }else{
    ?>
          <div class="gamaProd">
            <img class="" src="<?php echo BASE_URL.MEDIA_IMAGES.$productContent[0]->getUrlImg(); ?>" alt="<?php echo $productContent[0]->getTitle(); ?>">
          </div>
    <?php
        }
     ?>
	</div>
  <!-- LINKS / RCM - BEACITA E DECUBAL-->
  <?php
    //Decubal - id 5
    if ($productContent[0]->getId() == 5) {
  ?>
      <div class="col-10 offset-1 col-sm-10 offset-sm-1 linksprod">
          <p>ENTRE NO MUNDO DECUBAL</p>
          <div >
            <a target="_blank" href="<?php echo $productContent[0]->getLink1(); ?>">
              <i class="fa fa-desktop" aria-hidden="true"></i>
              DECUBAL.PT
            </a>

            <a target="_blank"  href="<?php echo $productContent[0]->getLink2(); ?>">
              <i class="fa fa-facebook-official" aria-hidden="true"></i>
              DECUBALPORTUGAL
            </a>
          </div>
      </div>
  <?php
    //Beacita - id 6
    }else if($productContent[0]->getId() == 6){
  ?>
      <div class="col-10 offset-1 col-sm-10 offset-sm-1 rcmprod">
        <a target="_blank" href="<?php echo BASE_URL.MEDIA_PDF.$productContent[0]->getPdf(); ?>">
          <i class="fa fa-file-text" aria-hidden="true"></i>
          RCM
        </a>
      </div>
  <?php
    }
  ?>
</div>
<!-- FIM PRODUTO -->
