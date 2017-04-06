
<?php 
// echo "teste";
	$contact = getContactById($pdo,1);
// 	print_r($contact[0]);
?>
<div class="topRight" id="areaDetalhe">
	<!--Header-->
	<div class="topRightHeader">
		
		<p>Contactos</p>
	</div>

	<form method="post" class="formContact" action="../components/contacts/views/admin/submit.contact.php">

		<label>Morada</label>
		<textarea name="address" required><?php echo $contact[0]->getAddress(); ?></textarea>
		<br/>

		<label>Email</label>
		<textarea name="email" required><?php echo $contact[0]->getEmail(); ?></textarea>
		<br/>

		<label>Telefone</label>
		<textarea name="telephone" required><?php echo $contact[0]->getTel(); ?></textarea>
		<br/>


		<label>Fax</label>
		<textarea name="fax" required><?php echo $contact[0]->getFax(); ?></textarea>
		<br/>

		<label>Linkedin</label>
		<textarea name="linkedin" required><?php echo $contact[0]->getLink(); ?></textarea>
		<br/>

		<label>Apoio ao Cliente</label>
		<textarea name="apoioCliente" required><?php echo $contact[0]->getText1(); ?></textarea>
		<br/>

		<label>Farmacovigilância</label>
		<textarea name="farmacovigilancia" required><?php echo $contact[0]->getText2(); ?></textarea>
		<br/>

		<input type="submit" name="send" class="btn" value="Enviar">
	</form>


