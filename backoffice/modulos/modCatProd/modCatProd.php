<!--
	Top Right / areaDetalhe
-->
<?php
	$slug=$conn->real_escape_string($_GET['area']);;

	//GET ID FROM SLUG 
	$idS = getIdFromSlugProductCategories($conn, $slug);
	$idCat= $idS->fetch_assoc();

	//GET SLUG FROM ID - USED TO GET NAME OF MAIN CATEGORIES LIKE DECOMED/GENEDEC...
	if(!empty($idCat['fk_id_product_category'])){
		$mainSlug= getSlugFromIdProductCategories($conn, $idCat['fk_id_product_category']);
		$slugMainCategory=$mainSlug->fetch_assoc();
	}
	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
	} else {
		$action ='edit';

		$id=$conn->real_escape_string($_GET['id']);
		$detail= getDetailProductCategories($conn, $id);
		$detailInfo = $detail->fetch_assoc();
	}
?>

<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir Categorias de <?php echo utf8_encode($idCat['title_product_category']." ".$slugMainCategory['title_product_category']) ?></p>
	</div>

	<!--Inputs/Form-->
	<?php
		//$resCat=getAllCategorias($conn);
	?>

	<form method="post" action="modulos/modCatProd/subCatProd.php" class="formCatProdutos">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>  
		<input type="hidden" name="slugCat" value="<?php echo $_GET['area'] ?>"/>  

		<label>Nome</label>
		<input type="text" name="nomeCat" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['title_product_category']):'' ?>">
		<br/>
		<label>Descrição</label>
		<input type="text" name="desCat" value="<?php echo ($action=='edit' )? utf8_encode($detailInfo['desc_product_category']):'' ?>">
		<br/>
		<label>Ordem</label>
		<input type="text" name="ordemCat" value="<?php echo ($action=='edit' )? $detailInfo['order_product_category']:'' ?>">
		<br/>
		

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_product_category']==1 )? 'checked':'' ?>>
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteCategoriasProdutos(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product_category'];?>)">
	</form>
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resPC=getAllCategories($conn, $idCat['id_product_category']);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome da Categoria</th>
				<th>Descrição Categoria</th>
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
						
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_product_category']; ?>"><?php echo utf8_encode($rowAllCat['title_product_category']); ?></a></td>
						<td><?php echo utf8_encode($rowAllCat['desc_product_category']); ?></td>
						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteCategoriasProdutos(<?php echo "'".$slug."'";?>, <?php echo $rowAllCat['id_product_category'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_product_category']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllCat['act_product_category']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubCategoriasProdutos(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllCat['id_product_category'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubCategoriasProdutos(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllCat['id_product_category']; ?>)">
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