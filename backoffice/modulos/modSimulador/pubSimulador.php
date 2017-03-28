<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);
	$action=$conn->real_escape_string($_GET['action']);

	$sql="update products_simulator set act_product_simulator=".$action." where id_product_simulator=".$id;

	$conn->query($sql);

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area);
?>