<!--
	Top Right / areaDetalhe
-->
<div class="topRight" id="areaDetalhe" style="background-color:white">
	<div class="homeBtns">
		<a href="home.php?area=noticias">
			<div class="homeBtnAreas">
				<img src="assets/img/noticiasBtn.png" alt="Notícias">
				<p>Notícias</p>
			</div>
		</a>

		<a href="home.php?area=noticias">
			<div class="homeBtnAreas">
				<img src="assets/img/noticiasBtn.png" alt="Notícias">
				<p>Produtos</p>
			</div>
		</a>

		<a href="home.php?area=noticias">
			<div class="homeBtnAreas">
				<img src="assets/img/noticiasBtn.png" alt="Notícias">
				<p>Categorias Produtos</p>
			</div>
		</a>

	</div>
</div>



<!--
	Bottom Right / areaLista
-->
<div class="bottomRight" id="areaLista">
	<?php
		$resPrd=getLastChangedPrd($conn);
		$resPag=getLastChangedPag($conn);
	 ?>
	<table>
		<tr class="tableHeaderGeneral">
			<th colspan="3">Alterações Recentes</th>
		</tr>

		<tr class="tableSubHeaderGeneral">
			<td>Produto/Página</td>
			<td>Data</td>
		</tr>

		<?php
			$i=0;
			while ($row = $resPrd->fetch_assoc() ){
				if(($i%2) != 0){
					$class="impar";
				} else {
					$class="par";
				}
			?>
			<tr class="<?php echo $class; ?>">
					<td><?php echo utf8_encode($row['title_product']); ?></td>
					<td><?php echo utf8_encode($row['entry_product']); ?></td>
			</tr>
			<?php
			$i++;
			}

			while ($rowPag = $resPag->fetch_assoc() ){
				if(($i%2) != 0){
					$class="impar";
				} else {
					$class="par";
				}
				?>
				<tr class="<?php echo $class; ?>">
					<td><?php echo utf8_encode($rowPag['title_content']); ?></td>
					<td><?php echo utf8_encode($rowPag['entry_content']); ?></td>
				</tr>
			<?php
			$i++;
			}

		?>

	</table>
</div>
