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
		$detail= getProductById($pdo, $id);
	//	print_r($detail);
		//$detail=$detailInfo[0];		//$detailInfo = $detail->fetch_assoc();
	}
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo BASE_URL."/backoffice/home.php?area=newproduct" ?>"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
		<p>Gerir Produtos </p>
	</div>

	<!-- Image preview -->
		<?php if ($action=='edit') { ?>
			<div class="mainPreview">
				<?php
				if( $detail[0]->getUrlImg() ){
				?>
					<p class="titlePreview">Imagem</p>
					<div class="preview">
						<a target="_blank" href="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getUrlImg() ?>"><img src="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getUrlImg() ?>"  alt="Imagem"/></a>
					</div>
					<br/>
				<?php
				}
				?>
			</div>
		<?php
	} ?>
	<!-- End Image preview -->


	<!--Inputs/Form-->
	<form method="post" action="../components/products/views/admin/submit.product.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<input type="hidden" name="id_item" value="<?php echo $id; ?>"/>
		<input type="hidden" name="category" value="<?php echo $_GET['idCat'] ?>"/>

		<label>Título</label>
		<input type="text" name="title" value="<?php echo ($action=='edit')? $detail[0]->getTitle() : '' ; ?>">
		<br/>


		<label>Cor</label>
		<input type="text" name="color" value="<?php echo ($action=='edit')? $detail[0]->getColor() : '' ; ?>">
		<br/>



		<label>Imagem</label>
		<input type="file" name="topo" >
		<br/>

		<label>Logo</label>
		<input type="file" name="logo" >
		<?php if ($action=='edit') { ?>
			<div class="mainPreview">
				<?php
				if( $detail[0]->getLogo() ){
				?>
					<p class="titlePreview"><?php echo $detail[0]->getLogo(); ?></p>
					<div class="preview logoProduto">
						<a target="_blank" href="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getLogo() ?>"><img src="<?php echo BASE_URL.MEDIA_IMAGES.$detail[0]->getLogo() ?>"  alt="Imagem"/></a>
					</div>
					<br/>
				<?php
				}
				?>
			</div>
		<?php
	} ?>
		<br/>

		<label>Intro</label>
		<input type="text" name="intro" value="<?php echo ($action=='edit')? $detail[0]->getIntro() : '' ; ?>">
		<br/>

		<label>PDF</label>
		<input type="file" name="pdf" >
		<?php if ($action=='edit') { ?>
			<div class="mainPreview">
				<?php
				if( $detail[0]->getPdf() ){
				?>
					<p class="titlePreview">PDF</p>
					<div class="preview">
						<a target="_blank" href="<?php echo BASE_URL.MEDIA_PDF.$detail[0]->getPdf() ?>"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i></a>
					</div>
					<br/>
				<?php
				}
				?>
			</div>
		<?php
	} ?>
		<br/>

		<label>Video</label>
		<input type="file" name="video" >
		<?php if ($action=='edit') { ?>
			<div class="mainPreview">
				<?php
				if( $detail[0]->getVideo() ){
				?>
					<p class="titlePreview">Video</p>
					<div class="preview">
						<video controls width="200">
							<source src="<?php echo BASE_URL.MEDIA_VIDEOS.$detail[0]->getVideo();?>" type="video/mp4"/>
						</video>
					</div>
					<br/>
				<?php
				}
				?>
			</div>
		<?php
	} ?>
		<br/>

		<label>URL</label>
		<input type="text" name="link1" value="<?php echo ($action=='edit')? $detail[0]->getLink1() : '' ; ?>">
		<br/>

		<label>FB</label>
		<input type="text" name="link2" value="<?php echo ($action=='edit')? $detail[0]->getLink2() : '' ; ?>">
		<br/>

		<?php
			$catContents=getAllProductCategories($pdo);

		?>

		</select>
		<br/>

		<label>Ordem</label>
		<input type="text" name="order" value="<?php echo ($action=='edit')? utf8_encode($detail[0]->getOrder()) : '' ; ?>">
		<br/>

		<label>Texto Longo</label>
		<textarea name="text" id="editor"><?php echo ($action=='edit')? $detail[0]->getText() : '' ; ?></textarea>
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


		$collection = getProductByCategoryId($pdo,$_GET['idCat']);


	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome Produto</th>
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

					<td><a href="home.php?area=newproduct&idCat=<?php echo $_GET['idCat'] ?>&id=<?php echo $collection[$i]->getId(); ?>"><?php echo utf8_encode($collection[$i]->getTitle() ); ?></a></td>
					<td><?php echo $collection[$i]->getIntro() ?></td>
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

					<td><a href="JavaScript:void(0);"><i class="fa fa-times-circle fa-2x" aria-hidden="true" onclick="deleteProduct(<?php echo $collection[$i]->getId();?>)"></i></a></td>
					<td><a href="home.php?area=newproduct&idCat=<?php echo $_GET['idCat'] ?>&id=<?php echo $collection[$i]->getId(); ?>">


							<span class="fa-stack fa-lg">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
							</span>
						</a></td>
					<td>

						<a href="JavaScript:void(0);">

						<?php if($collection[$i]->getAct()==1) { ?>
								<i class="fa fa-check-circle fa-2x" aria-hidden="true" onClick="unpubProduct(<?php echo $collection[$i]->getId(); ?>,0)"></i>
							<?php } else { ?>
									<i class="fa fa-times-circle fa-2x" aria-hidden="true" onClick="pubProduct(<?php echo $collection[$i]->getId(); ?>,1)"></i>
							<?php } ?>
						</a>
					</td>
				</tr>

			<?php
			}
			?>

	</table>
</div>
