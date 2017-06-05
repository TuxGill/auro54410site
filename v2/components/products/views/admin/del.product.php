<?php
	include('../../../../config.php');
	$p=getProductById($pdo, $_GET['id']);
	//print_r($p);

	$p[0]->delete($pdo);
	header('Location:'.BASE_URL_BACKOFFICE.'//home.php?area=newproduct&idCat='.$p[0]->getCategory());
?>