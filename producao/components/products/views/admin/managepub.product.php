<?php
	include('../../../../config.php');
	$p=getProductById($pdo, $_GET['id']);
	$act=$_GET['pub'];

	$p[0]->setAct($act);
	//print_r($p);

	$p[0]->update($pdo);


	header('Location:'.BASE_URL_BACKOFFICE.'//home.php?area=newproduct&idCat='.$p[0]->getCategory());
?>