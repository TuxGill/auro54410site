
<?php
 	$id=$conn->real_escape_string($_GET['id']);
 	$detail= getDetailProductsF($conn, $id);
 	$detailInfo = $detail->fetch_assoc();

?>



	<?php
		$resCat=getCategories($conn);
		
		if ($action=='edit') { ?>
		<div class="mainPreview" id="infoMainPreview">
			<?php
			if(isset($detailInfo['url_img_logo_simple_product_info']) && !empty($detailInfo['url_img_logo_simple_product_info'])){
			?>
				<p class="titlePreview">Logo do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['url_img_logo_simple_product_info']?>"  alt="Imagem Pequena"/>
				</div>
				<br/>
			<?php
			}
			if(isset($detailInfo['img_thumb_product']) && !empty($detailInfo['img_thumb_product'])){
			?>
				<p class="titlePreview">Imagem Pequena do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['img_thumb_product']?>"  alt="Imagem Pequena"/>
				</div>
				<br/>
			<?php
			}
			if(isset($detailInfo['url_img_simple_product_info']) && !empty($detailInfo['url_img_simple_product_info'])){
			?>
				<p class="titlePreview">Imagem do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['url_img_simple_product_info']?>"  alt="Imagem Pequena"/>
				</div>
				<br/>
			<?php
			}
			?>
		</div>
	<?php 
		} 
	?>

	<form  method="post" action="modulos/modFichaProdutos/subFichaProdutos.php" class="formProdutos" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
		<input type="hidden" name="slugProd" value="<?php echo $_GET['area'] ?>"/>  
		
		<label>Categoria</label>

		<select name="category">
			<option selected="selected" disabled>Escolha a categoria...</option>
			<?php
				if ($_GET['area']=="farma") {
				$resCat=getCategoriesF($conn);
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
			} else if ($_GET['area']=="prod_eticos") {
				$resCat=getCategoriesPE($conn);
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
		<label>Logo Info Produto</label>
		<input type="file" name="url_img_logo_simple_product_info" accept="image/png, image/jpeg" >
		<p class="caption">Formatos suportados: .png, .jpeg</p>
		<br>	
		<label>Imagem do Produto Pequena</label>
		<input type="file" name="imagemProd" accept="image/png, image/jpeg">
		<p class="caption">Formatos suportados: .png, .jpeg</p>
		<br/>
		<label>Imagem do Produto</label>
		<input type="file" name="imagemProdGrd" accept="image/png, image/jpeg">
		<p class="caption">Formatos suportados: .png, .jpeg</p>
		<br/>
		<label>Ordem</label>
		<input type="text" name="ordemProd" value="<?php echo $detailInfo['order_product']?>">
		<br/>

	<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($detailInfo['act_product']==1 )? 'checked':'' ?>>
		<br/>


		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product'];?>)">
	</form>

	<div id='inputGroupInfo'>
	
	<?php 
	$prodInfo = getInfoParameter($conn, $id);
	$iPaginas=1;
	while ($prodInfoPar = $prodInfo -> fetch_assoc()) {

	?>
		<form  method="post" action="modulos/modFichaProdutos/subInfoParameters.php" class="formPaginas" enctype="multipart/form-data">
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>
			<div id="inputInfo1<?php echo $iPaginas?>">
				<fieldset>
					<legend>Info Produto</legend>
					
					<div>
						<label>Designação</label>
						<input type="text" name="key_info_parameter" id="keyInfo1" value="<?php echo utf8_encode($prodInfoPar['key_info_parameter']) ?>" > <br>

						<label>Valor</label>
						<textarea type="text" name="value_info_parameter" id="valueInfo1" ><?php echo utf8_encode($prodInfoPar['value_info_parameter']) ?></textarea> <br>

						<label>Ordem </label>
						<input type="text" name="order_info_parameter" id="orderInfo1" value="<?php echo utf8_encode($prodInfoPar['order_info_parameter']) ?>"> <br>

					</div>

					<!--Botões-->
					<label>Publicar</label>
					<input type="checkbox" name="act_info_parameter"  <?php echo ($prodInfoPar['act_info_parameter']==1 )? 'checked':'' ?>>
					<br/>
					
					<input type="submit" name="save" class="btnSave" value="Gravar">
					<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="delInfoParameter.php(<?php echo "'".$slug."'";?>, <?php echo $prodInfoPar['id_info_parameter'];?>, <?php echo $id;?>)">
					<input type="hidden" name="id_info_parameter" value="<?php echo $prodInfoPar['id_info_parameter'];?>" >
					
					
				</fieldset>
			</div>
		</form> 
	<?php 
		$iPaginas++; 
	}
	?>

	</div> 
			<!--Botões para adicionar e remover as div's com id "inputInfo..." -->

	<input type='button' class="btProd" value='Novo Info Produto' onclick='addGroupInputs("Info","<?php echo $action?>", "<?php echo $detailInfo['fk_id_simple_product_info'] ?>");'>
	<input type='button' class="btProd" value='Remover Info Produto' onclick='removeGroupInputs("Info");'>

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

	<!--Botões para adicionar e remover as div's com id "inputPdf..." -->
	<input type='button' class="btProd" value='Novo Pdf' onclick='addGroupInputs("Pdf","<?php echo $action?>", "<?php echo $_GET['id'] ?>");'>
	<input type='button' class="btProd" value='Remover Pdf' onclick='removeGroupInputs("Pdf");'>
	

	</div>
	