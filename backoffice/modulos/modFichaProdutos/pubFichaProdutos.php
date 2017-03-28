<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);
	$action=$conn->real_escape_string($_GET['action']);

	$sql="update products set act_product=".$action." where id_product=".$id;

	$conn->query($sql);

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area);
?>