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
	<div class="separador col-sm-1"><p>PRODUTOS</p></div>

	<div class="row col-sm-9 offset-sm-1 txt-intro">
    <?php echo $productsCategory[0]->getText();  ?>

		<div class="header2">
			<h2>  <?php echo $productsCategory[0]->getLabel();  ?></h2>
		</div>
    <?php

        for ($i = 0; $i <= (count($products)-1); $i++) {
     ?>
          <!-- prod1 -->
        		<div class="row decubal">
        			 <div class="col-sm-5 col-12 imagem">
        			    <img src="<?php echo BASE_URL.MEDIA_IMAGES.$products[$i]->getUrlImg(); ?>">
        			  </div>
        			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
        			    <img src="images/line.svg">
        			  </div>

        			  <div class="col-sm-4 texto">
        			    <p class="title-destaque"><?php echo $products[$i]->getTitle();  ?></p>
        			    <p class="txt-destaque"><?php echo $products[$i]->getIntro();  ?></p>
        			  </div>

        			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
        			    <img src="images/line.svg">
        			  </div>

        			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
                  <a href="<?php echo BASE_URL."/detalhe-produto/".$products[$i]->getSlug();?>">
        		          <span class="icon-stack">
        		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
        		            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
        		          </span>
        		        </a>
        			  </div>
        		</div>
            <!-- fim prod1 -->
        <?php
        }
        ?>
<!--  RETIRAR ESTES PRODUTOS QUE HAO DE VIR PELO CICLO!!! FALTA FAZER O DETAIL DO PRODUTO E PERCEBER PK NAO MOSTRA O ID. VAMOS FAZER SE FOR FILHO DE FERLIDONA DESENHA TODOS OS PRODUTOS FILHOS DE FERLIDONA. -->
    <!-- prod2 -->
		<!-- <div class="row beacita">
			 <div class="col-sm-5 imagem">
			    <img src="images/beacita.png">
			  </div>
			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-sm-4 texto">
			    <p class="title-destaque">BEACITA</p>
			    <p class="txt-destaque">UMA NOVA <br>FORMA DE <br>PERDER PESO</p>
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
	        <a href="<?php echo BASE_URL; ?>/detalhe-produto-beacita">

		          <span class="icon-stack">-->
		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
		            <!-- <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
		          </span>
		        </a>
			  </div>
		</div> -->
    <!-- fim prod2 -->

    <!-- prod3 -->
		<!-- <div class="row ferlidona">
			 <div class="col-sm-5 imagem">
			    <img src="images/ferlidona.png">
			  </div>
			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-sm-4 texto">
			    <p class="title-destaque">FERLIDONA</p>
			    <p class="txt-destaque">GAMA DE<br>TESTES DE<br>DIAGNÓSTICO<br>PARA MULHERES</p>
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
	        <a href="<?php //echo BASE_URL; ?>/detalhe-produto-ferlidona">

		          <span class="icon-stack">-->
		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
		           <!-- <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
		          </span>
		        </a>
			  </div>
		</div> -->
    <!-- fim prod3 -->
	</div>
</div>
