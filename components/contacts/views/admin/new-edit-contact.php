<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		
		<p>Contactos</p>
	</div>

	<form method="post" class="formContact" action="../components/contacts/views/admin/submit.contact.php">

		<label>Morada</label>
		<textarea name="address" required></textarea>
		<br/>

		<label>Email</label>
		<textarea name="email" required></textarea>
		<br/>

		<label>Telefone</label>
		<textarea name="telephone" required></textarea>
		<br/>


		<label>Fax</label>
		<textarea name="fax" required></textarea>
		<br/>

		<label>Linkedin</label>
		<textarea name="linkedin" required></textarea>
		<br/>

		<label>Apoio ao Cliente</label>
		<textarea name="apoioCliente" required></textarea>
		<br/>

		<label>Farmacovigilância</label>
		<textarea name="farmacovigilancia" required></textarea>
		<br/>

		<input type="submit" name="send" class="btn" value="Enviar">
	</form>


