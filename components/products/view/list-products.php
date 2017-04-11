<?php
  $productsCategory = getProductCategoriesById($pdo,4);
  $products = getProductByCategoryId($pdo,1);
  // echo "<pre>";
  // print_r($conteudo);
  // echo "</pre>";
?>
<div class="slider">
  <img src="images/produtos.jpg">
  <div class="subtitle">
    <p class="col-sm-6 offset-sm-1">OS NOSSOS <br>PRODUTOS</p>
  </div>
</div>

<div class="row conteudo col-sm-12">
	<div class="separador col-sm-1"><p>PRODUTOS</p></div>

	<div class="row col-sm-9 offset-sm-1 txt-intro">
		<p>
			A Aurovitas comercializa medicamentos genéricos, medicamentos de marca e medicamentos
			não sujeitos a receita médica, abrangendo cerca de 22 áreas terapêuticas.
			<br>Temos um portefólio de mais de 120 produtos, a que correspondem cerca de 400 formas
			de apresentação. Estas são algumas das áreas em que nos distinguimos:
		</p>
		<div class="icons">
			<ul>
				<li><img src="images/antibioticos.png"></li>
				<li><img src="images/sistema_nervoso_central.png"></li>
				<li><img src="images/dermatologicos.png"></li>
			</ul>
			<ul>
				<li><img src="images/antirretrovirais.png"></li>
				<li><img src="images/sistema_digestivo.png"></li>
				<li><img src="images/sistema_respiratorio.png"></li>
			</ul>
			<ul>
				<li><img src="images/sistema_cardiovascular.png"></li>
				<li><img src="images/antialergenicos.png"></li>
				<li><img src="images/sangue_e_orgaos.png"></li>
			</ul>
		</div>

		<div class="header2">
			<h2>MEDICAMENTOS NÃO SUJEITOS A RECEITA MÉDICA (MNSRM)</h2>
		</div>

		<div class="row decubal">
			 <div class="col-sm-5 col-12 imagem">
			    <img src="images/decubal.png">
			  </div>
			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 first line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-sm-4 texto">
			    <p class="title-destaque">DECUBAL</p>
			    <p class="txt-destaque">HIDRATAÇÃO <br>PROFUNDA <br>DA PELE</p>
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 second line row-eq-height">
			    <img src="images/line.svg">
			  </div>

			  <div class="col-0 col-sm-1 col-lg-1 col-xl-1 seta row-eq-height">
				<a href="<?php echo BASE_URL; ?>/detalhe-produto">
		          <span class="icon-stack">
		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
		            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
		          </span>
		        </a>
			  </div>
		</div>
		<div class="row beacita">
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

		          <span class="icon-stack">
		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
		            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
		          </span>
		        </a>
			  </div>
		</div>
		<div class="row ferlidona">
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
	        <a href="<?php echo BASE_URL; ?>/detalhe-produto-ferlidona">

		          <span class="icon-stack">
		           <!--  <i class="fa fa-circle-thin icon-stack-3x fa-4x" aria-hidden="true"></i> -->
		            <i class="fa fa-angle-right icon-stack-1x fa-2x" aria-hidden="true"></i>
		          </span>
		        </a>
			  </div>
		</div>
	</div>
</div>
