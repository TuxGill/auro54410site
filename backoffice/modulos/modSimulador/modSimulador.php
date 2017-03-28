<?php
ini_set( "display_errors", 0);
	//DEFINE IF USERS ARE EDITING OR CREATING NEW CATEGORY
	if (!isset($_GET['id']) || $_GET['id']=='') {
	 	$action ='new';
	} else {
	 	$action ='edit';

	 	$id=$conn->real_escape_string($_GET['id']);
	 	$detail= getDetailProductSimulator($conn, $id);
	 	$detailInfo = $detail->fetch_assoc();
	 }

	$areaSlug = $_GET['area'];
	list($slug, $x) = explode('_', $areaSlug);
	

	//GET ID FROM SLUG 
	$idS = getIdFromSlugSimulator($conn, $slug);
	$idSim= $idS->fetch_assoc();
?>
<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=".$areaSlug ?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir Simulador <?php echo $idSim['title_product_category']; ?></p>
	</div>

	<div>
		<!--Inputs/Form-->
		<form method="post" action="modulos/modSimulador/subSimulador.php" class="formSim" >
			<input type="hidden" name="id_item" value="<?php echo $_GET['id'] ?>"/> 
			<input type="hidden" name="id_cat" value="<?php echo $idSim['id_product_category']; ?>"/>
			<input type="hidden" name="slugCamp" value="<?php echo $_GET['area'] ?>"/>
			<input type="hidden" name="action" value="<?php echo $action; ?>"/>

			<label>Nome Produto <?php echo $idSim['title_product_category']; ?></label>
			<input type="text" name="nomeDecom" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['name_decomed_product_simulator']):'' ?>">
			<br/>
			<label>PVP Produto <?php echo $idSim['title_product_category']; ?></label>
			<input type="text" name="pvpDecom" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['pvp_decomed_product_simulator']):'' ?>" >
			<br/>
			<label>Valor Utente - Produto <?php echo $idSim['title_product_category']; ?></label>
			<input type="text" name="utentDecom" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['utent_decomed_product_simulator']):'' ?>" >
			<br/>
			<label>Ganho Farmácia - Produto <?php echo $idSim['title_product_category']; ?></label>
			<input type="text" name="gainFarmaDecom" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['gain_pharm_decomed_product_simulator']):'' ?>">
			<br/>
			<label>Comparticipação - Produto <?php echo $idSim['title_product_category']; ?></label>
			<input type="text" name="compartDecom" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['compart_decomed_product_simulator']):'' ?>">
			<br/>

			<label>Nome Produto Concorrente</label>
			<input type="text" name="nomeConc" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['name_decomed_competition_product_simulator']):'' ?>">
			<br/>
			<label>PVP Produto Concorrente</label>
			<input type="text" name="pvpConc" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['pvp_decomed_competition_product_simulator']):'' ?>" >
			<br/>
			<label>Valor Utente - Produto Concorrente</label>
			<input type="text" name="utentConc" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['utent_decomed_competition_product_simulator']):'' ?>" >
			<br/>
			<label>Ganho Farmácia - Produto Concorrente</label>
			<input type="text" name="gainFarmaConc" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['gain_pharm_decomed_competition_product_simulator']):'' ?>">
			<br/>
			<label>Comparticipação - Produto Concorrente</label>
			<input type="text" name="compartConc" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['compart_decomed_competition_product_simulator']):'' ?>">
			<br/>

			<label>Percentagem de custo - paciente</label>
			<input type="text" name="percCusto" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['percent_cost_patient']):'' ?>">
			<br/>
			<label>Percentagem margem Farmácia</label>
			<input type="text" name="percFarm" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['percent_margin_pharm']):'' ?>">
			<br/>
			  

			<!--Botões-->
			<label>Publicar</label>
			<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_product_simulator']==1 )? 'checked':'' ?>>
			<br/>

			<input type="submit" name="save" class="btnSave" value="Gravar">
			<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteSimulador(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_product_simulator'];?>)">
			
		</form>
	</div>
</div>

<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
	$resPS=getAllProductSimulator($conn, $idSim['id_product_category']);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome Produto Decomed</th>
				<th>Nome Produto Concorrente</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicado</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllProdSim= $resPS->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
					
				?>

					<tr class="<?php echo $class; ?>">
						
						<td><a href="home.php?area=<?php echo $areaSlug; ?>&id=<?php echo $rowAllProdSim['id_product_simulator']; ?>"><?php echo utf8_encode($rowAllProdSim['name_decomed_product_simulator']); ?></a></td>

						<td><?php echo utf8_encode($rowAllProdSim['name_decomed_competition_product_simulator']); ?></td>
						
						<td><a href="JavaScript:void(0);"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteSimulador(<?php echo "'".$areaSlug."'";?>, <?php echo $rowAllProdSim['id_product_simulator'];?>)"></a></td>

						<td><a href="home.php?area=<?php echo $areaSlug; ?>&id=<?php echo $rowAllProdSim['id_product_simulator']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>

						<td>
							<a href="JavaScript:void(0);">
							<?php if($rowAllProdSim['act_product_simulator']==1) { ?>
									<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubSimulador(<?php echo "'".$areaSlug."'";?>,0,<?php echo $rowAllProdSim['id_product_simulator'];?>)">
								<?php } else { ?>
										<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubSimulador(<?php echo "'".$areaSlug."'";?>,1,<?php echo $rowAllProdSim['id_product_simulator']; ?>)">
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