<!--Inputs/Form-->

<form  method="post" action="modulos/modFichaProdutos/subFichaProdutos.php" class="formProdutos" enctype="multipart/form-data">
	<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
	<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
	
	
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
						<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" ><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
						<?php 
					} else {
						$nomeCatAvo=getCategoriesChildren($conn,$res['fk_id_product_category']);

						while ($res1=$nomeCatAvo->fetch_assoc()) {
							?>
							<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" ><?php echo utf8_encode($res1['title_product_category'])." -> ".utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
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
						<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" ><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
						<?php 
					} else {
						$nomeCatAvo=getCategoriesChildren($conn,$res['fk_id_product_category']);

						while ($res1=$nomeCatAvo->fetch_assoc()) {
							?>
							<option  value="<?php echo utf8_encode($rowCat['id_product_category']); ?>" ><?php echo utf8_encode($res1['title_product_category'])." -> ".utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowCat['title_product_category']); ?></option>
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
	<input type="text" name="nomeProd" value="">
	<br/>
	<label>Introdução</label>
	<input type="text" name="introProd" value="" >
	<br/>
	<label>Descrição do Produto</label>
	<input type="text" name="descProd" value="" >
	<br/>
	<label>Logo Info Produto</label>
	<input type="file" name="url_img_logo_simple_product_info" accept="image/png, image/jpeg" >
	<p class="caption">Formatos suportados: .png, .jpeg</p>
	<br>
	<br/>
	<label>Imagem do Produto Pequena</label>
	<input type="file" name="imagemProd" accept="image/png, image/jpeg">
	<p class="caption">Formatos suportados: .png, .jpeg</p>
	<br/>
	<label>Imagem do Produto</label>
	<input type="file" name="imagemProdGrd" accept="image/png, image/jpeg">
	<p class="caption">Formatos suportados: .png, .jpeg</p>
	<br/>
	<label>Ordem</label>
	<input type="text" name="ordemProd" value="">
	<br/>
	
	
	<!--Div com Grupo de Inputs para PDF.
	    A função addGroupInputs("Pagina") adiciona div's iguais à "inputPagina1" com o número incrementado-->
	<div id='inputGroupInfo'>
		<div id="inputInfo1">
			<fieldset>
				<legend>Info Produto 1</legend>

				<label>Designação 1</label>
				<input type="text" name="key_info_parameter[]" id="keyInfo1" value="" > <br>

				<label>Valor 1</label>
				<textarea  name="value_info_parameter[]" id="valueInfo1"></textarea>
				<br>

				<label>Ordem 1</label>
				<input type="text" name="order_info_parameter[]" id="orderInfo1" value=""><br>

				<label>Publicar</label>
				<input type="checkbox" name="act_info_parameter[]" id="actInfo1"><br>
			</fieldset>
		</div>
	</div>
	
	<!--Botões para adicionar e remover as div's com id "inputInfo..." -->
	<input type='button' class="btProd" value='Novo Info Produto' onclick='addGroupInputs("Info");'>
	<input type='button' class="btProd" value='Remover Info Produto' onclick='removeGroupInputs("Info");'>

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

				<label>Publicar</label>
				<input type="checkbox" name="actPdf[]">
				<br/>
			</fieldset>
		</div>

	</div>
	<!--Botões para adicionar e remover as div's com id "inputPdf..." -->
	<input type='button' class="btProd" value='Novo Pdf' onclick='addGroupInputs("Pdf");'>
	<input type='button' class="btProd" value='Remover Pdf' onclick='removeGroupInputs("Pdf");'>
	<br>
	<br>
	<!--Botões-->
	<label>Publicar</label>
	<input type="checkbox" name="publish">
	<br/>

	<input type="submit" name="save" class="btnSave" value="Gravar">
	<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product'];?>)">
</form>
