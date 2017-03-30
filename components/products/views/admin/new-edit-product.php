<!--
	Top Right / areaDetalhe
-->
<?php

	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
		$id='';
	} else {
		$action ='edit';
		$id=$_GET['id'];


		//$id=$conn->real_escape_string($_GET['id']);
		$detailInfo= getContentById($pdo, $id);
		$detail=$detailInfo[0];		//$detailInfo = $detail->fetch_assoc();
	}
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=newcontent>" ?>" <img src='assets/img/add.png' alt='Add'/></a>
		<p>Gerir Produtos </p>
	</div>

	<!--Inputs/Form-->
	<form method="post" action="../components/products/views/admin/submit.product.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<input type="hidden" name="id_item" value="<?php echo $id; ?>"/>

		<label>Título</label>
		<input type="text" name="title" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getTitle()) : '' ; ?>">
		<br/>

		<label>Imagem de Topo</label>
		<input type="file" name="topo" >
		<br/>

		<label>Logo</label>
		<input type="file" name="logo" >
		<br/>

		<label>Intro</label>
		<input type="text" name="intro" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getPretext1()) : '' ; ?>">
		<br/>

		<label>Texto Longo</label>
		<textarea name="text" ><?php echo ($action=='edit')? utf8_encode($detail[0]->getText()) : '' ; ?></textarea>
		<br/>

		<label>PDF</label>
		<input type="file" name="pdf" >
		<br/>

		<label>Video</label>
		<input type="file" name="video" >
		<br/>

		<label>URL</label>
		<input type="text" name="link1" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getLink1()) : '' ; ?>">
		<br/>

		<label>FB</label>
		<input type="text" name="link2" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getLink2()) : '' ; ?>">
		<br/>

		<?php
			$catContents=getAllContentCategories($pdo);

		?>
		<label>Categoria</label>
		<select name="category">
			<option selected disabled>Escolha uma Categoria...</option>
			<?php
				for ($i=0;$i<count($catContents);$i++){ ?>

					<option value="<?php echo $catContents[$i]->getId(); ?>"><?php  echo $catContents[$i]->getTitle(); ?></option>

				<?php } ?>

			?>
		</select>
		<br/>

		<label>Ordem</label>
		<input type="text" name="order" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getOrder()) : '' ; ?>">
		<br/>

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="act" <?php echo ($action=='edit' && $detail[0]->getAct()==1 )? 'checked':'' ?> >
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteContent(<?php echo $id ?>)" >
	</form>
</div>




<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	//$resPC=getAllContents($conn, $idCat['id_content_category']);


		$collection = getAllContents($pdo);


	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Titulo</th>
				<th>Texto 1</th>
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
					<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $collection[$i]->getId(); ?>"><?php echo utf8_encode($collection[$i]->getTitle() ); ?></a></td>
					<td><?php echo utf8_encode($collection[$i]->getPretext1()); ?></td>
					<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteContent(<?php echo "'".$slug."'";?>, <?php echo $collection[$i]->getId();?>)"></a></td>
					<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $collection[$i]->getId(); ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>

					<td>
						<a href="JavaScript:void(0);">
						<?php if($collection[$i]->getAct()==1) { ?>
								<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubContent(<?php echo "'".$slug."'";?>,0,<?php echo $collection[$i]->getId();?>)">
							<?php } else { ?>
									<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubContent(<?php echo "'".$slug."'";?>,1,<?php echo $collection[$i]->getId(); ?>)">
							<?php } ?>
						</a>
					</td>
				</tr>

			<?php
			}
			?>

	</table>
</div>
