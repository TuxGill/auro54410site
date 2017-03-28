<!--
	Top Right / areaDetalhe
-->
<?php
	$slug=$conn->real_escape_string($_GET['area']);;

	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailProducts($conn, $id);
	 	$detailInfo = $detail->fetch_assoc();
	 }
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir Produtos</p>
	</div>

	<!--Inputs/Form-->
	<?php
		$resCat=getCategories($conn);
		
		if ($action=='edit') { ?>
		<div class="mainPreview">
			<?php
			if(isset($detailInfo['img_thumb_product']) && !empty($detailInfo['img_thumb_product'])){
			?>
				<p class="titlePreview">Imagem do Produto</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_PRODUCTS_FOLDER.$detailInfo['img_thumb_product']?>"  alt="Preview Background"/>
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
						<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" <?php echo ($action=='edit' && ($rowCat['id_product_category']==$detailInfo['fk_id_product_category']) )? " selected='selected'":'' ?>><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
						<?php 
					} else {
						$nomeCatAvo=getCategoriesChildren($conn,$res['fk_id_product_category']);

						while ($res1=$nomeCatAvo->fetch_assoc()) {
							?>
							<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" <?php echo ($action=='edit' && ($rowCat['id_product_category']==$detailInfo['fk_id_product_category']) )? " selected='selected'":'' ?>><?php echo utf8_encode($res1['title_product_category'])." -> ".utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
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
		<input type="text" name="nomeProd" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['title_product']):'' ?>">
		<br/>
		<label>Introdução</label>
		<input type="text" name="introProd" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['intro_product']):'' ?>" >
		<br/>
		<label>Descrição do Produto</label>
		<input type="text" name="descProd" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['desc_product']):'' ?>" >
		<br/>
		<label>Imagem do Produto Pequena</label>
		<input type="file" name="imagemProd" accept="image/png">
		<p class="caption">Formatos suportados: .png</p>
		<br/>
		<label>Imagem do Produto Grande</label>
		<input type="file" name="imagemProdGrd" accept="image/png">
		<p class="caption">Formatos suportados: .png</p>
		<br/>
		<label>Ordem</label>
		<input type="text" name="ordemProd" value="<?php echo ($action=='edit' )? $detailInfo['order_product']:'' ?>">
		<br/>


	<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_product']==1 )? 'checked':'' ?>>
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product'];?>)">
	</form>

	<form  method="post" action="modulos/modProdutos/subProdutos.php" class="formProdutos" enctype="multipart/form-data">
		<?php 
		if ($action=='new') {
		
		 ?>

			<!--Div com Grupo de Inputs para PDF.
			    A função addGroupInputs("Pagina") adiciona div's iguais à "inputPagina1" com o número incrementado-->
			<div id='inputGroupPagina'>
				<div id="inputPagina1">
					<fieldset>
						<legend>Página Produto 1</legend>

						<label>Título Pagina 1</label>
						<input type="text" name="titlePagina[]" id="titlePagina1" value="" > <br>

						<label>Intro Pagina 1</label>
						<input type="text" name="introPagina[]" id="introPagina1" value=""> <br>

						<label>Full Pagina 1</label>
						<textarea rows="4" name="fullPagina[]" id="fullPagina1" value=""></textarea> <br>

						<label>Pagina 1</label>
						<input type="file" name="urlImgPagina[]" id="urlImgPagina1" value=""><br>

						<label>Pagina Background 1</label>
						<input type="file" name="urlImgBgPagina[]" id="urlImgBgPagina1" value=""><br>

						<label>Ordem Pagina 1</label>
						<input type="text" name="orderPagina[]" id="orderPagina1" value=""> <br>
					</fieldset>
				</div>
			
			</div>
			
			<!--Botões para adicionar e remover as div's com id "inputPagina..." -->
			<input type='button' class="btProd" value='Nova Página' onclick='addGroupInputs("Pagina");'>
			<input type='button' class="btProd" value='Remover Página' onclick='removeGroupInputs("Pagina");'>

			
		</form>

		<form  method="post" action="modulos/modProdutos/XXXXXXXXX.php" class="formProdutos" enctype="multipart/form-data">

			<!--Div com Grupo de Inputs para PDF.
			    A função addGroupInputs("Pdf") adiciona div's iguais à "inputPdf1" com o número incrementado-->

			<div id='inputGroupPdf'>

				<div id="inputPdf1">
					<fieldset>
						<legend>Pdf Produto 1</legend>

						<label>Título Pdf Produto 1</label>
						<input type="text" name="titlePdf[]" id="titlePdf1" value=""> <br>

						<label>Desc Pdf Produto 1</label>
						<textarea rows="4" name="descPdf[]" id="descPdf1" value=""></textarea><br>

						<label>Pdf Produto 1</label>
						<input type="file" name="urlPdfPdf[]" id="urlPdfPdf1" value="" accept="application/pdf"><br>

						<label>Ordem Pdf Produto 1</label>
						<input type="text" name="orderPdf[]" id="orderPdf1" value=""> <br>
					</fieldset>
				</div>

			</div>
			<!--Botões para adicionar e remover as div's com id "inputPdf..." -->
			<input type='button' class="btProd" value='Novo Pdf' onclick='addGroupInputs("Pdf");'>
			<input type='button' class="btProd" value='Remover Pdf' onclick='removeGroupInputs("Pdf");'>
			<br>
			<br>

		 <?php 
		} 
			
			}

			?>
			

		</form>

			<?php
			$prodPdf =  getProductPdf($conn, $id);
			while ($prodPdfInfo = $prodPdf -> fetch_assoc()) {
			?>
				<div id='inputGroupPdf'>

				<div id="inputPdf1">
					<fieldset>
						<legend>Pdf Produto</legend>

						<div class="prodEdit">

							<label>Título Pdf Produto</label>
							<input type="text" name="titlePdf[]" id="titlePdf1" value="<?php echo utf8_encode($prodPdfInfo['title_product_pdf']) ?>"> <br>

							<label>Desc Pdf Produto</label>
							<textarea rows="4" name="descPdf[]" id="descPdf1" value=""><?php echo utf8_encode($prodPdfInfo['desc_product_pdf']) ?></textarea><br>

							<label>Pdf Produto</label>
							<input type="file" name="urlPdfPdf[]" id="urlPdfPdf1" value="" accept="application/pdf"><br>

							<label>Ordem Pdf Produto</label>
							<input type="text" name="orderPdf[]" id="orderPdf1" value="<?php echo utf8_encode($prodPdfInfo['order_product_pdf']) ?>"> <br>
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
						<!--Botões-->
						<label>Publicar</label>
						<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_product']==1 )? 'checked':'' ?>>
						<br/>

						<input type="submit" name="save" class="btnSave" value="Gravar">
						<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product'];?>)">
					</fieldset>
				</div>

			</div>
			<?php
			}
		}
		?>
	</form>
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resP=getAllProducts($conn);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome do Produto</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllCat= $resP->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
				?>

					<tr class="<?php echo $class; ?>">
						<?php
							$nomeCatPai1=getCategoryFromID($conn,$rowAllCat['fk_id_product_category']);
							while ($res=$nomeCatPai1->fetch_assoc()) { ?>
								<td><a href="home.php?area=categorias&id=<?php echo $rowAllCat['id_product']; ?>"><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowAllCat['title_product']); ?></a></td>
							<?php
							}
							
						?>						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteProdutos(<?php echo "'".$slug."'";?>, <?php echo $rowAllCat['id_product'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_product']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllCat['act_product']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubProdutos(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllCat['id_product'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubProdutos(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllCat['id_product']; ?>)">
								<?php } ?>
							</a>
						</td>

					</tr> 
			<?php	
					$i++;
				}
			 ?>
		</tbody>
	</table>
</div>