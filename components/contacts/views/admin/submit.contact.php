<?php

 	include('../../../../config.php');

	$morada = $_POST['address'];
	$email = $_POST['email'];
	$telefone = $_POST['telephone'];
	$fax = $_POST['fax'];
	$linkedin = $_POST['linkedin'];
	$apoioCliente = $_POST['apoioCliente'];
	$farmacovigilancia = $_POST['farmacovigilancia'];

	print_r($_POST);


	/* CRIAR OBJECTO */

	$contact=getContactById($pdo,1);
	

	$contact[0]->setAddress($morada);
	$contact[0]->setEmail ($email);
	$contact[0]->setTel ($telefone);
	$contact[0]->setFax ($fax);
	$contact[0]->setLink ($linkedin);
	$contact[0]->setText1 ($apoioCliente);
	$contact[0]->setText2 ($farmacovigilancia);


	
	$contact[0]->update($pdo); 
?>