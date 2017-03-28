	
<form >
		<!--Div com Grupo de Inputs para PDF.
		    A função addGroupInputs("Pagina") adiciona div's iguais à "inputPagina1" com o número incrementado-->
		<div id='inputGroupPagina'>

			<div id="inputPagina1">
				<fieldset>
					<legend>Página Produto 1:</legend>

					<label>Título Pagina Produto 1 : </label>
					<input type="text" name="titlePagina[]" id="titlePagina1" value=""> <br>

					<label>Intro Pagina Produto 1 : </label>
					<input type="text" name="introPagina[]" id="introPagina1" value=""> <br>

					<label>Full Pagina Produto 1 : </label>
					<textarea rows="4" name="fullPagina[]" id="fullPagina1" value=""></textarea> <br>

					<label>Pagina Produto 1 : </label>
					<input type="file" name="urlImgPagina[]" id="urlImgPagina1" value=""><br>

					<label>Pagina Produto Background 1 : </label>
					<input type="file" name="urlImgBgPagina[]" id="urlImgBgPagina1" value=""><br>

					<label>Ordem Pagina Produto 1 : </label>
					<input type="text" name="orderPagina[]" id="orderPagina1" value=""> <br>
				</fieldset>
			</div>
		
		</div>
		
		<!--Botões para adicionar e remover as div's com id "inputPagina..." -->
		<input type='button' value='Add Button' onclick='addGroupInputs("Pagina");'>
		<input type='button' value='Remove Button' onclick='removeGroupInputs("Pagina");'>




		<!--Div com Grupo de Inputs para PDF.
		    A função addGroupInputs("Pdf") adiciona div's iguais à "inputPdf1" com o número incrementado-->
		<div id='inputGroupPdf'>

			<div id="inputPdf1">
				<fieldset>
					<legend>Pdf Produto 1:</legend>

					<label>Título Pdf Produto 1 : </label>
					<input type="text" name="titlePdf[]" id="titlePdf1" value=""> <br>

					<label>Desc Pdf Produto 1 : </label>
					<textarea rows="4" name="descPdf[]" id="descPdf1" value=""></textarea><br>

					<label>Pdf Produto 1 : </label>
					<input type="file" name="urlPdfPdf[]" id="urlPdfPdf1" value=""><br>

					<label>Ordem Pdf Produto 1 : </label>
					<input type="text" name="orderPdf[]" id="orderPdf1" value=""> <br>
				</fieldset>
			</div>

		</div>
		<!--Botões para adicionar e remover as div's com id "inputPdf..." -->
		<input type='button' value='Add Button' onclick='addGroupInputs("Pdf");'>
		<input type='button' value='Remove Button' onclick='removeGroupInputs("Pdf");'>

</form>

