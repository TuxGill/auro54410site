
<!-- SEM RESULTADOS -->
<?php
  $term=$_POST['termo'];
//echo $term;
  $contents= searchAllContents($pdo, $term);
  $products= searchAllProducts($pdo, $term);


  if(count($contents)==0 && count($products)==0)  {
    ?>

<div class="row conteudo noResults">


	<div class="col-10 offset-1 col-sm-10 offset-sm-1">

		<h2>NÃO FORAM ENCONTRADOS RESULTADOS</h2>
		<div class="row col-10 offset-xl-3">
			<p>TENTE OUTRA VEZ</p>
			<form class="form-inline my-2 my-lg-0 search">
		      <input class="form-control mr-sm-2" type="text" placeholder="PROCURAR" style="color: #242f75;">
		      <a href=""><i class='fa fa-search'></i></a>
		    </form>
	    </div>
	</div>


	
</div>

  <!-- FIM EM RESULTADOS-->

  <?php } else { 
      if(count($contents)>0){
    ?>
          
              <div class="row conteudo Results">
              	<div class="col-10 offset-1 col-sm-10 offset-sm-1">
              		<h2><?php echo $term; ?></h2>

                  <?php
                    for ($i = 0; $i <= (count($contents)-1); $i++) {
                  ?>
              		<div class="col-10 offset-lg-1">
                    <a href="detalhe-noticia/<?php echo $contents[$i]->getSlug();?>">
                          <div>
                            <h3><?php echo strftime("%B %d, %Y", strtotime($contents[$i]->getTs()) ); ?></h3>
                            <h3><?php echo $contents[$i]->getTitle(); ?></h3>
                            <!-- <h3>
                              <?php echo $contents[$i]->getIntro(); ?>
                            </h3>-->
                            <p>
                             <?php echo $contents[$i]->getText(); ?>
                            </p>
                            <p class="linha-separador"> </p>
                          </div>
                      </a>     
              		</div>
                  <?php } ?>
              	</div>
              </div>
           
    <?php } ?> 

    <?php if(count($products)>0){
    ?>

              <div class="row conteudo Results">
                <div class="col-10 offset-1 col-sm-10 offset-sm-1">
                  <h2><?php echo $term; ?></h2>

                  <?php
                    for ($i = 0; $i <= (count($products)-1); $i++) {
                  ?>
                  <a href="detalhe-produto/<?php echo $products[$i]->getSlug();?>">
                  <div class="col-10 offset-lg-1">
                          <div>
                
                            <h3><?php echo $products[$i]->getTitle(); ?></h3>
                            <h3>
                              <?php echo $products[$i]->getIntro(); ?>
                            </h3>
                            <p>
                             <?php echo $products[$i]->getText(); ?>
                            </p>
                            <p class="linha-separador"> </p>
                          </div>     
                  </div>
                  <?php } ?>
                </div>
              </div>
    <?php } ?>           

<?php } ?>