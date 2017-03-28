
<?php
	//include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);

	$dim = getDetailDim($conn, $id);

?>
<!--<div id="fichaDim">-->
<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topNameDim">
		<p>Registo de Tempos de 
			<b>
			<?php
			 while ($nDim= $dim->fetch_assoc() ) { 
			 	echo utf8_encode($nDim['name_dim_agent']);
			 }
			 ?>
			</b>
		</p>
	</div>
	<div class="topRightHeader">
		<p>Filtre o resultado</p>
	</div>
	<form method="post">
		<input type="hidden" name="id" value="<?php echo $id ?>">

		<!-- Para passar para input 
		<label>Data Inicial</label>
		<input type="text" name="dataInicial" id="calendarField3" />
		<br/>
		<label>Data Final</label>
		<input type="text" name="dataFinal" id="calendarField4" />-->
<!-- ________________________________________________________________________-->

		<label>Data Inicial</label>
		

		<select name="dataInicial">
			<option selected="selected" disabled>Escolha uma data...</option>
			<?php
				$inicio=getInicialDate($conn);

				while ($rowCat= $inicio->fetch_assoc() ) { 
					$resI = date('Y-m-d', strtotime($rowCat['indate_dim_agent_shows_content']));
					?>
					<option value="<?php echo utf8_encode($resI)?>"><?php echo utf8_encode($resI); ?></option>
			<?php	
				}
			 ?>
		</select>

		<!--<br/>
		<br/>

		<input type="text" name="dataInicial" id="calendarField3" />-->
		
		<br/>
		<br/>

		<label>Data Final</label>
		<select name="dataFinal">
			<option selected="selected" disabled>Escolha uma data...</option>
			<?php
				$fim=getFinalDate($conn);

				while ($rowF= $fim->fetch_assoc() ) { 
					$resF = date('Y-m-d', strtotime($rowF['outdate_dim_agent_shows_content']));
					?>
					<option value="<?php echo utf8_encode($resF)?>"><?php echo utf8_encode($resF); ?></option>
			<?php	
				}
			 ?>
		</select>
		<br/>
		<br/>

		<input type="button" value="Ok" onClick="actualizaTempos();" class="btnOk">

	
	</form>

	
</div>

<div class="bottomRight" id="areaLista">
	<p class="titleDim">Tempos das Páginas de Conteúdo</p>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStatic">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Paginas</th>
				<th>Tempo Inicial</th>
				<th>Tempo Final</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$date = date('Y-m-d' , strtotime( '-1 days' ));
			$inicio= $date." 00:00:00";
			$fim= $date." 23:59:59";

			$tempoPagConteudo=getTemposDimPaginaConteudo($conn, $id, $inicio, $fim);
			$nrows=$tempoPagConteudo->num_rows;

			
			?>
			<?php
				$i=0;
				while ($rowAllUser= $tempoPagConteudo->fetch_assoc()) {
					if(($i%2) != 0){
						$class="impar";
					} else {
						$class="par";
					}
			?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo utf8_encode($rowAllUser['title_content']); ?></a></td>
					<td><?php echo utf8_encode($rowAllUser['indate_dim_agent_shows_content']);?></td>
					<td><?php echo utf8_encode($rowAllUser['outdate_dim_agent_shows_content']);?></td>
				</tr>
			<?php	
				$i++;
				}
			
			?>
	
		</tbody>
	</table>

	

	<br/>
	<br/>
	<br/>
	<br/>

	<p class="titleDim">Tempos dos Produtos</p>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="tbStaticExp">
		<thead>
			<tr class="tableSubHeaderGeneral">
				<th>Produtos</th>
				<th>Tempo Inicial</th>
				<th>Tempo Final</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$i=0;
			$tempoProdutos=getTemposDimProdutos($conn, $id, $inicio, $fim);
			$nrowsP=$tempoProdutos->num_rows;
			while ($rowAllUser= $tempoProdutos->fetch_assoc()) {
				if(($i%2) != 0){
					$class="impar";
				} else {
					$class="par";
				}
			?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo utf8_encode($rowAllUser['title_product']); ?></a></td>
					<td><?php echo  utf8_encode($rowAllUser['indate_dim_agent_shows_products']);?></td>
					<td><?php echo  utf8_encode($rowAllUser['outdate_dim_agent_shows_products']);?></td>
				</tr>
			<?php	
			$i++;
			}
			?>
		</tbody>
	</table>
	<br/>
	<br/>
	<br/>
	<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=gerirdim"?>" class="btnVoltar"><img src="assets/img/arrowLeftDark.png">&nbsp;voltar</a>
</div>
<!--</div>-->