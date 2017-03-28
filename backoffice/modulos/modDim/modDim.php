<!--
	Top Right / areaDetalhe
-->
<?php
	$slug=  $_GET['area'];
	if (!isset($_GET['id']) || $_GET['id']=='') {
		$action ='new';
	} else {
		$action ='edit';

		$id=$conn->real_escape_string($_GET['id']);
		$detail= getDetailDim($conn, $id);
		$detailInfo = $detail->fetch_assoc();
	}
?>

<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=gerirdim"?>"><img src="assets/img/add.png" alt="Add"/></a>
		<p>Gerir DIM</p>
	</div>

	<!--Inputs/Form-->
	<form  method="post" action="modulos/modDim/subDim.php" id="formUtilizador">
		<input type="hidden" name="action" value="<?php echo $action; ?>"/> 
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>   
		

		<label>Nome</label>
		<input type="text" name="nomeUtilizador" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['name_dim_agent']):'' ?>">
		<br/>
		<label>Login</label>
		<input type="text" name="loginUtilizador" value="<?php echo ($action=='edit')? utf8_encode($detailInfo['login_dim_agent']):'' ?>">
		<br/>
		<label>Password</label>
		<input type="text" name="passUtilizador">
		<br/>
		

		<!--Botões-->
		<label>Publicar</label>
		<input type="checkbox" name="publish"  <?php echo ($action=='edit' && $detailInfo['act_dim_agent']==1 )? 'checked':'' ?>>
		<br/>

		<input type="submit" name="save" class="btnSave" value="Gravar">
		<input type="button" name="delete" class="btnDelete" value="Apagar" onclick="deleteDim(<?php echo "'".$slug."'";?>, <?php echo $detailInfo['id_dim_agent'];?>)">
	</form>
</div>


<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
		$resAllUser=getAllDim($conn);
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Nome</th>
				<th>Login</th>
				<th class="tableSubHeaderImg">Tempos</th>
				<th class="tableSubHeaderImg">Apagar</th>
				<th class="tableSubHeaderImg">Editar</th>
				<th class="tableSubHeaderImg">Publicar</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=0;
				while ($rowAllUser= $resAllUser->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
			?>
				<tr class="<?php echo $class; ?>">
					<td ><a href="home.php?area=gerirdim&id=<?php echo $rowAllUser['id_dim_agent']; ?>"><?php echo utf8_encode($rowAllUser['name_dim_agent']); ?></a></td>
					<td><?php echo  utf8_encode($rowAllUser['login_dim_agent']);?></td>
					<td class="tableSubHeaderImg"><a href="home.php?area=verTemposDim&id=<?php echo $rowAllUser['id_dim_agent']; ?>"><img src="assets/img/view_ico.png" alt="Ver"></a></td>
					<td class="tableSubHeaderImg"><a href="#"><img src="assets/img/delete_ico.png" alt="Apagar" onclick="deleteDim(<?php echo "'".$slug."'";?>, <?php echo $rowAllUser['id_dim_agent'];?>)"></a></td>
					<td class="tableSubHeaderImg"><a href="home.php?area=gerirdim&id=<?php echo $rowAllUser['id_dim_agent']; ?>"><img src="assets/img/edit_ico.png" alt="Editar"></a></td>
					<td class="tableSubHeaderImg"><a href="#">
						<?php if ($rowAllUser['act_dim_agent']==1) { ?>
							<img src="assets/img/publish_ico.png" alt="Publicar" onClick="pubDim(<?php echo "'".$slug."'";?>,0,<?php echo $rowAllUser['id_dim_agent']; ?>)">
						<?php } else { ?>
								<img src="assets/img/delete_ico.png" alt="Publicar" onClick="pubDim(<?php echo "'".$slug."'";?>,1,<?php echo $rowAllUser['id_dim_agent']; ?>)">
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