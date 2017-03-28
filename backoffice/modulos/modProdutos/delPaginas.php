<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$idProd = $conn->real_escape_string($_GET['idp']);
	$area = $conn->real_escape_string($_GET['area']);
	$sql="update product_pages set del_product_page=1 where id_product_page=".$id;

	$conn->query($sql);

	//echo "idp: ".$idProd;

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area.'&id='.$idProd);
?>