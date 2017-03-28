
<?php
 	$id=$conn->real_escape_string($_GET['id']);
 	$detail= getDetailProducts($conn, $id);
 	$detailInfo = $detail->fetch_assoc();
?>



	<?php
		$resCat=getCategories($conn);
		
		if ($action=='edit') { ?>
		<div class="mainPreview">
			<?php
			if(isset($detailInfo['img_thumb_product']) && !empty($detailInfo['img_thumb_product'])){
			?>
				<p class="titlePreview">Imagem Pequena do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['img_thumb_product']?>"  alt="Imagem Pequena"/>
				</div>
				<br/>
			<?php
			}
			if(isset($detailInfo['img_full_product']) && !empty($detailInfo['img_full_product'])){
			?>
				<p class="titlePreview">Imagem Grande do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['img_full_product']?>"  alt="Imagem Grande"/>
				</div>
				<br/>
			<?php
			}
			?>
		</div>
	<?php 
		} 
	?>

	<form  method="post" action="modulos/modProdutos/subProdutos.php" class="formProdutos" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
		<input type="hidden" name="slugProd" value="<?php echo $_GET['area'] ?>"/>  
		
		<label>Categoria</label>

		<select name="category">
			<option selected="selected" disabled>Escolha a categoria...</option>
			<?php

			while ($rowCat=$resCat->fetch_assoc() ) {
		 		$nomeCatPai=getCategoryFromID($conn,$rowCat['fk_id_product_category']);							
				while ($res=$nomeCatPai->fetch_assoc()) { 
					if ($res['fk_id_product_category']=='') {
					?>
						<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" <?php echo ($rowCat['id_product_category']==$detailInfo['fk_id_product_category'])? " selected='selected'":'' ?>><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
						<?php 
					} else {
						$nomeCatAvo=getCategoriesChildren($conn,$res['fk_id_product_category']);

						while ($res1=$nomeCatAvo->fetch_assoc()) {
							?>
							<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" <?php echo ($rowCat['id_product_category']==$detailInfo['fk_id_product_category']) ? " selected='selected'":'' ?>><?php echo utf8_encode($res1['title_product_category'])." -> ".utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
						<?php 
						}	
					}
			 	}
		 	}
			 ?>
		</select>
		<br/>
		<br/>

		<label>Nome</label>
		<input type="text" name="nomeProd" value="<?php echo utf8_encode($detailInfo['title_product'])?>">
		<br/>
		<label>Introdução</label>
		<input type="text" name="introProd" value="<?php echo utf8_encode($detailInfo['intro_product'])?>" >
		<br/>
		<label>Descrição do Produto</label>
		<input type="text" name="descProd" value="<?php echo utf8_encode($detailInfo['desc_product'])?>" >
		<br/>
		<label>Imagem do Produto Pequena</label>
		<input type="file" name="imagemProd" accept="image/png, image/jpeg">
		<p class="caption">Formatos suportados: .png, .jpeg</p>
		<br/>
		<label>Imagem do Produto Grande</label>
		<input type="file" name="imagemProdGrd" accept="image/png, image/jpeg">
		<p class="caption">Formatos suportados: .png, .jpeg</p>
		<br/>
		<label>Ordem</label>
		<input type="text" name="ordemProd" value="<?php echo $detailInfo['order_product']?>">
		<br/>

		<!-- Medalhas -->
		<div class="medals">
			<fieldset>
				<legend>Medalhas</legend>
			<?php 
			$resMed=getAllMedals($conn);
			while ($rowMed=$resMed->fetch_assoc()) {	
				$medalsProducts = checkProductMedal($conn, $detailInfo['id_product'], $rowMed['id_medal']);
				$medalExists = $medalsProducts->num_rows;
					//echo "medalha existe".$medalExists;

				?>
				<label><?php echo $rowMed['name_medal'] ?></label>
				<input type="checkbox" name="medal[]" value="<?php echo $rowMed['id_medal']; ?>"<?php echo ($medalExists==1)? 'checked':'' ?>>
			<?php
			}
			?>
			</fieldset>
		</div>

	<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($detailInfo['act_product']==1 )? 'checked':'' ?>>
		<br/>


		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product'];?>)">
	</form>
	<div id='inputGroupPagina'>
	
	<?php 
	$prodPage = getProductPage($conn, $id);
	$iPaginas=1;
	while ($prodPageInfo = $prodPage -> fetch_assoc()) {

	?>
		<form  method="post" action="modulos/modProdutos/subPaginas.php" class="formPaginas" enctype="multipart/form-data">
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>
			<div id="inputPagina<?php echo $iPaginas?>">
				<fieldset>
					<legend>Página Produto</legend>
					
					<div class="prodEdit">
						<label>Título Pagina</label>
						<input type="text" name="titlePagina" id="titlePagina1" value="<?php echo utf8_encode($prodPageInfo['title_product_page']) ?>" > <br>

						<label>Intro Pagina</label>
						<input type="text" name="introPagina" id="introPagina1" value="<?php echo utf8_encode($prodPageInfo['intro_product_page']) ?>"> <br>

						<label>Full Pagina</label>
						<textarea rows="4" name="fullPagina" id="fullPagina1" value=""><?php echo utf8_encode($prodPageInfo['full_product_page']) ?></textarea> <br>

						<label>Pagina</label>
						<input type="file" name="urlImgPagina" id="urlImgPagina1" value=""><br>

						<label>Pagina Background</label>
						<input type="file" name="urlImgBgPagina" id="urlImgBgPagina1" value=""><br>

						<label>Ordem Pagina</label>
						<input type="text" name="orderPagina" id="orderPagina1" value="<?php echo utf8_encode($prodPageInfo['order_product_page']) ?>"> <br>

					</div>

					<div class="mainPreview" id="editMainPreview" >
						<?php
						if(isset($prodPageInfo['url_img_product_page']) && !empty($prodPageInfo['url_img_product_page'])){
						?>
							<p class="titlePreview">Página do Produto</p>
							<div class="preview">
								<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCT_PAGES_FOLDER.$prodPageInfo['url_img_product_page']?>"  alt="Preview Página"/>
							</div>
							<br/>
						<?php
						}
						if(isset($prodPageInfo['url_img_bg_product_page']) && !empty($prodPageInfo['url_img_bg_product_page'])){
						?>
							<p class="titlePreview">Background da Página</p>
							<div class="preview">
								<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCT_PAGES_FOLDER.$prodPageInfo['url_img_bg_product_page']?>"  alt="Preview Background"/>
							</div>
							<br/>
						<?php
						}
						?>
					</div>
					<div class="clearfix"></div>
					<!--Botões-->
					<label>Publicar</label>
					<input type="checkbox" name="publish"  <?php echo ($prodPageInfo['act_product_page']==1 )? 'checked':'' ?>>
					<br/>
					
					<input type="submit" name="save" class="btnSave" value="Gravar">
					<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deletePaginas(<?php echo "'".$slug."'";?>, <?php echo $prodPageInfo['id_product_page'];?>, <?php echo $id;?>)">
					<input type="hidden" name="id_product_page" value="<?php echo $prodPageInfo['id_product_page'];?>" >
					
					
				</fieldset>
			</div>
		</form> 
	<?php 
		$iPaginas++; 
	}
	?>

	</div> 
			<!--Botões para adicionar e remover as div's com id "inputPagina..." -->

	<input type='button' class="btProd" value='Nova Página' onclick='addGroupInputs("Pagina","<?php echo $action?>", "<?php echo $_GET['id'] ?>");'>
	<input type='button' class="btProd" value='Remover Página' onclick='removeGroupInputs("Pagina");'>
		
	<div id='inputGroupPdf'>

	<?php
	$prodPdf = getProductPdf($conn, $id);
	$iPdf=1;
	while ($prodPdfInfo = $prodPdf -> fetch_assoc()) {
	?>
		<form  method="post" action="modulos/modProdutos/subPaginas.php" class="formPdf" enctype="multipart/form-data">	
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>
			<div id="inputPdf<?php echo $iPdf?>">
				<fieldset>
					<legend>Pdf Produto</legend>

					<div class="prodEdit">

						<label>Título Pdf Produto</label>
						<input type="text" name="titlePdf" id="titlePdf1" value="<?php echo utf8_encode($prodPdfInfo['title_product_pdf']) ?>"> <br>

						<label>Desc Pdf Produto</label>
						<textarea rows="4" name="descPdf" id="descPdf1" value=""><?php echo utf8_encode($prodPdfInfo['desc_product_pdf']) ?></textarea><br>

						<label>Pdf Produto</label>
						<input type="file" name="urlPdfPdf" id="urlPdfPdf1" value="" accept="application/pdf"><br>

						<label>Ordem Pdf Produto</label>
						<input type="text" name="orderPdf" id="orderPdf1" value="<?php echo utf8_encode($prodPdfInfo['order_product_pdf']) ?>"> <br>
					</div>

					<div class="mainPreview" id="editMainPreview" >
						
						<?php
						if(isset($prodPdfInfo['url_product_pdf']) && !empty($prodPdfInfo['url_product_pdf'])){
						?>
							<p class="titlePreview">Pdf</p>
							<div class="preview">
								<a href="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCT_PDF_FOLDER.$prodPdfInfo['url_product_pdf']?>" target="_blank">
									<img src="<?php echo LIVE_SITE_ADMIN.'/assets/img/pdf.png' ?>" alt="Pdf"/> 
								</a>
							</div>
							<br/>
						<?php
						}
						?>
					</div>
					<div class="clearfix"></div>
					<!--Botões-->
					<label>Publicar</label>
					<input type="checkbox" name="publish"  <?php echo ($detailInfo['act_product']==1 )? 'checked':'' ?>>
					<br/>

					<input type="submit" name="save" class="btnSave" value="Gravar">
					<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deletePdf(<?php echo "'".$slug."'";?>,  <?php echo $prodPdfInfo['id_product_pdf'];?>, <?php echo $id;?>)">
					<input type="hidden" name="id_product_pdf" value="<?php echo $prodPdfInfo['id_product_pdf'];?>" >
				</fieldset>
			</div>

		</form>

		
	<?php
	}
	
	?>
	</div>
	<!--Botões para adicionar e remover as div's com id "inputPdf..." -->
	<input type='button' class="btProd" value='Novo Pdf' onclick='addGroupInputs("Pdf","<?php echo $action?>", "<?php echo $_GET['id'] ?>");'>
	<input type='button' class="btProd" value='Remover Pdf' onclick='removeGroupInputs("Pdf");'>
	
