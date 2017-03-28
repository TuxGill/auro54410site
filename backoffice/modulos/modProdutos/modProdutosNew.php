<!--Inputs/Form-->

<form  method="post" action="modulos/modProdutos/subProdutos.php" class="formProdutos" enctype="multipart/form-data">
	<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
	<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
	<input type="hidden" name="slugProd" value="<?php echo $_GET['area'] ?>"/>  
	
	<label>Categoria</label>

	<select name="category">
		<option selected="selected" disabled>Escolha a categoria...</option>
		<?php
		$resCat=getCategories($conn);
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
	<label>Imagem do Produto Pequena</label>
	<input type="file" name="imagemProd" accept="image/png, image/jpeg">
	<p class="caption">Formatos suportados: .png, .jpeg</p>
	<br/>
	<label>Imagem do Produto Grande</label>
	<input type="file" name="imagemProdGrd" accept="image/png, image/jpeg">
	<p class="caption">Formatos suportados: .png, .jpeg</p>
	<br/>
	<label>Ordem</label>
	<input type="text" name="ordemProd" value="">
	<br/>
	
	<!-- Medalhas -->
	<div class="medals">
		<fieldset>
			<legend>Medalhas</legend>
		<?php 
		$resMed=getAllMedals($conn);
		
		while ($rowMed=$resMed->fetch_assoc()) {	
		?>
			<label><?php echo $rowMed['name_medal'] ?></label>
			<input type="checkbox" name="medal[]" value="<?php echo $rowMed['id_medal']; ?>">
		 <?php
		}
		?>
		</fieldset>
	</div>
	

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

				<label>Publicar</label>
				<input type="checkbox" name="actPage[]">
				<br/>
			</fieldset>
		</div>
	
	</div>
	
	<!--Botões para adicionar e remover as div's com id "inputPagina..." -->
	<input type='button' class="btProd" value='Nova Página' onclick='addGroupInputs("Pagina");'>
	<input type='button' class="btProd" value='Remover Página' onclick='removeGroupInputs("Pagina");'>

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
