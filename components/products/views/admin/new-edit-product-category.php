<!--
	Top Right / areaDetalhe
-->
<?php

	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
	} else {
		$action ='edit';

		//$id=$conn->real_escape_string($_GET['id']);
		$detailInfo= getProductCategoryById($pdo, $_GET['id']);

	}




?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo BASE_URL."/backoffice/home.php?area=newproductcategory" ?>"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
		<p>Gerir Artigos </p>
	</div>

	<!--Inputs/Form-->
	<form method="post" action="../components/products/views/admin/submit.productCategory.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>

		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/>
		<input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/>

		<label>Título</label>
		<input <?php echo ($action=='new')? 'disabled' : '' ; ?> type="text" name="title" value="<?php echo ($action=='edit')? $detailInfo[0]->getTitle() : '' ; ?>" required>
		<br/>

		<!-- Image preview -->
		<?php
			if ($action=='edit') { ?>
				<div class="mainPreview">

					<?php
						if( $detailInfo[0]->getUrlImg() ){
					?>
							<p class="titlePreview">Imagem</p>
							<div class="preview">
								<a target="_blank" href="<?php echo BASE_URL.MEDIA_IMAGES.$detailInfo[0]->getUrlImg() ?>"><img src="<?php echo BASE_URL.MEDIA_IMAGES.$detailInfo[0]->getUrlImg() ?>"  alt="Imagem"/></a>
							</div>
							<br/>
					<?php
						}
					?>
				</div>
		<?php
			}
		?>
		<!-- End Image preview -->

		<label>Imagem de Cabeçalho</label>
		<input <?php echo ($action=='new')? 'disabled required' : '' ; ?> type="file" name="topo" >
		<br/>

		<label>Intro</label>
		<input <?php echo ($action=='new')? 'disabled' : '' ; ?> type="text" name="intro" value="<?php echo ($action=='edit')? $detailInfo[0]->getIntro() : '' ; ?>" required>
		<br/>

		<label>Texto Longo</label>
		<textarea <?php echo ($action=='new')? 'disabled' : '' ; ?> name="text"  id="editor" required> <?php echo ($action=='edit')? $detailInfo[0]->getText() : '' ; ?></textarea>
		<br/>


		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="act" <?php echo ($action=='edit' && $detailInfo[0]->getAct()==1 )? 'checked':'' ?> >
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>,<?php echo $id ?>)" >
	</form>
</div>




<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	//$resPC=getAllContents($conn, $idCat['id_content_category']);


		$collection = getAllProductCategories($pdo);


	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th width="200">Titulo</th>
				<th>Intro</th>
				<th>Imagem</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<?php
			for($i=0;$i<count($collection);$i++){
				if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
				?>
				<tr class="<?php echo $class; ?>">
					<td><a href="home.php?area=editproductcategory&id=<?php echo $collection[$i]->getId(); ?>"><?php echo $collection[$i]->getTitle() ; ?></a></td>
					<td><?php echo $collection[$i]->getIntro(); ?></td>
					<td>
						<?php
							if($collection[$i]->getUrlImg() !=""){
						?>
								<img src="<?php echo BASE_URL.MEDIA_IMAGES.$collection[$i]->getUrlImg(); ?>">
						<?php
							}else{
						?>
						<div class="noPhoto">
							<span class="fa-stack fa-lg ">
								<i class="fa fa-camera fa-stack-1x"></i>
								<i class="fa fa-ban fa-stack-2x text-danger"></i>
							</span>
							<p>Sem foto</p>
						</div>
					<?php
							}
					?>
					</td>
					<td><a href="JavaScript:void(0);"><i class="fa fa-times-circle fa-2x" aria-hidden="true" onclick="deleteContent(<?php echo $collection[$i]->getId();?>)"></i></a></td>
					<td><a href="home.php?area=editproductcategory&id=<?php echo $collection[$i]->getId(); ?>">


							<span class="fa-stack fa-lg">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
							</span>
						</a></td>

					<td>
						<a href="JavaScript:void(0);">
						<?php if($collection[$i]->getAct()==1) { ?>
								<i class="fa fa-check-circle fa-2x" aria-hidden="true" onClick="pubContent(<?php echo "'".$slug."'";?>,0,<?php echo $collection[$i]->getId();?>)"></i>
							<?php } else { ?>
									<i class="fa fa-times-circle fa-2x" aria-hidden="true" onClick="pubContent(<?php echo "'".$slug."'";?>,1,<?php echo $collection[$i]->getId(); ?>)"></i>
							<?php } ?>
						</a>
					</td>
				</tr>

			<?php
			}
			?>

	</table>
</div>
