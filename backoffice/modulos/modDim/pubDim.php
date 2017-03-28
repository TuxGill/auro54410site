<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);
	$action=$conn->real_escape_string($_GET['action']);

	$sql="update dim_agents set act_dim_agent=".$action." where id_dim_agent=".$id;

	$conn->query($sql);

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area);
?>