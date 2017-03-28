<?php
	include('../../config.php');
	$id = $conn->real_escape_string($_GET['id']);
	$area = $conn->real_escape_string($_GET['area']);
	$sql="update dim_agents set del_dim_agent=1 where id_dim_agent=".$id;

	$conn->query($sql);

	header('Location:'.LIVE_SITE_ADMIN.'/home.php?area='.$area);
?>