<!--
	Top Right / areaDetalhe
-->
<?php
	$slug=$conn->real_escape_string($_GET['area']);;

	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailProducts($conn, $id);
	 	$detailInfo = $detail->fetch_assoc();
	 }
?>


<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir </p>
	</div>

	<!--Inputs/Form-->
	
<?php 
	if ($action=='new') {
		include('modulos/modFichaProdutos/modFichaProdutosNew.php');		
	} elseif ($action=='edit') {
		include('modulos/modFichaProdutos/modFichaProdutosEdit.php');
	}
?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome do Produto</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if ($slug == 'farma') {
					$resP=getAllProductsF($conn);
				} elseif ($slug == 'prod_eticos') {
					$resP=getAllProductsPE($conn);
				}

				$i=0;
				while ($rowAllCat= $resP->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
				?>

					<tr class="<?php echo $class; ?>">
						<?php
						
							$nomeCatPai1=getCategoryFromID($conn,$rowAllCat['fk_id_product_category']);
							while ($res=$nomeCatPai1->fetch_assoc()) { ?>
								<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_product']; ?>"><?php echo utf8_encode($res['title_product_category'])." -> ".utf8_encode($rowAllCat['title_product']); ?></a></td>
							<?php
							}
							
						?>						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteProdutos(<?php echo "'".$slug."'";?>, <?php echo $rowAllCat['id_product'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllCat['id_product']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllCat['act_product']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubProdutos(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllCat['id_product'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubProdutos(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllCat['id_product']; ?>)">
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