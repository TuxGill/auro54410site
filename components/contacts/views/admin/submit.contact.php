<?php
	$morada = $_POST['address'];
	$email = $_POST['email'];
	$telefone = $_POST['telephone'];
	$fax = $_POST['fax'];
	$linkedin = $_POST['linkedin'];
	$apoioCliente = $_POST['apoioCliente'];
	$farmacovigilancia = $_POST['farmacovigilancia'];

	print_r($_POST);


	/* CRIAR OBJECTO */

	$contact=getContactById($pdo,$id);
	

	$contact[0]->setMorada($morada);
	$contact[0]->setEmail ($email);
	$contact[0]->setTelefone ($telefone);
	$contact[0]->setFax ($fax);
	$contact[0]->setLinkedin ($linkedin);
	$contact[0]->setApoiocliente ($apoioCliente);
	$contact[0]->setFarmacovigilancia ($farmacovigilancia);


	
	$contact[0]->update($pdo); 
?>