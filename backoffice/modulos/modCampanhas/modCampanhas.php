<!--
	Top Right / areaDetalhe
-->


<!--*************************CAMPAIGNS TABLE*************************-->

<?php
	$slug=$conn->real_escape_string($_GET['area']);

	//GET ID FROM SLUG 
	$idS = getIdFromSlugCampaign($conn, $slug);
	$idCamp= $idS->fetch_assoc();

	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailProductCampagn($conn, $id);
	 	$detailInfo = $detail->fetch_assoc();
	 }

?>

<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		
		<p>Gerir Campanhas <?php echo $idCamp['name_campaign']; ?> </p>
	</div>

	<div>
		<!--Inputs/Form-->
		<form method="post" action="modulos/modCampanhas/subCampanhas.php" class="formCamp" >
			
			<input type="hidden" name="id_camp" value="<?php echo $idCamp['id_campaign']; ?>"/> 
			<input type="hidden" name="slugCamp" value="<?php echo $_GET['area'] ?>"/>  

			<label>Nome</label>
			<input type="text" name="nomeCampanha" value="<?php echo $idCamp['name_campaign']; ?>">
			<br/>
			<label>Condições da campanha</label>
			<input type="text" name="condCampanha" value="<?php echo $idCamp['condicoes_campaign']; ?>" >
			<br/>
			<label>Stock e Faturação</label>
			<input type="text" name="stockCampanha" value="<?php echo $idCamp['stock_fact_campaign']; ?>" >
			<br/>
			<label>Encomenda mínima</label>
			<input type="text" name="encomendaCampanha" value="<?php echo $idCamp['enc_min_campaign']; ?>">
			<br/>
			  

			<!--Botões-->
			<!-- 
			<label>Publicar</label>
			<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_campaign']==1 )? 'checked':'' ?>>
			<br/> -->

			<input type="submit" name="save" class="btnSave" value="Gravar">
			
		</form>
	</div>

<!--*************************PRODUCTS CAMPAIGN TABLE*************************-->

	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$slug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir Produtos Relacionados &rarr; Campanhas <?php echo $idCamp['name_campaign']; ?> </p>
	</div>

	<div>
		<!--Inputs/Form-->
		<form method="post" action="modulos/modCampanhas/subProdCampanhas.php" class="formProdCamp" >
			
			<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
			<input type="hidden" name="id_camp" value="<?php echo $idCamp['id_campaign'] ?>"/>
			<input type="hidden" name="slugCont" value="<?php echo $_GET['area'] ?>"/>
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>   

			<label>Nº Registo</label>
			<input type="text" name="nRegisto" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['n_reg_product_campaign']):'' ?>">
			<br/>
			<label>Nome medicamento</label>
			<input type="text" name="nomeMedic" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['name_product_campaign']):'' ?>" >
			<br/>
			<label>Dosagem</label>
			<input type="text" name="dosagem" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['dosage_product_campaign']):'' ?>" >
			<br/>
			<label>Apresentação</label>
			<input type="text" name="apresentacao" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['presentation_product_campaign']):'' ?>">
			<br/>
			<label>Comparticipação</label>
			<input type="text" name="comparticipacao" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['compart_product_campaign']):'' ?>">
			<br/>
			<label>IVA</label>
			<input type="text" name="iva" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['iva_product_campaign']):'' ?>">
			<br/>
			<label>PVF</label>
			<input type="text" name="pvf" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['pvf_product_campaign']):'' ?>">
			<br/>
			<label>PVP praticado</label>
			<input type="text" name="pvp" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['pvp_product_campaign']):'' ?>">
			<br/>
			<label>Bonificação 1</label>
			<input type="text" name="bonif1" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['bonif1_product_campaign']):'' ?>">
			<br/>
			<label>Bonificação 2</label>
			<input type="text" name="bonif2" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['bonif2_product_campaign']):'' ?>">
			<br/>  
			<label>Bonificação 3</label>
			<input type="text" name="bonif3" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['bonif3_product_campaign']):'' ?>">
			<br/>
			<label>Observação</label>
			<input type="text" name="observ" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['obs_product_campaign']):'' ?>">
			<br/>

			<!--Botões-->
			<label>Publicar</label>
			<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_product_campaign']==1 )? 'checked':'' ?>>
			<br/>

			<input type="submit" name="save" class="btnSave" value="Gravar">
			<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteProdCampanhas(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product_campaign'];?>)">
			
		</form>
	</div>
	
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resPC=getAllProductCampagn($conn, $idCamp['id_campaign']);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nº do Registo</th>
				<th>Nome do Medicamento</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllProdCamp= $resPC->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
					
				?>

					<tr class="<?php echo $class; ?>">
						
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllProdCamp['id_product_campaign']; ?>"><?php echo utf8_encode($rowAllProdCamp['n_reg_product_campaign']); ?></a></td>
						<td><?php echo utf8_encode($rowAllProdCamp['name_product_campaign']); ?></td>
						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteProdCampanhas(<?php echo "'".$slug."'";?>, <?php echo $rowAllProdCamp['id_product_campaign'];?>)"></a></td>
						<td><a href="home.php?area=<?php echo $slug; ?>&id=<?php echo $rowAllProdCamp['id_product_campaign']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllProdCamp['act_product_campaign']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubProdCampanhas(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllProdCamp['id_product_campaign'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubProdCampanhas(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllProdCamp['id_product_campaign']; ?>)">
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