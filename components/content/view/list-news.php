<?php

  $noticiasCategory = getContentCategoriesById($pdo,1);
  $conteudo = getNewsByCategoryId($pdo,1);

  // echo "<pre>";
  // print_r($conteudo);
  // echo "</pre>";


?>
<div class="slider">
  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$noticiasCategory[0]->getUrlImg(); ?>">
  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1"><?php echo $noticiasCategory[0]->getIntro();  ?></p>
  </div>
</div>

<div class="row conteudo conteudo-news col-sm-12">

    <div class="mainNot col-10 offset-1 col-sm-10 offset-sm-1 noticias">
      <?php

        for ($i = 0; $i <= (count($conteudo)-1); $i++) {
      ?>
          <!-- Noticias -->
          <div class="row">
              <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 imagens ">
                <div>
                  <img src="<?php echo BASE_URL.MEDIA_IMAGES.$conteudo[$i]->getUrlImg(); ?>">
                </div>
              </div>
              <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line row-eq-height">
                  <img src="images/line.svg">
              </div>
              <div class="col-sm-12 col-md-6 col-lg-5 col-xl-5 textos row-eq-height">
                <div>
                  <h2>
                    <?php
                        setlocale(LC_ALL, 'pt_PT');
                        echo strftime("%B %d, %Y", strtotime($conteudo[$i]->getTs()) );
                      ?>
                  </h2>
                  <h2>
                    <?php echo $conteudo[$i]->getTitle(); ?>
                  </h2>
                  <h3>
                    <?php echo $conteudo[$i]->getIntro(); ?>
                  </h3>
                  <p>
                    <?php echo $conteudo[$i]->getText(); ?>
                  </p>
                </div>
              </div>
               <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
                  <img src="images/line.svg">
              </div>
              <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 seta row-eq-height">
                <a href="<?php echo BASE_URL."/detalhe-noticia/".$conteudo[$i]->getSlug();?>">
                  <span class="icon-stack">
                   <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
                    <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
                  </span>
                </a>
              </div>
           </div>
          <!-- Fim Noticias -->
      <?php
      }
      ?>


        <!-- Noticias 2 -->
        <!-- <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 imagens ">
            <img src="images/news2.jpg">
          </div>
          <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line row-eq-height">
              <img src="images/line.svg">
          </div>
          <div class="col-sm-12 col-md-6 col-lg-5 col-xl-5 textos row-eq-height">
            <div>
              <h2>AGOSTO 27, 2016</h2>
              <h3>
                Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Morbi rutrum diam vitae
                nibh eleifend, et dictum est venenatis.
                Proin dignissim eu mauris nec egestas.
              </h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing
                elit. Morbi rutrum diam vitae nibh eleifend, et dictum
                est venenatis. Proin dignissim eu mauris nec egestas.
                Sed imperdiet eget lectus quis interdum
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Morbi rutrum diam vitae nibh eleifend, et dictum est
                venenatis. Proin dignissim eu mauris nec..
              </p>
            </div>
          </div>
           <div class="col-sm-0 col-md-1 col-lg-1 col-xl-1 line  row-eq-height">
              <img src="images/line.svg">
          </div>
          <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1 seta row-eq-height">
            <a href="<?php /*echo BASE_URL;*/ ?>/detalhe-noticia">

              <span class="icon-stack">
                <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i>
                <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
             </span>
            </a>
          </div> -->
        <!-- Fim Noticias 2 -->
      </div>
    </div>
</div>

<!-- botao +  -->
<div class="row conteudo btnMais col-sm-12">
	<div class="col-sm-12 centerBtn">
		<a class="" href="#">
      <span class="icon-stack">
       <i class="fa fa-plus" aria-hidden="true"></i>
      </span>
		</a>
	</div>
</div>
