<!--
	Top Right / areaDetalhe
-->
<?php

	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
	} else {
		$action ='edit';

		//$id=$conn->real_escape_string($_GET['id']);
		$detailInfo= getContentById($pdo, $id);
		$detail=$detailInfo[0];		//$detailInfo = $detail->fetch_assoc();
	}
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=newcontent>" ?>" <img src='assets/img/add.png' alt='Add'/></a>
		<p>Gerir Artigos </p>
	</div>

	<!--Inputs/Form-->
	<form method="post" action="../modules/modContent/subContent.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<input type="hidden" name="id" value="<?php echo $idCat['id_category'] ?>"/>
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/>
		<input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/>

		<label>Título</label>
		<input type="text" name="titleContent" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getTitle()) : '' ; ?>" required>
		<br/>

		<label>Imagem de Cabeçalho</label>
		<input type="file" name="img_head" required>
		<br/>

		<label>Intro</label>
		<input type="text" name="textContent1" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getPretext1()) : '' ; ?>" required>
		<br/>

		<label>Texto Longo</label>
		<textarea name="longTextContent"  id="conteudo" required><?php echo ($action=='edit')? utf8_encode($detail[0]->getText()) : '' ; ?></textarea>
		<br/>

		<label>Video</label>
		<input type="file" name="video" >
		<br/>

		<label>URL</label>
		<input type="text" name="link1" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getLink1()) : '' ; ?>" required>
		<br/>

		<label>FB</label>
		<input type="text" name="link2" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getLink2()) : '' ; ?>" required>
		<br/>

		<?php
			$catContents=getAllContentCategories($pdo);

		?>
		<label>Categoria</label>
		<select name="linhaCaixa">
			<option selected disabled required>Escolha uma Categoria...</option>
			<?php
				for ($i=0;$i<count($catContents);$i++){ ?>

					<option value="<?php echo $catContents[$i]->getId(); ?>" required><?php  echo $catContents[$i]->getTitle(); ?></option>

				<?php } ?>

			?>
		</select>
		<br/>

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="actContent" <?php echo ($action=='edit' && $detail[0]->getAct()==1 )? 'checked':'' ?> >
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
