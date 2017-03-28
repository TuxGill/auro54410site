
<script type="text/javascript">
	$(document).ready(function(){
		$('#tbStatic').dataTable( {
				"aaSorting": [[ 2, "asc" ]],
				"sPaginationType": "full_numbers"
				
			} );

		$('#tbStaticExp').dataTable( {
				"aaSorting": [[ 2, "asc" ]],
				"sPaginationType": "full_numbers"
				
			} );
	});
</script>

<?php
	include('../../config.php');
?>


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
			$inicio=$_POST['dInit']." 00:00:00";
			$fim=$_POST['dFinal']." 23:59:59";
			$id=$_POST['Uid'];

			$tempoPagConteudo1=getTemposDimPaginaConteudo($conn, $id, $inicio, $fim);
			$nrows=$tempoPagConteudo1->num_rows;
			
			$i=0;
			while ($rowAllUser1= $tempoPagConteudo1->fetch_assoc()) {
				if(($i%2) != 0){
					$class="impar";
				} else {
					$class="par";
				}
			?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo utf8_encode($rowAllUser1['title_content']); ?></a></td>
					<td><?php echo utf8_encode($rowAllUser1['indate_dim_agent_shows_content']);?></td>
					<td><?php echo utf8_encode($rowAllUser1['outdate_dim_agent_shows_content']);?></td>
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
				$tempoProdutos=getTemposDimProdutos($conn, $id, $inicio, $fim);
				$nrowsP=$tempoProdutos->num_rows;
				$i=0;
				
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
			<!-- Botão para Exportar tempos das paginas para CSV -->
	<form method="post" action="modulos/modDim/exportCsv.php">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<input type="hidden" name="inicio" value="<?php echo $inicio ?>">
		<input type="hidden" name="fim" value="<?php echo $fim ?>">
		<input class="exportTmp" type="submit" name="btn" value="Exportar Todos os Tempos">
	</form>
	<!--FIM Botão para  Exportar tempos das paginas para CSV -->

	<br/>
	<br/>
	<a href="<?php echo LIVE_SITE_ADMIN."/home.php?area=gerirdim"?>" class="btnVoltar"><img src="assets/img/arrowLeftDark.png">&nbsp;voltar</a>