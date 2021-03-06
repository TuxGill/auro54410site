<!--
	Top Right / areaDetalhe
-->
<?php


$action ='new';

if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';


	 	$detailInfo= getContentCategoriesById($pdo, $_GET['id']);
		$detail=$detailInfo;


	 }
// .$slug

?>
<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo BASE_URL."/backoffice/home.php?area=editcontentcategory" ?>"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
		<p>Gerir Categorias de Conteúdo</p>
	</div>
	<?php

	if ($action=='edit') { ?>
		<div class="mainPreview">
			<?php
			if( $detail[0]->getUrlImg() ){
			?>
				<p class="titlePreview">Thumb</p>
				<div class="preview">
					<a target="_blank" href="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getUrlImg() ?>"><img src="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getUrlImg() ?>"  alt="Imagem"/></a>
				</div>
				<br/>
			<?php
			}
			?>
		</div>
	<?php
}

	$collection = getAllContentCategories($pdo);

	?>


	<!--Inputs/Form-->
	<form method="post" action="../components/content/views/admin/submit.contentCategory.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<!-- <input type="hidden" name="id" value="<?php echo $idCat['id_category'] ?>"/> -->
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/>
		<!-- <input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/> -->


		<br/>

		<label>Nome</label>
		<input type="text" name="titleContentCat" value="<?php echo ($action=='edit')? ($detail[0]->getTitle()) : '' ; ?>" required <?php echo ($action=='new')? 'disabled' : '' ; ?>>
		<br/>

		<label>Título</label>
		<input type="text" name="text1" value="<?php echo ($action=='edit')? ($detail[0]->getIntro()) : '' ; ?>" required <?php echo ($action=='new')? 'disabled' : '' ; ?>>
		<br/>

		<label>Imagem Topo</label>
		<input type="file" name="imgThumb" accept="image/png, image/jpeg"  <?php echo ($action=='new')? 'disabled' : '' ; ?>>
		<p class="caption">Formatos suportados: .png, .jpg</p>
		<br/>

		<label>Texto</label>
		<textarea name="longText" id="editor" required <?php echo ($action=='new')? 'disabled' : '' ; ?>><?php echo ($action=='edit')? ($detail[0]->getText()) : '' ; ?></textarea>
		<br/>

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="actContentCat" <?php echo ($action=='edit' && $detail[0]->getAct()==1 )? 'checked':'' ?>  <?php echo ($action=='new')? 'disabled' : '' ; ?>>
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar" <?php echo ($action=='new')? 'disabled' : '' ; ?>>
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContentCategory(<?php echo $id ?>)" <?php echo ($action=='new')? 'disabled' : '' ; ?>>
	</form>
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">

	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Título da Categoria</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				for ($i=0;$i<count($collection);$i++) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
				?>
					<tr class="<?php echo $class; ?>">
						<td><a href="home.php?area=contentcategory&id=<?php echo $collection[$i]->getId(); ?>"><?php echo ($collection[$i]->getTitle()); ?></a></td>

						<td><a href="JavaScript:void(0);"><i class="fa fa-times-circle fa-2x" aria-hidden="true" onclick="deleteContentCategory(<?php echo $collection[$i]->getId(); ?>)"></i></a></td>
						<td><a href="home.php?area=contentcategory&id=<?php echo $collection[$i]->getId(); ?>">
								<span class="fa-stack fa-lg">
								  <i class="fa fa-circle fa-stack-2x"></i>
								  <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
								</span>
							</a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($collection[$i]->getAct()==1){?>
									<i class="fa fa-check-circle fa-2x" aria-hidden="true" onClick="pubContentCategory(<?php echo "'".$slug."'";?>,0,<?php echo $collection[$i]->getId(); ?>)"></i>
								<?php } else { ?>
										<i class="fa fa-times-circle fa-2x" aria-hidden="true" onClick="pubContentCategory(<?php echo "'".$slug."'";?>,1,<?php echo $collection[$i]->getId(); ?>)"></i>
								<?php } ?>
							</a>
						</td>
					</tr>
			<?php
				}
			 ?>
		</tbody>
	</table>
</div>
