<!--
	Top Right / areaDetalhe
-->
<?php

	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
	} else {
		$action ='edit';

		$id=$_GET['id'];
		$detailInfo= getContentByIdBO($pdo, $id);
		//print_r($detailInfo);
		$detail=$detailInfo[0];		//$detailInfo = $detail->fetch_assoc();
	}

	if (isset($_GET['idCat']) || $_GET['idCat'] !='') {
		$idCat =$_GET['idCat'];

		$catContents=getContentCategoriesById($pdo, $idCat);
	}
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo BASE_URL."/backoffice/home.php?area=newcontent&idCat=".$idCat ?>"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i></a>
		<p>Gerir conteúdo da página "<?php echo $catContents[0]->getTitle(); ?>"</p>
	</div>

	<!-- Image preview -->
	<?php
		if ($action=='edit') { ?>
			<div class="mainPreview">
				<?php
					if( $detail->getUrlImg() ){
				?>
						<p class="titlePreview">Imagem</p>
						<div class="preview">
							<a target="_blank" href="<?php echo BASE_URL.MEDIA_IMAGES.$detail->getUrlImg() ?>"><img src="<?php echo BASE_URL.MEDIA_IMAGES.$detail->getUrlImg() ?>"  alt="Imagem"/></a>
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

	<!--Inputs/Form-->
	<form method="post" action="../components/content/views/admin/submit.content.php" class="formCont" enctype="multipart/form-data">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/>
		<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/>
		<input type="hidden" name="id_cat" value="<?php echo $idCat ?>"/>
		<!-- <input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/> -->

		<label>Título</label>
		<input type="text" name="titleContent" value="<?php echo ($action=='edit')? ($detail->getTitle()) : '' ; ?>">
		<br/>

		<label>Intro</label>
		<input type="text" name="introContent" value="<?php echo ($action=='edit')? ($detail->getIntro()) : '' ; ?>" >
		<br/>

		<label>Imagem</label>
		<input type="file" name="imageContent" >
		<br/>

		<label>Link</label>
		<input type="text" name="link1" value="<?php echo ($action=='edit')? ($detail->getLink1()) : '' ; ?>" >
		<br/>

		<label>Ordem</label>
		<input type="number" name="orderContent" value="<?php echo ($action=='edit')? ($detail->getOrder()) : '' ; ?>" required>
		<br/>

		<?php
			if ($idCat==1) {
		?>
				<label>Data Publicação</label>
				<input type="datetime-local" name="dateContent" value="<?php echo ($action=='edit')? ( date('Y-m-d\TH:i:s',strtotime($detail->getTs()))) : '' ; ?>">
				<br/>
		<?php
			}
		?>

		<label>Texto</label>
		<textarea name="textContent" id="editor"><?php echo ($action=='edit')? ($detail->getText()) : '' ; ?></textarea>
		<br/>


		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="actContent" <?php echo ($action=='edit' && $detail->getAct()==1 )? 'checked':'' ?> >
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


		$collection = getContentByCategoryIdBO($pdo,$idCat );


	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Titulo</th>
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
					<td><a href="home.php?area=newcontent&idCat=<?php echo $idCat ?>&id=<?php echo $collection[$i]->getId(); ?>"><?php echo ($collection[$i]->getTitle() ); ?></a></td>
					<td><?php echo ($collection[$i]->getIntro()); ?></td>
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
					<td><a href="home.php?area=newcontent&idCat=<?php echo $idCat ?>&id=<?php echo $collection[$i]->getId(); ?>">
							<span class="fa-stack fa-lg">
							  <i class="fa fa-circle fa-stack-2x"></i>
							  <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
							</span>
						</a></td>
					<td>
						<a href="JavaScript:void(0);">
						<?php if($collection[$i]->getAct()==1) { ?>
									<i class="fa fa-check-circle fa-2x" aria-hidden="true" onClick="unpubContent(<?php echo $collection[$i]->getId();?>)"></i>

							<?php } else { ?>
									<i class="fa fa-times-circle fa-2x" aria-hidden="true" onClick="pubContent(<?php echo $collection[$i]->getId(); ?>)"></i>

							<?php } ?>
						</a>
					</td>
				</tr>

			<?php
			}
			?>

	</table>
</div>
