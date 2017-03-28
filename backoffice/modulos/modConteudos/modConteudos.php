<!--
	Top Right / areaDetalhe
-->
<?php
	$slug=$conn->real_escape_string($_GET['area']);;

	//GET ID FROM SLUG 
	$idS = getIdFromSlugContentCategories($conn, $slug);
	$idCat= $idS->fetch_assoc();

	//GET SLUG FROM ID - USED TO GET NAME OF MAIN CATEGORIES LIKE DECOMED/GENEDEC...
	if(!empty($idCat['id_content_category'])){
	 	$mainSlug= getSlugFromIdContentCategories($conn, $idCat['id_content_category']);
	 	$slugMainCategory=$mainSlug->fetch_assoc();
	}
	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailContents($conn, $id);
	 	$detailInfo = $detail->fetch_assoc();
	 }
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir <?php echo utf8_encode($idCat['title_content_category']) ?></p>
	</div>

	<!--Inputs/Form-->
	<?php
		//$resCat=getAllCategorias($conn);
		if ($action=='edit') { ?>
		<div class="mainPreview">
			<?php
			if(isset($detailInfo['url_pdf_content']) && !empty($detailInfo['url_pdf_content'])){
			?>
				<p class="titlePreview">Pdf</p>
				<div class="preview">
					<a href="<?php echo LIVE_SITE_ADMIN.MEDIA_CONTENT_PDF_FOLDER.$detailInfo['url_pdf_content']?>" target="_blank">
						<img src="<?php echo LIVE_SITE_ADMIN.'/assets/img/pdf.png' ?>" alt="Pdf"/> 
					</a>
				</div>
				<br/>
			<?php
			}
			if(isset($detailInfo['url_img_content']) && !empty($detailInfo['url_img_content'])){
			?>
				<p class="titlePreview">Imagem - Vídeo</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_CONTENT_IMAGE_FOLDER.$detailInfo['url_img_content']?>"  alt="Preview Imagem do Vídeo"/>
				</div>
				<br/>
			<?php
			}
			?>
		</div>
	<?php 
		} 
	?>

	<form method="post" action="modulos/modConteudos/subConteudos.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
		<input type="hidden" name="id" value="<?php echo $idCat['id_content_category'] ?>"/>
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
		<input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/>  

		<label>Nome</label>
		<input type="text" name="nomeContent" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['title_content']):'' ?>">
		<br/>
		<label>Introdução</label>
		<input type="text" name="introContent" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['intro_content']):'' ?>" >
		<br/>
		<label>Conteúdo</label>
		<textarea rows="5" cols="20" name="content" ><?php echo ($action=='edit')? utf8_encode($detailInfo['full_content']):'' ?></textarea>
		<br/>

		<!-- Pdf -->
		<?php 
			if(($_GET["area"] == "noticias")||($_GET["area"] == "genedec_legislacao")){
		?>

				<label>Pdf</label>
				<input type="file" name="pdfCont" accept="application/pdf" >
				<p class="caption">Formatos suportados: .pdf</p>
				<br/>

		<!-- Video -->		
		<?php
			}
			if($_GET["area"] == "video"){
			?>
				<label>Imagem</label>
				<input type="file" name="imagemCont" accept="image/png, image/jpeg">
				<p class="caption">Formatos suportados: .png, .jpg</p>
				<br/>
				<label>Vídeo</label>
				<input type="file" name="videoCont" accept="video/mp4">
				<p class="caption">Formatos suportados: .mp4</p>
				<br/>
		<?php
			}
		 ?>  
		<label>Ordem</label>
		<input type="text" name="ordemCont" value="<?php echo ($action=='edit' )? $detailInfo['order_content']:'' ?>">
		<br/>
		  

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_content']==1 )? 'checked':'' ?>>
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_content'];?>)">
	</form>
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resPC=getAllContents($conn, $idCat['id_content_category']);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome do Conteúdo</th>
				<th>Introdução do Conteúdo</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllCat= $resPC->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
					
				?>

					<tr class="<?php echo $class; ?>">
						
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_content']; ?>"><?php echo utf8_encode($rowAllCat['title_content']); ?></a></td>
						<td><?php echo utf8_encode($rowAllCat['intro_content']); ?></td>
						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteConteudos(<?php echo "'".$slug."'";?>, <?php echo $rowAllCat['id_content'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_content']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllCat['act_content']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubConteudos(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllCat['id_content'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubConteudos(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllCat['id_content']; ?>)">
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