<!--
	Top Right / areaDetalhe
-->

<?php
	$slug=$conn->real_escape_string($_GET['area']);

	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailMedal($conn,$id);
	 	$detailInfo = $detail->fetch_assoc();
	 }

?>

<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir Medalhas </p>
	</div>

	<?php
		//$resCat=getAllCategorias($conn);
		if ($action=='edit') { ?>
		<div class="mainPreview">
			<?php
			if(isset($detailInfo['url_img_medal']) && !empty($detailInfo['url_img_medal'])){
			?>
				<p class="titlePreview">Imagem</p>
				<div class="preview">
					<img src="<?php echo LIVE_SITE_ADMIN.MEDIA_MEDAL_IMAGE_FOLDER.$detailInfo['url_img_medal']?>"  alt="Preview Imagem do Vídeo"/>
				</div>
				<br/>
			<?php
			}
			if(isset($detailInfo['url_pdf_medal']) && !empty($detailInfo['url_pdf_medal'])){
			?>
				<p class="titlePreview">Pdf</p>
				<div class="preview">
					<a href="<?php echo LIVE_SITE_ADMIN.MEDIA_MEDAL_PDF_FOLDER.$detailInfo['url_pdf_medal']?>" target="_blank">
						<img src="<?php echo LIVE_SITE_ADMIN.'/assets/img/pdf.png' ?>" alt="Pdf"/> 
					</a>
				</div>
				<br/>
			<?php
			}
			?>
		</div>
	<?php 
		} 
	?>


	<div>
		<!--Inputs/Form-->
		<form method="post" action="modulos/modMedalhas/subMedalhas.php" class="formCamp" enctype="multipart/form-data">
			
			<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
			<input type="hidden" name="slug" value="<?php echo $_GET['area'] ?>"/>  
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>

			<label>Nome da Medalha</label>
			<input type="text" name="nomeMedalha" value="<?php echo utf8_encode($detailInfo['name_medal']); ?>">
			<br/>
			<label>Descrição da Medalha</label>
			<input type="text" name="descMedalha" value="<?php echo utf8_encode($detailInfo['desc_medal']); ?>" >
			<br/>
			<label>Imagem da Medalha</label>
			<input type="file" name="imgMedal" accept="image/png">
			<p class="caption">Formatos suportados: .png</p>
			<br/>
			<label>Pdf da Medalha</label>
			<input type="file" name="pdfMedal" accept="application/pdf" >
			<p class="caption">Formatos suportados: .pdf</p>
			<br/>
		  

			<!--Botões-->
			
			<label>Publicar</label>
			<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_medal']==1 )? 'checked':'' ?>>
			<br/> 

			<input type="submit" name="save" class="btnSave" value="Gravar">
			<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteMedalhas(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_medal'];?>)">

		</form>
	</div>
</div>

<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resM=getAllMedals($conn);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome da Medalha</th>
				<th>Descrição da Medalha</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllMed= $resM->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}	
				?>
					<tr class="<?php echo $class; ?>">
						
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllMed['id_medal']; ?>"><?php echo utf8_encode($rowAllMed['name_medal']); ?></a></td>
						<td><?php echo utf8_encode($rowAllMed['desc_medal']); ?></td>
						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteMedalhas(<?php echo "'".$slug."'";?>, <?php echo $rowAllMed['id_medal'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllMed['id_medal']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllMed['act_medal']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubMedalhas(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllMed['id_medal'];?>)">
							<?php } else { ?>
									<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubMedalhas(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllMed['id_medal']; ?>)">
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