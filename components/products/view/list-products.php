<?php
  $productsCategory = getProductCategoryById($pdo,4);
  $products = getProductByCategoryId($pdo,4);

  // echo "<pre>";
  // print_r($products);
  // echo "</pre>";
?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$productsCategory[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1"><?php echo $productsCategory[0]->getIntro();  ?></p>
  </div>
</div>

<div class="row conteudo col-sm-12">

	<div class="row col-10 offset-1 col-sm-10 offset-sm-1 txt-intro">
    <?php echo $productsCategory[0]->getText();  ?>

		<div class="header2">
			<h2>  <?php echo $productsCategory[0]->getLabel();  ?></h2>
		</div>
    
    <?php
        for ($i = 0; $i <= (count($products)-1); $i++) {
     ?>
          <!-- prod -->
          <a class="linkProdutos" href="<?php echo BASE_URL."/detalhe-produto/".$products[$i]->getSlug();?>">
        		<div class="row decubal">
          			 <div class="col-sm-5 col-12 imagem">
          			    <img src="<?php echo BASE_URL.MEDIA_IMAGES.$products[$i]->getUrlImg(); ?>">
          			  </div>
          			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
          			    <img src="images/line.svg" onerror="this.onerror=null; this.src='line.png'">
          			  </div>

          			  <div class="col-sm-4 texto">
                    <div>
          			         <p class="title-destaque"><?php echo $products[$i]->getTitle();  ?></p>
          			       <p class="txt-destaque"><?php echo $products[$i]->getIntro();  ?></p>
                    </div>
          			  </div>

          			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
          			    <img src="images/line.svg" onerror="this.onerror=null; this.src='line.png'">
          			  </div>

          			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
                    
          		          <span class="icon-stack">
          		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
          		            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
          		          </span>
          		        
          			  </div>
        		</div>
            </a>
            <!-- fim prod -->
        <?php
        }
        ?>
	</div>
</div>
