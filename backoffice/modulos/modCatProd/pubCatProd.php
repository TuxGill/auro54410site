<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);
	$action=$conn->real_escape_string($_GET['action']);

	$sql="update product_categories set act_product_category=".$action." where id_product_category=".$id;

	$conn->query($sql);

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area);
?>